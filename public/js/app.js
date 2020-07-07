$(function () {

  // 生産者商品登録

  $('.product_create').click(function () {
    $.ajax('/api/client/product/create',
      {
        type: 'post',
        data: {
          title: $('#title').val(),
          detail: $('#detail').val(),
          price: $('#price').val(),
          token: $.cookie("token"),
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
        $.cookie('token_admins', "", { path: "/", expires: -1 });
        $.cookie('token_clients', "", { path: "/", expires: -1 });
        $.cookie('token_members', "", { path: "/", expires: -1 });
        $.cookie("token_admins", data.token, { path: '/' });
        location.href = "http://localhost";
      })
      .fail(function (data) {
        window.console.log(data);
        $('.error_text').text(data.responseJSON.error);
      })

  });



  // 生産者登録

  $('.client_create').click(function () {
    $.ajax('/api/login/client/create',
      {
        type: 'post',
        data: {
          name: $('#name').val(),
          email: $('#email').val(),
          password: $('#password').val(),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $.cookie('token_admins', "", { path: "/", expires: -1 });
        $.cookie('token_clients', "", { path: "/", expires: -1 });
        $.cookie('token_members', "", { path: "/", expires: -1 });
        $.cookie("token_clients", data.token, { path: '/' });
        location.href = "http://localhost";
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
          name: $('#name').val(),
          email: $('#email').val(),
          password: $('#password').val(),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $.cookie('token_admins', "", { path: "/", expires: -1 });
        $.cookie('token_clients', "", { path: "/", expires: -1 });
        $.cookie('token_members', "", { path: "/", expires: -1 });
        $.cookie("token_members", data.token, { path: '/' });
        location.href = "http://localhost";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });


  // ログイン

  $('.login').click(function () {
    $.ajax('/api/login',
      {
        type: 'post',
        data: {
          email: $('#email').val(),
          password: $('#password').val(),
          scope: $('#scope').val(),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $.cookie('token_admins', "", { path: "/", expires: -1 });
        $.cookie('token_clients', "", { path: "/", expires: -1 });
        $.cookie('token_members', "", { path: "/", expires: -1 });
        $.cookie("token_" + data.scope, data.token, { path: '/' });
        window.console.log($.cookie("token_" + data.scope));
        location.href = "http://localhost";

      })
      .fail(function (data) {
        window.console.log(data);
        $('.error_login').html('');
        $('.error_login').append("<p class='alert-danger'>" + data.responseJSON.error + '</p>');
        createErrorList(data);
      })

  });

  // ログアウト
  $('.logout').click(function () {
    $.cookie('token_admins', "", { path: "/", expires: -1 });
    $.cookie('token_clients', "", { path: "/", expires: -1 });
    $.cookie('token_members', "", { path: "/", expires: -1 });
    location.href = "http://localhost";
  });

  // エラー文表示
  const createErrorList = (data) => {
    const errors = data.responseJSON.errors;

    if (Object.keys(errors).length) {
      Object.keys(errors).forEach((key) => {
        console.log(errors[key]);
        const className = '.error_text_' + key;
        const errorsText = $(className);
        errors[key].forEach((value, index) => {
          errorsText.html('');
          errorsText.append("<p class='alert-danger'>" + value + '</p>');
        });
      })
    }
  }


  // メンバー基本情報編集
  $('.member_edit').click(function () {
    $.ajax('/api/member/profile/edit',
      {
        type: 'post',
        data: {
          name: $('#name').val(),
          email: $('#email').val(),
          token: $.cookie("token_members"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        location.href = "http://localhost/member/profile";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });

  // メンバーお届け先登録
  $('.member_address_create').click(function () {
    $.ajax('/api/member/address/create',
      {
        type: 'post',
        data: {
          name: $('#name').val(),
          zip: $('#zip').val(),
          address: $('#address').val(),
          tel: $('#tel').val(),
          token: $.cookie("token_members"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        location.href = "http://localhost/member/address";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });

  // メンバーお届け先編集
  $('.member_address_edit').click(function () {
    $.ajax('/api/member/address/edit',
      {
        type: 'post',
        data: {
          deliveryId: $(this).data('deliveryId'),
          name: $('#name').val(),
          zip: $('#zip').val(),
          address: $('#address').val(),
          tel: $('#tel').val(),
          token: $.cookie("token_members"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        location.href = "http://localhost/member/address";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })
  });
  // メンバーお届け先削除
  $('.member_address_delete').click(function () {
    $.ajax('/api/member/address/delete',
      {
        type: 'post',
        data: {
          deliveryId: $(this).data('deliveryId'),
          token: $.cookie("token_members"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $('.address_delete').html('');
        $('.address_delete').html('<div class="modal-body text-center">削除しました</div>');
        setTimeout(function () {
          location.href = "http://localhost/member/address";
        }, 500);

      })
      .fail(function (data) {
      })
  });

  // モーダル
  $(function () {
    $('.js-modal-open').on('click', function () {
      $('.js-modal').fadeIn();
      return false;
    });
    $('.js-modal-close').on('click', function () {
      $('.js-modal').fadeOut();
      return false;
    });
  });


  // メンバーパスワード編集
  $('.member_password_edit').click(function () {
    $.ajax('/api/member/password/edit',
      {
        type: 'post',
        data: {
          email: $('#email').val(),
          password: $('#password').val(),
          admin_id: $('#admin_id').val(),
          client_id: $('#client_id').val(),
          member_id: $('#member_id').val(),
          scope: $('#scope').val(),
          token: $.cookie("token_members"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $('.password_edit').html('');
        $('.password_edit').html('<p>更新しました</p>');
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })
  });

  // お気に入り追加
  $('.favorite').click(function () {
    $.ajax('/api/member/favorite',
      {
        type: 'post',
        data: {
          token: $.cookie("token_members"),
          product_id: $('#product_id').val(),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $('.favorite_btn').html('');
        $('.favorite_btn').html('<button class="btn btn-deep-orange btn-block my-4 unfavorite">お気に入り済</button>');
      })
      .fail(function (data) {
        window.console.log(data);
      })
  });
  // お気に入り削除
  $('.unfavorite').click(function () {
    $.ajax('/api/member/unfavorite',
      {
        type: 'post',
        data: {
          token: $.cookie("token_members"),
          product_id: $('#product_id').val(),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $('.favorite_btn').html('');
        $('.favorite_btn').html('<button class="btn btn-light-blue btn-block my-4 favorite">お気に入りに追加</button>');
      })
      .fail(function (data) {
        window.console.log(data);
      })
  });

});

