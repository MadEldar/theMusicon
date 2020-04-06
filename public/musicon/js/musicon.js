function getAccessToken() {
    let token = null;
    $.ajax({
        url: '/get-access-token',
        type: 'POST',
        data: {
            _token: $('input[name="_token"]').val(),
        },
        async: false,
        success: function(data) {
            token = data;
        }
    });
    return token;
}

let removeInterval,
    removeMessage = () => {
    let timer = 500;
    $('#alert-container .alert').each((index, item) => {
        setInterval(() => {
            $(item).hide('slow', () => $(item).remove(500));
        }, timer);
        timer += 500;
    })
};

(() => {
    removeInterval = setInterval(removeMessage, 4500);
})();

$('#alert-container').on('mousein', '.alert', () => {
    clearInterval(removeInterval);
});

$('#alert-container').on('mouseout', '.alert', () => {
    removeInterval = setInterval(removeMessage, 4500);
});

$('#more-albums').on('click', () => {
    $.ajax({
        url: '/more-albums',
        type: 'post',
        data: {
            q: new URLSearchParams(window.location.search).get('q') ?? 'all',
            offset: $('.single-album-item').length,
            _token: $('input[name="_token"]').val()
        },
        success: function(data) {
            console.log(data);
            data.forEach((album) => {
                $('.oneMusic-albums').append(`
                    <!-- Single Album -->
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                        <div class="single-album">
                            <img src="${ album.images[1].url }" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>${ album.name }</h5>
                                </a>
                                <p>${ album.artists[0].name }</p>
                            </div>
                        </div>
                    </div>
                `);
            });
        }
    })
});

let player;
const play = ({
        spotify_uri,
        playerInstance: {
            _options: {
            getOAuthToken,
            id
            }
        }
    }) => {
    getOAuthToken(access_token => {
        fetch(`https://api.spotify.com/v1/me/player/play?device_id=${id}`, {
            method: 'PUT',
            body: JSON.stringify({ uris: [spotify_uri] }),
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${access_token}`
            },
        });
    });
};
(() => {
    window.onSpotifyWebPlaybackSDKReady = () => {
        const token = getAccessToken();
        player = new Spotify.Player({
            name: 'Web Playback SDK Quick Start Player',
            getOAuthToken: cb => {
                cb(token);
            }
        });

        // Error handling
        player.addListener('initialization_error', ({message}) => {
            console.error(message);
        });
        player.addListener('authentication_error', ({message}) => {
            console.error(message);
        });
        player.addListener('account_error', ({message}) => {
            console.error(message);
        });
        player.addListener('playback_error', ({message}) => {
            console.error(message);
        });

        // Playback status updates
        player.addListener('player_state_changed', state => {
            console.log(state);
        });

        // Ready
        player.addListener('ready', ({device_id}) => {
            console.log('Ready with Device ID', device_id);
        });

        // Not Ready
        player.addListener('not_ready', ({device_id}) => {
            console.log('Device ID has gone offline', device_id);
        });

        // Connect to the player!
        player.connect();
        setTimeout(() => {
            play({
                playerInstance: player,
                spotify_uri: 'spotify:track:7xGfFoTpQ2E7fRF5lN10tr'
            });
        }, 5000);
    };
})();
