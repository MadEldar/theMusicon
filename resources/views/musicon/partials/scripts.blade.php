<!-- jQuery-2.2.4 js -->
<script src="{{ asset('musicon/js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('musicon/js/bootstrap/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('musicon/js/bootstrap/bootstrap.min.js') }}"></script>
<!-- All Plugins js -->
<script src="{{ asset('musicon/js/plugins/plugins.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('musicon/js/active.js') }}"></script>
<!-- Spotify js -->
<script src="{{ asset('musicon/js/spotify-player.js') }}"></script>
<!-- User custom -->
<script src="{{ asset('musicon/js/musicon.js') }}"></script>
<!-- Web player SDK -->
@php
    use App\Spotify;
@endphp
<script>
    {{--let player;--}}
    {{--const play = ({--}}
    {{--        spotify_uri,--}}
    {{--        playerInstance: {--}}
    {{--            _options: {--}}
    {{--                getOAuthToken,--}}
    {{--                id--}}
    {{--            }--}}
    {{--        }--}}
    {{--    }) => {--}}
    {{--    getOAuthToken(access_token => {--}}
    {{--        fetch(`https://api.spotify.com/v1/me/player/play?device_id=${id}`, {--}}
    {{--            method: 'PUT',--}}
    {{--            body: JSON.stringify({ uris: [spotify_uri] }),--}}
    {{--            headers: {--}}
    {{--                'Content-Type': 'application/json',--}}
    {{--                'Authorization': `Bearer ${access_token}`--}}
    {{--            },--}}
    {{--        });--}}
    {{--    });--}}
    {{--};--}}
    {{--(() => {--}}
    {{--    window.onSpotifyWebPlaybackSDKReady = () => {--}}
    {{--        const token = "{{ Spotify::get_access_token(['stream', 'ure', 'umps', 'urp'], 'token') }}";--}}
    {{--        player = new Spotify.Player({--}}
    {{--            name: 'Web Playback SDK Quick Start Player',--}}
    {{--            getOAuthToken: cb => {--}}
    {{--                cb(token);--}}
    {{--            }--}}
    {{--        });--}}

    {{--        // Error handling--}}
    {{--        player.addListener('initialization_error', ({message}) => {--}}
    {{--            console.error(message);--}}
    {{--        });--}}
    {{--        player.addListener('authentication_error', ({message}) => {--}}
    {{--            console.error(message);--}}
    {{--        });--}}
    {{--        player.addListener('account_error', ({message}) => {--}}
    {{--            console.error(message);--}}
    {{--        });--}}
    {{--        player.addListener('playback_error', ({message}) => {--}}
    {{--            console.error(message);--}}
    {{--        });--}}

    {{--        // Playback status updates--}}
    {{--        player.addListener('player_state_changed', state => {--}}
    {{--            console.log(state);--}}
    {{--        });--}}

    {{--        // Ready--}}
    {{--        player.addListener('ready', ({device_id}) => {--}}
    {{--            console.log('Ready with Device ID', device_id);--}}
    {{--        });--}}

    {{--        // Not Ready--}}
    {{--        player.addListener('not_ready', ({device_id}) => {--}}
    {{--            console.log('Device ID has gone offline', device_id);--}}
    {{--        });--}}

    {{--        // Connect to the player!--}}
    {{--        player.connect();--}}
    {{--        setTimeout(() => {--}}
    {{--            play({--}}
    {{--                playerInstance: player,--}}
    {{--                spotify_uri: 'spotify:track:7xGfFoTpQ2E7fRF5lN10tr'--}}
    {{--            });--}}
    {{--        }, 5000);--}}
    {{--    };--}}
    {{--})();--}}
</script>
