$(function () {
  
  $('.product_create').click(function () {
    $.ajax('/api/client/product/create',
      {
        type: 'post',
        data: {
          title: $('#title').val(),
          detail: $('#detail').val(),
          price: $('#price').val(),
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

  
  // 管理者登録

  $('.admin_create').click(function () {
    $.ajax('/api/login/admin/create',
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

  // 生産者登録

  $('.client_create').click(function () {
    $.ajax('/api/login/client/create',
      {
        type: 'post',
        data: {
          email: $('#email').val(),
          password: $('#password').val(),
          address: $('#address').val(),
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

  $('.client_login').click(function () {
    $.ajax('/api/login/client',
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

  // ユーザー登録

  $('.member_create').click(function () {
    $.ajax('/api/login/member/create',
      {
        type: 'post',
        data: {
          email: $('#email').val(),
          password: $('#password').val(),
          address: $('#address').val(),
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

  $('.member_login').click(function () {
    $.ajax('/api/login/member',
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

