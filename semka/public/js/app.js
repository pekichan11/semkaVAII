(function($) {
    const smallX = $('.close');

    smallX.on('click', function(event) {
        event.preventDefault();
        smallX.parent().fadeOut(300);
    })

    const email = $('input[name="email"]');
    email.on('input', function() {
        if (email.validity.typeMismatch) {
            email.setCustomValidity("I am expecting an e-mail address!");
            email.reportValidity();
          } else {
            email.setCustomValidity("");
          }

     });

    const link = $('.next-comment-link');
    link.on('click',(e) => { 
      e.preventDefault();
      fetch('/comments/' + link.value)
        .then((res) => res.json());
        
    })
}(jQuery))