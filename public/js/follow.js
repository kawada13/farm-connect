$(function () {
  
  // フォロー追加
  $(document).on('click', '.follow', function(){
    $.ajax('/api/member/follow',
      {
        type: 'post',
        data: {
          token: $.cookie("token_members"),
          client_id: $('#client_id').val(),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $('.follow_btn').html('');
        $('.follow_btn').html('<button class="btn btn-deep-orange my-4 unfollow">フォロー解除</button>');
      })
      .fail(function (data) {
        window.console.log(data);
      })
  });
  // フォロー削除
  $(document).on('click', '.unfollow', function(){
    $.ajax('/api/member/unfollow',
      {
        type: 'post',
        data: {
          token: $.cookie("token_members"),
          client_id: $('#client_id').val(),
        },
        dataType: 'json'
      }
    )
      .done(function (data) {
        window.console.log(data);
        $('.follow_btn').html('');
        $('.follow_btn').html('<button class="btn btn-light-blue  my-4 follow">フォローする</button>');
      })
      .fail(function (data) {
        window.console.log(data);
      })
  });

});
