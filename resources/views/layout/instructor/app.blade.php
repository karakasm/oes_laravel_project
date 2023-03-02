<!doctype html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Instructor - ÇES</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    @yield('scripts')
</head>
<body>

<!--navbar starts-->
<nav class="navbar navbar-expand-lg fixed-top bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <!--offcanvas trigger starts-->
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
            <span class="navbar-toggler-icon" data-bs-target="#offcanvasScrolling"></span>
        </button>
        <!--offcanvas trigger ends-->
        <a class="navbar-brand me-auto fs-5" href="{{ route('instructor.index') }}">
            Çevrimiçi Eğitim
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item dropdown mt-3 mt-lg-0">
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                        <span style="font-size:14px;">
                            @if(session()->has('user'))
                                {{ session('user.username') }}
                            @else
                                Kullanıcı Ad Soyadı
                            @endif
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item" type="button">Bildirimler <span class="badge text-bg-primary">4</span></button></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('handle.logout') }}" role="button">Çıkış <i class="uil uil-signout" style="color: var(--red);"></i></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--navbar ends-->

<!--offcanvas starts-->
<div class="offcanvas offcanvas-start bg-black text-white sidebar-nav" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-body">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <a href="{{ route('instructor.index') }}" class="nav-link px-3 active">
                        <span class="me-2 link-icon"><i class="uil uil-estate"></i></span>
                        <span class="link-name">Panel</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 d-flex align-items-center sidebar-link" data-bs-toggle="collapse" href="#sınıf" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-3 link-icon"><i class="uil uil-university"></i></span>
                        <span class="link-name">Sınıf</span>
                        <span class="ms-auto d-inline-flex link-icon down-icon">
                        <i class="uil uil-angle-down"></i>
                    </span>
                    </a>
                    <div class="collapse" id="sınıf">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="#" class="nav-link px-3">
                                    <span class="link-icon"><i class="uil uil-plus"></i></span>
                                    <span class="link-name">Oluştur</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 d-flex align-items-center sidebar-link" data-bs-toggle="collapse" href="#duyuru" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-3 link-icon"><i class="uil uil-megaphone"></i></span>
                        <span class="link-name">Duyuru</span>
                        <span class="ms-auto d-inline-flex link-icon down-icon">
                        <i class="uil uil-angle-down"></i>
                    </span>
                    </a>
                    <div class="collapse" id="duyuru">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="#" class="nav-link px-3">
                                    <span class="link-icon"><i class="uil uil-plus"></i></span>
                                    <span class="link-name">Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 d-flex align-items-center sidebar-link" data-bs-toggle="collapse" href="#dosya" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-3 link-icon"><i class="uil uil-file"></i></span>
                        <span class="link-name">Dosya</span>
                        <span class="ms-auto d-inline-flex link-icon down-icon">
                        <i class="uil uil-angle-down"></i>
                    </span>
                    </a>
                    <div class="collapse" id="dosya">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="#" class="nav-link px-3">
                                    <span class="link-icon"><i class="uil uil-plus"></i></span>
                                    <span class="link-name">Paylaş</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 d-flex align-items-center sidebar-link" data-bs-toggle="collapse" href="#odev" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-3 link-icon"><i class="uil uil-clipboard"></i></span>
                        <span class="link-name">Ödev</span>
                        <span class="ms-auto d-inline-flex link-icon down-icon">
                        <i class="uil uil-angle-down"></i>
                    </span>
                    </a>
                    <div class="collapse" id="odev">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="#" class="nav-link px-3">
                                    <span class="link-icon"><i class="uil uil-plus"></i></span>
                                    <span class="link-name">Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 d-flex align-items-center sidebar-link" data-bs-toggle="collapse" href="#not" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-3 link-icon"><i class="uil uil-notes"></i></span>
                        <span class="link-name">Not</span>
                        <span class="ms-auto d-inline-flex link-icon down-icon">
                        <i class="uil uil-angle-down"></i>
                    </span>
                    </a>
                    <div class="collapse" id="not">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="#" class="nav-link px-3">
                                    <span class="link-icon"><i class="uil uil-plus"></i></span>
                                    <span class="link-name">Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="nav-link px-3">
                        <span class="me-2 link-icon"><i class="bi bi-person-fill-add"></i></span>
                        <span class="link-name">Öğrenciler</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!--offcanvas ends-->


@yield('content')

<!--footer starts-->
<footer id="footer" class="text-bg-dark text-center p-2 fixed-bottom mt-3 mt-lg-0">
    <p class="m-0">Copyrights Çevrimiçi Eğitim Sistemi, &copy; 2023</p>
</footer>
<!--footer ends-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
