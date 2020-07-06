<nav class="navbar navbar-expand-md navbar-light">

  <a class="navbar-brand" href="{{ route('products.top') }}">食べチョク</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Nav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="Nav">

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
      </li>
      @if (Cookie::get('token_members'))
      <li class="nav-item">
      <a class="nav-link" href="{{ route('member.show') }}">マイページ</a>
      </li>
      @else
      <li class="nav-item">
      <a class="nav-link" href="{{ route('member.create') }}">登録</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('member.login') }}">ログイン</a>
      </li>
      @endif
    </ul>

</nav>

