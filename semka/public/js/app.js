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

    const bookLink = $('.link-book-img');
    bookLink.on('click',(e) => {
      e.preventDefault();

      let shadow = document.createElement('div');
      shadow.className = 'shadow';
      shadow.style.display = 'block';
      $('body').append(shadow);

      let obrazok = document.createElement('img');
      obrazok.className = 'pop-up';
      obrazok.src = e.target.currentSrc;
      $('body').append(obrazok);
    });

    $('body').on('click',".shadow",() => {
      $('.shadow').remove();
      $('.pop-up').remove();
    });

    $("#comment").on('click', (e) => {
      e.preventDefault();
      const data = {
        user_id: $('input[name="user_id"]').val(),
        _token: $('input[name="_token"]').val(),
        book_id: $('input[name="book_id"]').val(),
        text: $('input[name="text"]').val(),
        user_name: $('input[name="user_name"]').val(),
      };
      $.ajax({
        url: 'http://localhost:8000/addComment',
        method: 'POST',
        data: data,
        success: (res) => {
          const date = new Date(res.updated_at);
          const stringDate = String(date.getDate()).padStart(2, '0') + '.' +
            String(date.getMonth() + 1).padStart(2,'0') + ' ' +
            date.getHours() + ':' + date.getMinutes();
          let comment = $('<div class="card border-info mb-3 comment"></div>');
          let cardHeader = $('<div class="card-header">' + stringDate +  '</div>');
          cardHeader.appendTo(comment);
          let commentBody = $('<div class="card-body"></div>');
          $('<p class="card-text">' + data.user_name + '</p>').appendTo(commentBody);
          $('<h4 class="card-title">' + data.text + '</h4>').appendTo(commentBody);
          commentBody.appendTo(comment);
          
          let komentik = $('.comment')[2];
          if (komentik) {
            komentik.remove();
          }
          $('.comments').prepend(comment);
        },
      });
    });

    $('.comment-page-link').on('click', async (e) => {
      e.preventDefault();
      const response = await fetch('url', {
        method: 'GET',
      });
      const data = await response.json();
    })
}(jQuery))