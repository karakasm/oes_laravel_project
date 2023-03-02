@extends('layout.instructor.app');

@section('title','Home')


@section('content')
    <main class="pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-4">Panel</div>
            </div>
            <div class="row py-3">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card text-white my-3 mb-lg-0 bg-success border-0">
                        <div class="card-body row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <h4 class="card-title">12</h4>
                                <p class="card-text">Sınıflar</p>
                            </div>
                            <div class="col-4">
                                <i class="uil uil-university text-white display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-white text-center">
                            <a href="#" class="text-white text-decoration-none">
                                <span class="link-name">Detay Göster</span>
                                <i class="uil uil-arrow-circle-right link-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card text-white my-3 mb-lg-0 bg-warning border-0">
                        <div class="card-body row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <h4 class="card-title">20</h4>
                                <p class="card-text">Duyurular</p>
                            </div>
                            <div class="col-4">
                                <i class="uil uil-megaphone text-white display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-white text-center">
                            <a href="#" class="text-white text-decoration-none">
                                <span class="link-name">Detay Göster</span>
                                <i class="uil uil-arrow-circle-right link-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card text-white my-3 mb-lg-0 bg-info border-0">
                        <div class="card-body row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <h4 class="card-title">10</h4>
                                <p class="card-text">Dosyalar</p>
                            </div>
                            <div class="col-4">
                                <i class="uil uil-file text-white display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-white text-center">
                            <a href="#" class="text-white text-decoration-none">
                                <span class="link-name">Detay Göster</span>
                                <i class="uil uil-arrow-circle-right  link-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card text-white my-3 mb-lg-0 bg-danger border-0">
                        <div class="card-body row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <h4 class="card-title">8</h4>
                                <p class="card-text">Ödevler</p>
                            </div>
                            <div class="col-4">
                                <i class="uil uil-clipboard text-white display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-white text-center">
                            <a href="#" class="text-white text-decoration-none">
                                <span class="link-name">Detay Göster</span>
                                <i class="uil uil-arrow-circle-right link-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card text-white my-3 mb-lg-0 bg-primary border-0">
                        <div class="card-body row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <h4 class="card-title">100</h4>
                                <p class="card-text">Öğrenciler</p>
                            </div>
                            <div class="col-4">
                                <i class="uil uil-user-plus text-white display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-white text-center">
                            <a href="#" class="text-white text-decoration-none">
                                <span class="link-name">Detay Göster</span>
                                <i class="uil uil-arrow-circle-right link-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card text-white my-3 mb-lg-0 bg-secondary border-0">
                        <div class="card-body row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <h4 class="card-title">4</h4>
                                <p class="card-text">Notlar</p>
                            </div>
                            <div class="col-4">
                                <i class="uil uil-notes text-white display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-white text-center">
                            <a href="#" class="text-white text-decoration-none">
                                <span class="link-name">Detay Göster</span>
                                <i class="uil uil-arrow-circle-right link-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

