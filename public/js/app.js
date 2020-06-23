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
        $.cookie("token", data.token);
        window.console.log($.cookie("token"));

      })
      .fail(function (data) {
        window.console.log(data);

        createErrorList(data);

      })
      

  });

  const createErrorList = (data) => {
    const errors = data.responseJSON.errors;

    console.log(data);
    
    if (Object.keys(errors).length) {
      Object.keys(errors).forEach((key) => {
        console.log(errors[key]);
        const className = '.error_text_' + key;
        const errorsText = $(className);
        errors[key].forEach((value, index) => {
          errorsText.append("<p class='alert-danger'>" + value + '</p>');
        });
      })
    }
  }
}); 

