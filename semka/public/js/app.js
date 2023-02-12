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

    let shadow = document.createElement('div');
    shadow.className = 'shadow';
    $('body').append(shadow);
    let obrazok = document.createElement('img');
    
    obrazok.className = 'pop-up';
    

    const bookLink = $('.link-book-img');
    bookLink.on('click',(e) => {
      e.preventDefault();
      shadow.style.display = 'block';
      console.log(e.target.currentSrc);
      obrazok.src = e.target.currentSrc;
      $('body').append(obrazok);
    });

    $('.shadow').on('click',() => {
      shadow.style.display = 'none';
      obrazok.remove();
    });

    //token for ajax forms
    

    $("#comment").on('click', (e) => {
      e.preventDefault();
      const data = {
        user_id: $('input[name="user_id"]').val(),
        _token: $('input[name="_token"]').val(),
        book_id: $('input[name="book_id"]').val(),
        text: $('input[name="text"]').val(),
      };
      $.ajax({
        url: 'http://localhost:8000/addComment',
        method: 'POST',
        data: data,
        success: async function (res) {

          console.log(res);
        },
      });
      
      
    });
}(jQuery))