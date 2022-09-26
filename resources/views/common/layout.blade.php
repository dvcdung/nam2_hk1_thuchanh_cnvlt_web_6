<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-page')</title>
    {{-- Library --}}
    @yield('link-lib')
    {{-- Link --}}
    @yield('link')
    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">TH2</a> 
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/nam2_hk1_thuchanh_web_nang_cao/public/thuchanh2-bai01">Bài 1</a></li>
                            <li><a class="dropdown-item" href="/nam2_hk1_thuchanh_web_nang_cao/public/thuchanh2-bai02">Bài 2</a></li>
                            <li><a class="dropdown-item" href="/nam2_hk1_thuchanh_web_nang_cao/public/thuchanh2-bai03">Bài 3</a></li>
                            <li><a class="dropdown-item" href="/nam2_hk1_thuchanh_web_nang_cao/public/thuchanh2-bai04">Bài 4</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">TH3</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/nam2_hk1_thuchanh_web_nang_cao/public/thuchanh3-bai01">Bài 1</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">TH4</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/nam2_hk1_thuchanh_web_nang_cao/public/thuchanh4-giohang">Giỏ hàng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('main-content')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js" integrity="sha512-9GacT4119eY3AcosfWtHMsT5JyZudrexyEVzTBWV3viP/YfB9e2pEy3N7WXL3SV6ASXpTU0vzzSxsbfsuUH4sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</body>
</html>