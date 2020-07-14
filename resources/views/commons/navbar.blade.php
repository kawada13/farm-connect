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


<div class="search_area">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="veg" name="categories" value="野菜">
        <label class="custom-control-label" for="veg">野菜</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="fruit" name="categories" value="果物">
        <label class="custom-control-label" for="fruit">果物</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="meat" name="categories" value="肉">
        <label class="custom-control-label" for="meat">肉</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="fish" name="categories" value="魚介類">
        <label class="custom-control-label" for="fish">魚介類</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="egg" name="categories" value="卵・乳製品">
        <label class="custom-control-label" for="egg">卵・乳製品</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="honey" name="categories" value="はちみつ">
        <label class="custom-control-label" for="honey">はちみつ</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="drink" name="categories" value="お酒">
        <label class="custom-control-label" for="drink">お酒</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="tea" name="categories" value="お茶">
        <label class="custom-control-label" for="tea">お茶</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="rice" name="categories" value="米・穀類">
        <label class="custom-control-label" for="rice">米・穀類</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="manufacturing" name="categories" value="加工品">
        <label class="custom-control-label" for="manufacturing">加工品</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="flower" name="categories" value="花・植物">
        <label class="custom-control-label" for="flower">花・植物</label>
    </div>

</div>