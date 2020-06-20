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
  });
}); 