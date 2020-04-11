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
    $(this).attr('data-offset', offset + 24);
    $.ajax({
        url: `/more-${target}`,
        type: 'post',
        data: {
            q: new URLSearchParams(window.location.search).get('q') ?? 'all',
            offset: offset + 18,
            _token: $('input[name="_token"]').val()
        },
        success: function(data) {
            console.log(data);
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
