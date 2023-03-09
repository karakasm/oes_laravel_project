@extends('layout.student.app')

@section('title','Detay')

@section('styles')
    <style>
        th{
            text-align: center;
        }

        td{
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <main class="pt-3 mb-5">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Panel</a></li>
                        <li class="breadcrumb-item  active"><a href="{{ route('student.course.index', ['course' => $course]) }}">{{ $course->name." - Crn: ".$course->id }}</a></li>
                        <li class="breadcrumb-item">Detaylar</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
               <div class="col">
                <div class="card" style="transform: none;">
                    <h5 class="card-header">Ders Bilgileri</h5>
                    <div class="card-body table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr bgcolor="#f8f8f8">
                                            <th scope="col">Eğitmen İsmi</th>
                                            <th scope="col">Crn</th>
                                            <th scope="col">Dersin Kodu</th>
                                            <th scope="col">Dersin Adı</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $instructor->name." ".$instructor->surname }}</td>
                                            <td>{{ $course->id }}</td>
                                            <td>{{ $course->code." ".$course->number }}</td>
                                            <td>{{ $course->name }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-responsive">
                                        <tbody>
                                        <tr bgcolor="#f8f8f8">
                                            <th scope="col">Gün</th>
                                            <th scope="col">Başlangıç</th>
                                            <th scope="col">Bitiş</th>
                                            <th scope="col">Bina</th>
                                            <th scope="col">Derslik</th>
                                        </tr>
                                        @foreach($course->days as $day)
                                            <tr>
                                                <td>{{ $day->day }}</td>
                                                <td>{{ $day->pivot->open_time }}</td>
                                                <td>{{ $day->pivot->close_time }}</td>
                                                <td>{{ $day->pivot->building }}</td>
                                                <td>{{ $day->pivot->room }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr bgcolor="#f8f8f8">
                                            <th scope="col">Dili</th>
                                            <th scope="col">Kredi</th>
                                            <th scope="col">Mevcut</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $course->language }}</td>
                                            <td>{{ $course->credit }}</td>
                                            <td>{{ $course->enrolled }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr bgcolor="#f8f8f8">
                                            <th scope="col" style="text-align: start">Amaç</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="text-align: start">{{ $course->aim }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr bgcolor="#f8f8f8">
                                            <th scope="col" style="text-align: start">İçerik</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="text-align: start">{{ $course->content }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </main>
@endsection


