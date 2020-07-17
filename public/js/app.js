$(function () {

  // カテゴリー取得
  $(document).ready(function () {
    $.ajax('/api/categories',
      {
        type: 'post',
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        data.categories.forEach((value,index) => {
           $('.search_categories').append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='categories_"+value.id+"' name='categories' value='"+value.id+"'><label class='custom-control-label' for='categories_"+value.id+"'>"+value.name+"</label></div>");
           $('.side_categories').append("<li class='nav-item'> <a class='nav-link' href='/products?categories[]="+value.id+"'>"+value.name+" <i class='fas fa-chevron-right'></i></a> </li>");
          });
          $.each(data.prefs, function(index, value) {
            $('.search_prefectures').append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='prefectures_"+index+"' name='prefectures' value='"+value+"'><label class='custom-control-label' for='prefectures_"+index+"'>"+value+"</label></div>");
        })

      })

      .fail(function (data) {
        window.console.log(data);
      })

  });

  // 生産者商品登録
  $(document).on('click', '.product_create', function () {
    var categories = [];
    $('input[name="categories"]:checked').each(function () {
      categories.push($(this).val());
    });
    $.ajax('/api/client/product/create',
      {
        type: 'post',
        data: {
          categories: categories,
          title: $('#title').val(),
          detail: $('#detail').val(),
          price: $('#price').val(),
          token: $.cookie("token_clients"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });
  // こだわり登録
  $(document).on('click', '.commitment_create', function () {
    $.ajax('/api/client/commitment/create',
      {
        type: 'post',
        data: {
          title: $('#title').val(),
          contents: $('#contents').val(),
          client_id: $('#client_id').val(),
          token: $.cookie("token_clients"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });


  // 管理者登録
  $(document).on('click', '.admin_create', function () {
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
        location.href = "/";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data)
      })

  });



  // 生産者登録
  $(document).on('click', '.client_create', function () {
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
        location.href = "/";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });


  // ユーザー登録

  $(document).on('click', '.member_create', function () {
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
        location.href = "/";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });


  // ログイン

  $(document).on('click', '.login', function () {
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
        location.href = "/";

      })
      .fail(function (data) {
        window.console.log(data);
        if (Object.keys(data.responseJSON).length) {
          $('.error_login').html('');
          $('.error_login').append("<p class='alert-danger'>メールアドレスもしくはパスワードが間違っています</p>");
        }
        createErrorList(data);
      })

  });

  // ログアウト
  $(document).on('click', '.logout', function () {
    $.cookie('token_admins', "", { path: "/", expires: -1 });
    $.cookie('token_clients', "", { path: "/", expires: -1 });
    $.cookie('token_members', "", { path: "/", expires: -1 });
    location.href = "/";
  });

  // エラー文表示
  const createErrorList = (data) => {
    const errors = data.responseJSON.errors;

    if (Object.keys(errors).length) {
      Object.keys(errors).forEach((key) => {
        console.log(errors[key]);
        const className = '.error_text_' + key;
        const className2 = 'error_text_' + key;
        const errorsText = $(className);
        errors[key].forEach((value, index) => {
          errorsText.html('');
          errorsText.append("<p class='alert-danger'>" + value + '</p>');
        });
      })
    }
  }


  // メンバー基本情報編集
  $(document).on('click', '.member_edit', function () {

    let $upfile = $('input[name="image"]');
    let fd = new FormData();
    fd.append("profile_image", $upfile.prop('files')[0]);
    fd.append("name", $('#name').val());
    fd.append("email", $('#email').val());
    fd.append("token", $.cookie("token_members"));

    for (item of fd) window.console.log(item);
    $.ajax('/api/member/profile/edit',
      {
        type: 'post',
        data: fd,
        dataType: 'json',
        processData: false,
        contentType: false,
      }
    )
      .done(function (data) {
        window.console.log(data);
        location.href = "/member/profile";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });

  // メンバーお届け先登録
  $(document).on('click', '.member_address_create', function () {
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
        location.href = "/member/address";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });

  // メンバーお届け先編集
  $(document).on('click', '.member_address_edit', function () {
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
        location.href = "/member/address";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })
  });

  // メンバーお届け先削除
  $(document).on('click', '.member_address_delete', function () {
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
          location.href = "/member/address";
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
  $(document).on('click', '.member_password_edit', function () {
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


  $(document).on('click', '.keyword', function () {
    $('.search_area').show();
    $('.window-close').show();
    $('.container').hide();
  });
  $(document).on('click', '.window-close', function () {
    $('.search_area').hide();
    $('.window-close').hide();
    $('.container').show();
  });

  // 検索url作成
  $(document).on('click', '.organic_search', function () {
    window.console.log($('.keyword').val());
    var categories = [];
    var prefectures = [];
    $('input[name="categories"]:checked').each(function () {
      categories.push($(this).val());
    });
    $('input[name="prefectures"]:checked').each(function () {
      prefectures.push($(this).val());
    });
    window.console.log(categories);

    var url = '/products';
    var query = [];

    if ($('.keyword').val()) {
      query.push('keyword=' + $('.keyword').val());
    }
    if (categories.length) {
      $.each(categories, function (index, value) {
        query.push('categories[]=' + value);
      });
    }
    if (prefectures.length) {
      $.each(prefectures, function (index, value) {
        query.push('prefectures[]=' + value);
      });
    }
    if (query.length) {
      $.each(query, function (index, value) {
        if (index === 0) {
          url += '?' + value;
        } else {
          url += '&' + value;
        }
      });
    }
    window.location.href = url;
  });

});



