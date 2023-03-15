@extends('layout.student.app')

@section('title', $course->name)


@section('content')
    <main class="pt-3 mb-5">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Panel</a></li>
                        <li class="breadcrumb-item  active">{{ $course->name." - Crn: ".$course->id }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row py-3">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card text-white my-3 mb-lg-0 bg-success border-0">
                        <div class="card-body row">
                            <div class="col-8 d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Sınıf Bilgileri</h4>
                            </div>
                            <div class="col-4">
                                <i class="uil uil-university text-white display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-white text-center">
                            <a href="{{ route('student.course.detail',['course' => $course]) }}" class="text-white text-decoration-none">
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
                                <h4 class="card-title">{{count($course->announcements->where('status','active')->all())}}</h4>
                                <p class="card-text">Duyurular</p>
                            </div>
                            <div class="col-4">
                                <i class="uil uil-megaphone text-white display-4"></i>
                            </div>
                        </div>
                        <div class="card-footer text-white text-center">
                            <a href="{{route('student.courses.announcements.index',['course' => $course])}}" class="text-white text-decoration-none">
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
