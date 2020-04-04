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
