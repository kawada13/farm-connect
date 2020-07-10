<nav class="navbar navbar-expand-md navbar-light">

    <a class="navbar-brand" href="{{ route('products.top') }}">食べチョク</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Nav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="Nav">

        <form class="form-inline my-2 my-lg-0 ml-auto" action="/products" method="GET">
            <input class="form-control" type="search" placeholder="商品/生産者を探す" aria-label="Search" name="keyword">
            <button class="btn btn-success btn-rounded p-2 m-0" type="submit">検索</button>
        </form>

        <ul class="navbar-nav">
            @if (Cookie::get('token_members'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('member.show') }}">マイページ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('member.favorite.index') }}">お気に入り</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">購入履歴</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">生産者の方はこちら</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('client.create') }}">登録</a>
                    <a class="dropdown-item" href="{{ route('client.login') }}">ログイン</a>
                </div>
            </li>
            @elseif (Cookie::get('token_clients'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('client.mypage') }}">マイページ</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('member.create') }}">登録</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('member.login') }}">ログイン</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">生産者の方はこちら</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('client.create') }}">登録</a>
                    <a class="dropdown-item" href="{{ route('client.login') }}">ログイン</a>
                </div>
            </li>
            @endif

        </ul>


    </div>

</nav>