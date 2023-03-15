@extends('layout.student.app')

@section('title','Duyuru Detay')

@section('content')
    <main class="pt-3 mb-5">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('student.index')}}">Panel</a></li>
                        <li class="breadcrumb-item"><a href="{{route('student.course.index',['course' => $course])}}">{{ $course->name." - Crn: ".$course->id }}</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('student.courses.announcements.index',['course'=>$course])}}">Duyurular</a></li>
                        <li class="breadcrumb-item active">{{$announcement->title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card" style="transform: none;">
                        <div class="card-header text-bg-primary">Duyuru Detay</div>
                        <div class="card-body">
                            <h5 class="card-title">{{$announcement->title}}</h5>
                            <p class="card-text">{!! htmlspecialchars_decode($announcement->content)  !!}</p>
                        </div>
                        <div class="card-footer">
                            <small>{{ $announcement->updated_at->format("d F Y H:i")}}</small>
                            @php
                                $announcer = \Illuminate\Support\Facades\DB::table('users')->select('name','surname')->where('id',$course->instructor_id)->first();
                            @endphp
                            <small class="float-end">{{$announcer->name." ".$announcer->surname}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
