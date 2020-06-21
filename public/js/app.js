$(function () {
  $('.admin_create').click(function () {
    $.ajax('/api/login/create',
      {
        type: 'post',
        data: {
          email: $('#email').val(),
          password: $('#password').val(),
        },
        dataType: 'json'
      }
    ) 
      .done(function (data) {
        window.console.log(data);
      })
      .fail(function (data) {
        window.console.log(data);
        $('.error_text').text(data.responseJSON.error);
      })

  });

  $('.admin_login').click(function () {
    $.ajax('/api/login/admin',
      {
        type: 'post',
        data: {
          email: $('#email').val(),
          password: $('#password').val(),
        },
        dataType: 'json'
      }
    ) 
      .done(function (data) {
        window.console.log(data);
      })
      .fail(function (data) {
        window.console.log(data);
        $('.error_text').text(data.responseJSON.error);
      })

  });
}); 