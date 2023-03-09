@extends('layout.instructor.app')

@section('title','Courses')

@section('content')
    <main class="pt-3 mb-5">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('instructor.index')}}">Panel</a></li>
                        <li class="breadcrumb-item active">{{ $course->name." - Crn: ".$course->id }}</li>
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
                            <a href="{{route('instructor.course.detail',['id'=>$course->id])}}" class="text-white text-decoration-none">
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
{{--    <main class="pt-3 mb-5">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="{{ route('instructor.index') }}">Panel</a></li>--}}
{{--                        <li class="breadcrumb-item  active"> Sınıflar </li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--            <div class="row mb-3">--}}
{{--                <div class="col">--}}
{{--                    @if(count(session('courses')))--}}
{{--                    <div class="card" style="transform: none;">--}}
{{--                        <h5 class="card-header">--}}
{{--                            Sınıflarım--}}
{{--                        </h5>--}}
{{--                        <div class="card-body table-responsive">--}}
{{--                            <table class="table table-striped align-middle">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">#</th>--}}
{{--                                    <th scope="col">Kod</th>--}}
{{--                                    <th scope="col">Numara</th>--}}
{{--                                    <th scope="col">İsim</th>--}}
{{--                                    <th scope="col">Detay</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody class="table-group-divider">--}}
{{--                                    @foreach(session('courses') as $course)--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">{{ $loop->iteration }}</th>--}}
{{--                                            <td>{{ $course->code }}</td>--}}
{{--                                            <td>{{ $course->number }}</td>--}}
{{--                                            <td>{{ $course->name }}</td>--}}
{{--                                            <td><a class="btn btn-sm btn-outline-danger" href="{{ route('instructor.course.detail',['id'=>$course->id]) }}" role="button">Detay</a></td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}
@endsection
