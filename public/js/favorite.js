$(function () {
  
  // お気に入り追加
  $(document).on('click', '.favorite', function(){
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
        $('.favorite_btn').html('<button class="btn btn-deep-orange btn-block my-4 unfavorite">お気に入り解除</button>');
      })
      .fail(function (data) {
        window.console.log(data);
      })
  });
  // お気に入り削除
  $(document).on('click', '.unfavorite', function(){
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
