(function($) {
    const smallX = $('.close');

    smallX.on('click', function(event) {
        event.preventDefault();
        smallX.parent().fadeOut(300);
    })

    const email = $('input[name="email"]');
    email.on('input', function(event) {
        if (email.validity.typeMismatch) {
            email.setCustomValidity("I am expecting an e-mail address!");
            email.reportValidity();
          } else {
            email.setCustomValidity("");
          }

     });
}(jQuery))