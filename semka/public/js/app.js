(function($) {
    const smallX = $('.close');

    smallX.on('click', function(event) {
        event.preventDefault();
        smallX.parent().fadeOut(300);
    })
}(jQuery))