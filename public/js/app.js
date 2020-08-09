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
        // window.console.log(data);
        data.categories.forEach((value, index) => {
          $('.search_categories').append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='categories_" + value.id + "' name='categories' value='" + value.id + "'><label class='custom-control-label' for='categories_" + value.id + "'>" + value.name + "</label></div>");
          $('.side_categories').append("<li class='nav-item'> <a class='nav-link' href='/products?categories[]=" + value.id + "'>" + value.name + " <i class='fas fa-chevron-right'></i></a> </li>");
        });
        $.each(data.prefs, function (index, value) {
          $('.search_prefectures').append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='prefectures_" + index + "' name='prefectures' value='" + value + "'><label class='custom-control-label' for='prefectures_" + index + "'>" + value + "</label></div>");
        })

      })

      .fail(function (data) {
        window.console.log(data);
      })

  });


  // 生産者商品登録
  $(document).on('click', '.product_create', function () {

    let fd = new FormData();
    var categories = [];
    $('input[name="categories"]:checked').each(function () {
      // categories.push($(this).val());
      fd.append("categories[]", $(this).val());
    });

    let $upfile1 = $('input[name="gallery1"]');
    let $upfile2 = $('input[name="gallery2"]');
    let $upfile3 = $('input[name="gallery3"]');
    let $upfile4 = $('input[name="gallery4"]');
    let $upfile5 = $('input[name="gallery5"]');
    fd.append("gallery1", $upfile1.prop('files')[0]);
    fd.append("gallery2", $upfile2.prop('files')[0]);
    fd.append("gallery3", $upfile3.prop('files')[0]);
    fd.append("gallery4", $upfile4.prop('files')[0]);
    fd.append("gallery5", $upfile5.prop('files')[0]);
    fd.append("title", $('#title').val());
    fd.append("detail", $('#detail').val());
    fd.append("explanation", $('#explanation').val());
    fd.append("price", $('#price').val());
    fd.append("token", $.cookie("token_clients"));
    


    $.ajax('/api/client/product/create',
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
        $('.product_create_modal').html('');
        $('.product_create_modal').html(`
        <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">登録しました</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        `);
        setTimeout(function () {
          location.reload();
        }, 500);
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });
  // 生産者商品編集
  $(document).on('click', '.client_product_edit', function () {

    let fd = new FormData();
    var categories = [];
    $('input[name="categories"]:checked').each(function () {
      // categories.push($(this).val());
      fd.append("categories[]", $(this).val());
    });

    let $upfile1 = $('input[name="gallery1"]');
    let $upfile2 = $('input[name="gallery2"]');
    let $upfile3 = $('input[name="gallery3"]');
    let $upfile4 = $('input[name="gallery4"]');
    let $upfile5 = $('input[name="gallery5"]');
    fd.append("gallery1", $upfile1.prop('files')[0]);
    fd.append("gallery2", $upfile2.prop('files')[0]);
    fd.append("gallery3", $upfile3.prop('files')[0]);
    fd.append("gallery4", $upfile4.prop('files')[0]);
    fd.append("gallery5", $upfile5.prop('files')[0]);
    fd.append("title", $('#title').val());
    fd.append("detail", $('#detail').val());
    fd.append("explanation", $('#explanation').val());
    fd.append("price", $('#price').val());
    fd.append("token", $.cookie("token_clients"));
    fd.append("product_id", $('.client_product_edit').data('product_id'));


    $.ajax('/api/client/product/edit',
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
        location.href = `/client/products/${data.product_id}`;
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });

  // 商品削除
  $(document).on('click', '.client_product_show_delete', function () {
    $.ajax('/api/client/product/delete',
      {
        type: 'post',
        data: {
          token: $.cookie("token_clients"),
          product_id: $('.client_product_show_delete').data('product_id'),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $('.product_show_delete').html('');
        $('.product_show_delete').html('<div class="modal-body text-center">削除しました</div>');
        location.href = "/client/products";
      })
      .fail(function (data) {
      })
  });

  // こだわり情報登録
  $(document).on('click', '.client_commitment_create', function () {

    let fd = new FormData();
    let $upfile = $('input[name="gallery"]');
    fd.append("commitment_image", $upfile.prop('files')[0]);
    fd.append("title", $('#title').val());
    fd.append("contents", $('#contents').val());
    fd.append("token", $.cookie("token_clients"));


    $.ajax('/api/client/commitment/create',
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
        $('.commitment_create_modal').html('');
        $('.commitment_create_modal').html(`
        <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">登録しました</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        `);
        setTimeout(function () {
          location.reload();
        }, 500);
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });
  // こだわり情報編集
  $(document).on('click', '.client_commitment_edit', function () {

    let fd = new FormData();
    let $upfile = $('input[name="gallery"]');
    fd.append("commitment_image", $upfile.prop('files')[0]);
    fd.append("title", $('#title').val());
    fd.append("contents", $('#contents').val());
    fd.append("token", $.cookie("token_clients"));
    fd.append("commitment_id", $("#commitment_id").val());


    $.ajax('/api/client/commitment/edit',
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
        location.href = `/client/commitment/${data.commitment_id}/show`;
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
        if (Object.keys(data.responseJSON).length) {
          $('.error_create').html('');
          $('.error_create').append("<p class='alert-danger'>すでに登録されているメールアドレスもしくはパスワードです</p>");
        }
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
        location.href = "/client/mypage";
      })
      .fail(function (data) {
        window.console.log(data);
        if (Object.keys(data.responseJSON).length) {
          $('.error_create').html('');
          $('.error_create').append("<p class='alert-danger'>すでに登録されているメールアドレスもしくはパスワードです</p>");
        }
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
        if (Object.keys(data.responseJSON).length) {
          $('.error_create').html('');
          $('.error_create').append("<p class='alert-danger'>すでに登録されているメールアドレスもしくはパスワードです</p>");
        }
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

        if ($.cookie('token_clients')) {
          location.href = "/client/mypage";
        }
        if ($.cookie('token_members')) {
          location.href = "/";
        }
        if ($.cookie('token_admins')) {
          location.href = "/";
        }

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
    fd.append("image", $upfile.prop('files')[0]);
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

  // クライアント基本情報編集
  $(document).on('click', '.client_edit', function () {

    let $upfile = $('input[name="image"]');
    let fd = new FormData();
    fd.append("image", $upfile.prop('files')[0]);
    fd.append("name", $('#name').val());
    fd.append("email", $('#email').val());
    fd.append("token", $.cookie("token_clients"));

    for (item of fd) window.console.log(item);
    $.ajax('/api/client/profile/edit',
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
        location.href = "/client/mypage";
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
          zip: $('#zipcode').val(),
          prefecture: $('#prefecture').val(),
          municipality: $('#municipality').val(),
          ward: $('#ward').val(),
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
          zip: $('#zipcode').val(),
          prefecture: $('#prefecture').val(),
          municipality: $('#municipality').val(),
          ward: $('#ward').val(),
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
        $('.prefecture_delete').html('');
        $('.prefecture_delete').html('<div class="modal-body text-center">削除しました</div>');
        setTimeout(function () {
          location.href = "/member/address";
        }, 500);

      })
      .fail(function (data) {
      })
  });

  // 生産地情報登録
  $(document).on('click', '.prduct_area_create', function () {
    $.ajax('/api/client/product_area/create',
      {
        type: 'post',
        data: {
          area_name: $('#area_name').val(),
          tel: $('#tel').val(),
          zip: $('#zipcode').val(),
          prefecture: $('#prefecture').val(),
          municipality: $('#municipality').val(),
          ward: $('#ward').val(),
          introduce: $('#introduce').val(),
          shipping: $('#shipping').val(),
          shipping_info: $('#shipping_info').val(),
          token: $.cookie("token_clients"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $('.product_area').html('');
        $('.product_area').html(`
        <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">登録しました</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        `);
        setTimeout(function () {
          location.reload();
        }, 500);

      })
      .fail(function (data) {
        createErrorList(data);
      })
  });

  // 生産地情報編集
  $(document).on('click', '.prduct_area_edit', function () {
    $.ajax('/api/client/product_area/edit',
      {
        type: 'post',
        data: {
          area_name: $('#area_name').val(),
          tel: $('#tel').val(),
          zip: $('#zipcode').val(),
          prefecture: $('#prefecture').val(),
          municipality: $('#municipality').val(),
          ward: $('#ward').val(),
          introduce: $('#introduce').val(),
          shipping: $('#shipping').val(),
          shipping_info: $('#shipping_info').val(),
          token: $.cookie("token_clients"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        location.href = "/client/product_area";

      })
      .fail(function (data) {
        createErrorList(data);
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
          password: $('#password').val(),
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
  // クライアントパスワード編集
  $(document).on('click', '.client_password_edit', function () {
    $.ajax('/api/client/password/edit',
      {
        type: 'post',
        data: {
          password: $('#password').val(),
          token: $.cookie("token_clients"),
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

  // 検索メニュー表示
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

  // 購入する
  $(document).on('click', '.purchase', function () {
    $.ajax('/api/member/purcase',
      {
        type: 'post',
        data: {
          token: $.cookie("token_members"),
          product_id: $('#product_id').val(),
          product_price: $('#product_price').val(),
          shipping: $('#shipping').val(),
          number: $('#number').val(),
          delivery_id: $('input:radio[name="delivery_id"]:checked').val(),
          price: $('#product_price').val(),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        location.href = "/member/purchase/history";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });

  // 出荷する
  $(document).on('click', '.shipment', function () {
    $.ajax('/api/client/shipment',
      {
        type: 'post',
        data: {
          token: $.cookie("token_clients"),
          purchaseId: $(this).data('purchaseId'),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $('.product_shipment').html('');
        $('.product_shipment').html('<div class="modal-body text-center">出荷登録しました</div>');
        setTimeout(function () {
          location.href = "/client/product/notordering";
        }, 500);

      })
      .fail(function (data) {
        window.console.log(data);
      })

  });

  // 住所検索
  $(document).on('click', '#search_btn', function () {
    var param = { zipcode: $('#zipcode').val() }
    var send_url = "http://zipcloud.ibsnet.co.jp/api/search";
    $.ajax({
      type: "GET",
      cache: false,
      data: param,
      url: send_url,
      dataType: "jsonp",
      success: function (res) {
        if (res.status == 200) {
          //処理が成功したとき
          var prefecture = '';
          var purchase_prefecture = '';
          var purchase_municipality = '';
          var municipality = '';
          var purchase_ward = '';
          var ward = '';

          for (var i = 0; i < res.results.length; i++) {
            var result = res.results[i];
            prefecture += "<input type='prefecture' id='prefecture' class='form-control mb-4' placeholder='都道府県' name='prefecture' value='" + result.address1 + "'>";
            purchase_prefecture += "<div class='md-form mb-4'> <input type='text' id='prefecture' class='form-control validate' name='prefecture' value='" + result.address1 + "'> <label data-error='wrong' data-success='right' for='orangeForm-pass'>都道府県</label> </div>"

            municipality += "<input type='municipality' id='municipality' class='form-control mb-4' placeholder='市' name='municipality' value='" + result.address2 + "'>";
            purchase_municipality += "<div class='md-form mb-4'> <input type='text' id='municipality' class='form-control validate' name='municipality' value='" + result.address2 + "'> <label data-error='wrong' data-success='right' for='orangeForm-pass'>市</label> </div>"

            ward += "<input type='ward' id='ward' class='form-control mb-4' placeholder='区長村' name='ward' value='" + result.address3 + "'>";
            purchase_ward += "<div class='md-form mb-4'> <input type='text' id='ward' class='form-control validate' name='ward' value='" + result.address3 + "'> <label data-error='wrong' data-success='right' for='orangeForm-pass'>区町村</label> </div>"
          }
          $('.prefecture').html("");
          $('.prefecture').html(prefecture);

          $('.purchase_prefecture').html("");
          $('.purchase_prefecture').html(purchase_prefecture);

          $('.municipality').html('');
          $('.municipality').html(municipality);

          $('.purchase_municipality').html('');
          $('.purchase_municipality').html(purchase_municipality);

          $('.ward').html('');
          $('.ward').html(ward);

          $('.purchase_ward').html('');
          $('.purchase_ward').html(purchase_ward);

        } else {

        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
  });

  // レビュー作成
  $(document).on('click', '.review', function () {
    $.ajax('/api/member/review/create',
      {
        type: 'post',
        data: {
          comment: $('#comment').val(),
          product_id: $('#product_id').val(),
          client_id: $('#client_id').val(),
          score: $('#score').val(),
          token: $.cookie("token_members"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        location.href = "/member/purchase/history";
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })

  });


  // 購入時お届け先登録
  $(document).on('click', '.purchase_address_create', function () {
    $.ajax('/api/member/address/create',
      {
        type: 'post',
        data: {
          name: $('#name').val(),
          zip: $('#zipcode').val(),
          prefecture: $('#prefecture').val(),
          municipality: $('#municipality').val(),
          ward: $('#ward').val(),
          tel: $('#tel').val(),
          token: $.cookie("token_members"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        location.reload();
      })
      .fail(function (data) {
        window.console.log(data);
        createErrorList(data);
      })
  });

  // レビュー一覧
  $(document).on('click', '.review_index', function () {
    window.console.log($(this).data('type'));
    $.ajax('/api/products/review',
      {
        type: 'get',
        data: {
          type: $(this).data('type'),
          token: $.cookie("token_members"),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        let html = "";
        $.each(data.reviews, function (index, value) {
          window.console.log(value);
          if (value.score === 1) {
            html +=
              `
             <div class="card">
              <div class="card-body">
                <h4 class="card-title"><a href="/products/${value.product_id}">${value.product_name}</a></h4>
                <hr>
                <p class="card-text">⭐️</p>
                
                <p>${value.comment}</p>
                <p class="card-text">投稿日::${value.format_created_at}</p>
              </div>
            </div>
            `
          }
          if (value.score === 2) {
            html +=
              `
             <div class="card">
              <div class="card-body">
                <h4 class="card-title"><a href="/products/${value.product_id}">${value.product_name}</a></h4>
                <hr>
                <p class="card-text">⭐️⭐️</p>

                <p>${value.comment}</p>
                <p class="card-text">投稿日::${value.format_created_at}</p>

              </div>
            </div>
            `
          }
          if (value.score === 3) {
            html +=
              `
             <div class="card">
              <div class="card-body">
                <h4 class="card-title"><a href="/products/${value.product_id}">${value.product_name}</a></h4>
                <hr>
                <p class="card-text">⭐️⭐️⭐️</p>
                
                <p>${value.comment}</p>
                <p class="card-text">投稿日::${value.format_created_at}</p>
              </div>
            </div>
            `
          }
        })
        $('.review_list').html("");
        $('.review_list').append(html);

        if (data.type === null) {
          $(".xfollows").removeClass("active");
          $(".xmine").removeClass("active");
          $(".xall").addClass("active");
        }
        if (data.type === 'follows') {
          $(".xall").removeClass("active");
          $(".xmine").removeClass("active");
          $(".xfollows").addClass("active");
        }
        if (data.type === 'mine') {
          $(".xall").removeClass("active");
          $(".xfollows").removeClass("active");
          $(".xmine").addClass("active");
        }
      })

      .fail(function (data) {
        location.href = "/login/member";
      })

  });

  $('.slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
  });


  // 商品詳細サムネイル画像変換
  $(document).on('click', '.produt_show_gallay_sub', function () {
    window.console.log($(this).attr('src'));
    $('.produt_show_gallay_main').attr('src', $(this).attr('src'));
  });

  $(document).on('click', '.client_product_show_gallay_sub', function () {
    window.console.log($(this).attr('src'));
    $('.client_product_show_gallay_main').attr('src', $(this).attr('src'));
  });



});



