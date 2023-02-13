(function($) {
    $('#delete-comment').submit(() => {
      return confirm('Are you sure you want to delete this comment');
    });
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
      console.log("nehe");
      const data = {
        _token: $('input[name="_token"]').val(),
        book_id: $('input[name="book_id"]').val(),
        text: $('input[name="text"]').val(),
      };
      $.ajax({
        url: 'http://localhost:8000/addComment',
        method: 'POST',
        data: data,
        success: (res) => {
          const date = new Date(res.updated_at);
          const dataForComment = {
            date: date,
            text: res.text,
            user_name: res.user_name,
          };
          let comment = createComment(dataForComment);
          let komentik = $('.comment')[2];
          if (komentik) {
            komentik.remove();
          }
          $('.comments').prepend(comment);
          $('input[name="text').val("");
        },
      });
    });

    $('.comment-page-link').on('click', async (e) => {
      e.preventDefault();
      try {
        const book_id = e.target.href.substring(27,28);
        const response = await fetch(`http://localhost:8000/getComments/${book_id}`, {
          headers: {
            'Content-Type': "application/json",
          },
        });
        const data = await response.json();
        let comments = $('.comment');
        for(let i = 0; i < comments.length; i++) {
          comments[i].remove();
        }
        let komenty = [];
        for (let index = e.target.text * 3 - 3; index < data.length; index++) {
          const date = new Date(data[index].updated_at);
            const dataForComment = {
              date: date,
              text: data[index].text,
              user_name: data[index].user_name,
            };
            const comment = createComment(dataForComment);
            komenty[index % 3] = comment;
            
            if(index == e.target.text * 3 - 1) {
              break;
            }
          }
          const komentare = $('.comments');
          for (let index = komenty.length - 1; index >= 0; index--) {
            komentare.prepend(komenty[index]);
          }
      } catch (err) { 
        console.log(err);
      } 
    });

    function createComment(data) {
      const stringDate = String(data.date.getDate()).padStart(2, '0') + '.' +
            String(data.date.getMonth() + 1).padStart(2,'0') + ' ' +
            String(data.date.getHours()).padStart(2, '0') + ':' + String(data.date.getMinutes()).padStart(2, '0');
      let comment = $('<div class="card border-info mb-3 comment"></div>');
      let cardHeader = $('<div class="card-header">' + stringDate +  '</div>');
      cardHeader.appendTo(comment);
      let commentBody = $('<div class="card-body"></div>');
      $('<p class="card-text">' + data.user_name + '</p>').appendTo(commentBody);
      $('<h4 class="card-title">' + data.text + '</h4>').appendTo(commentBody);
      commentBody.appendTo(comment);
      return comment;
    }
}(jQuery))