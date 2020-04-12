function getAccessToken() {
    let token = null;
    $.ajax({
        url: '/get-access-token',
        type: 'POST',
        data: {
            _token: $('input[name="_token"]').val(),
        },
        async: false,
        success: data => {
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
    $(this).attr('data-offset', offset + 24);
    $.ajax({
        url: `/more-${target}`,
        type: 'post',
        data: {
            q: new URLSearchParams(window.location.search).get('q') ?? 'all',
            offset: offset + 24,
            _token: $('input[name="_token"]').val()
        },
        success: data => {
            data.forEach((datum) => {
                $('.oneMusic-albums').append(`
                    <!-- Single Album -->
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                        <div class="single-album">
                            <img src="${
                                datum.album ?
                                    datum.album.images[1] ?
                                        datum.album.images[1].url
                                        : asset_path('/musicon/img/bg-img/artist-default.png')
                                    : datum.images[1] ?
                                        datum.images[1].url
                                        : asset_path('/musicon/img/bg-img/artist-default.png')
                            }" alt="">
                            <div class="album-info">
                                <a href="${
                                    datum.album ?
                                        '/player?track=' + encodeURI(datum.name + 'by' + datum.artists[0].name) :
                                        datum.artists ?
                                            '/album?q=' + datum.id :
                                            '/artist/' + datum.id
                                }">
                                    <h5>${ datum.name }</h5>
                                </a>
                                ${ datum.artists ? '<a href="/artist/' + datum.artists[0].id + '"><p>'+datum.artists[0].name+'</p></a>':'' }
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

$('#more-lyrics').on('click', function() {
    let index = parseInt($(this).attr('data-index'));
    $(this).attr('data-index', index + 1);
    $.ajax({
        url: '/more-lyrics',
        method: 'post',
        data: {
            track: $('.breadcrumb-area h2').text(),
            artist: $('.song-lyrics-area h5 a').text(),
            _token: $('input[name="_token"]').val(),
            index: index
        },
        success: lyrics => {
            $('#genius-lyrics').html(lyrics);
            $.get($('#genius-lyrics script').attr('src'), script => {
                let filtered = script
                    .replace(/\\\'/g, "'")
                    .replace(/\\\\/g, "\\")
                    .replace(/\\\\/g, "")
                    .replace(/\\\//g, "/")
                    .replace(/\\\"/g, '"');
                let start = filtered.indexOf('\\n\\n') + 4,
                    end = filtered.indexOf('</iframe>') + 9;
                $('#genius-lyrics').html(filtered.substring(start, end).replace(/\\n/g, ''));
                $('.song-lyrics-area pre').html(
                    $('.rg_embed_body p').text() != '' ?
                        $('.rg_embed_body p').html() :
                        'There is no lyric for this song.'
                );
            }, 'text');
        },
        error: err => {console.log(err);}
    })
});
