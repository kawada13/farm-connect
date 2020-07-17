<nav class="navbar navbar-expand-md navbar-light">

    <a class="navbar-brand" href="{{ route('products.top') }}">食べチョク</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Nav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="Nav">

        <div class="form-inline my-2 my-lg-0 ml-auto">
            <div class="window-close">
                <p><i class="fas fa-window-close"></i></p>
            </div>
            <input class="form-control keyword" type="search" placeholder="商品/生産者を探す" aria-label="Search" name="keyword">
            <button class="btn btn-success btn-rounded p-2 m-0 organic_search" type="submit">検索</button>
        </div>

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


<div class="search_area pl-5 lime lighten-5">
    <div class="search_categories">
        <hr>
        <p class="text-default font-weight-bold">カテゴリー</p>
    </div>
    <div class="search_prefectures ">
        <hr>
        <p class="text-default font-weight-bold">生産地</p>
    </div>
</div>