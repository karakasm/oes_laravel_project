@extends('layout.instructor.app')

@section('title','Detay')


@section('styles')
    <style>
        th {
            text-align: center;
        }

        td {
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
                        <li class="breadcrumb-item"><a href="{{ route('instructor.index') }}">Panel</a></li>
                        <li class="breadcrumb-item"><a href="{{route('instructor.course.index',['id'=>$course->id])}}">{{$course->name." - Crn: ".$course->id}}</a>
                        </li>
                        <li class="breadcrumb-item active"> Detaylar</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card" style="transform: none;">
                        <h5 class="card-header"> Sınıf Bilgileri </h5>
                        <div class="card-body table-responsive">
                            <table class="table table-borderless align-middle">
                                <tbody>
                                <tr>
                                    <td>
                                        <table class="table table-bordered table-responsive">
                                            <tbody>
                                            <tr bgcolor="#f8f8f8">
                                                <th scope="col">Crn</th>
                                                <th scope="col">Ders Kodu</th>
                                                <th scope="col">Ders Adı</th>
                                                <th scope="col">Dili</th>
                                            </tr>
                                            <tr>
                                                <td scope="col">{{$course->id}}</td>
                                                <td>{{ $course->code." ".$course->number }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{$course->language}}</td>
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
                                        <table class="table table-bordered table-responsive">
                                            <tbody>
                                            <tr bgcolor="#f8f8f8">
                                                <th scope="col">Kredi</th>
                                                <th scope="col">Kapasite</th>
                                                <th scope="col">Mevcut</th>
                                            </tr>
                                            <tr>
                                                <td>{{ $course->credit }}</td>
                                                <td>{{ $course->capacity }}</td>
                                                <td>{{count($course->users)}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-responsive">
                                            <tbody>
                                            <tr bgcolor="#f8f8f8">
                                                <th scope="col" style="text-align: start">Amaç</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: start">{{ $course->aim }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-responsive">
                                            <tbody>
                                            <tr bgcolor="#f8f8f8">
                                                <th scope="col" style="text-align: start">İçerik</th>
                                            </tr>
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
