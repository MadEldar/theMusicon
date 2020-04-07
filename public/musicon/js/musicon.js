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
