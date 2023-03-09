@extends('layout.student.app')

@section('title')
    Home
@endsection

@section('content')
    <!--main starts-->
    <main class="pt-3 mb-5">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active fs-4" aria-current="page">Panel</li>
                    </ol>
                </nav>
            </div>
            <div class="row py-3">
                <div class="col-lg-6">
                    <div class="py-2 px-3" style="background-color: var(--gray-400);">
                        <span class="fw-bold fs-5"><i class="uil uil-table"></i></span>
                        <span class="fw-bold fs-5">Son Duyurular</span>
                    </div>
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                        <tr>
                            <th scope="col">Sınıf</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Sınıf 1</td>
                            <td>Başlık 1</td>
                            <td>05 Ocak 13:34</td>
                        </tr>
                        <tr>
                            <td>Sınıf 2</td>
                            <td>Başlık 2</td>
                            <td>03 Ocak 12:00</td>
                        </tr>
                        <tr>
                            <td>Sınıf 3</td>
                            <td>Başlık 3</td>
                            <td>30 Aralık 23:30</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <div class="py-2 px-3" style="background-color: var(--gray-400);">
                        <span class="fw-bold fs-5"><i class="uil uil-table"></i></span>
                        <span class="fw-bold fs-5">Son Ödevler</span>
                    </div>
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                        <tr>
                            <th scope="col">Sınıf</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Sınıf 1</td>
                            <td>Başlık 1</td>
                            <td>05 Ocak 13:34</td>
                        </tr>
                        <tr>
                            <td>Sınıf 2</td>
                            <td>Başlık 2</td>
                            <td>03 Ocak 12:00</td>
                        </tr>
                        <tr>
                            <td>Sınıf 3</td>
                            <td>Başlık 3</td>
                            <td>30 Aralık 23:30</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold"> Son Duyurular
                                <a href="#" class="btn btn-danger float-end">Hepsini Göster</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Sınıf</th>
                                    <th scope="col">Başlık</th>
                                    <th scope="col">Tarih</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider" style="border-top-color:black;">
                                <tr>
                                    <td>Sınıf 1</td>
                                    <td>Başlık 1</td>
                                    <td>05 Ocak 13:34</td>
                                </tr>
                                <tr>
                                    <td>Sınıf 2</td>
                                    <td>Başlık 2</td>
                                    <td>03 Ocak 12:00</td>
                                </tr>
                                <tr>
                                    <td>Sınıf 3</td>
                                    <td>Başlık 3</td>
                                    <td>30 Aralık 23:30</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--main ends-->
@endsection

@section('scripts')
    <script>
        //Tooltip
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endsection
