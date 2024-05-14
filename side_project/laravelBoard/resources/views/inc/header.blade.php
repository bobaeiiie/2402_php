<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mini Board</a>
            @auth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                게시판
                            </a>
                            <ul class="dropdown-menu dropdown-menu-primary text-light">
                                @foreach($globalBoardNameInfo as $item)
                                <li><a class="dropdown-item text-dark" href="{{ route('board.index').'?type='.$item->type }} ">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <a href="{{ route('logout') }}" class="navbar-nav nav-link text-light" role="button">로그아웃</a>
                </div>
            @endauth
            @guest
            <a href="{{ route('regist.index') }}" class="navbar-nav nav-link text-light" role="button">회원가입</a>
            @endguest
        </div>
    </nav>
</header>