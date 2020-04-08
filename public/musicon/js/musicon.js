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

$('.load-more-btn').on('click', 'button', function () {
    let target = $(this).attr('data-target');
    let offset = parseInt($(this).attr('data-offset'));
    $(this).attr('data-offset', offset + 18);
    $.ajax({
        url: `/more-${target}`,
        type: 'post',
        data: {
            q: new URLSearchParams(window.location.search).get('q') ?? 'all',
            offset: offset + 18,
            _token: $('input[name="_token"]').val()
        },
        success: function(data) {
            data.forEach((datum) => {
                $('.oneMusic-albums').append(`
                    <!-- Single Album -->
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                        <div class="single-album">
                            <img src="${ datum.images[1] ? datum.images[1].url : asset_path('/musicon/img/bg-img/artist-default.png')}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>${ datum.name }</h5>
                                </a>
                                ${ datum.artists ? '<p>'+datum.artists[0].name+'</p>':'' }
                            </div>
                        </div>
                    </div>
                `);
            });
            if (data.length == 0) {
                $('.load-more-btn').html(`
                    <p>No more albums</p>
                `);
            }
        }
    });
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
