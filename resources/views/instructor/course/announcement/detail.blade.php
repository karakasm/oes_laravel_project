@extends('layout.instructor.app')

@section('title','Duyuru Detay')

@section('content')
    <main class="pt-3 mb-5">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('instructor.index')}}">Panel</a></li>
                        <li class="breadcrumb-item"><a href="{{route('instructor.course.index',['course' => $course])}}">{{ $course->name." - Crn: ".$course->id }}</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('courses.announcements.index',['course'=>$course])}}">Duyurular</a></li>
                        <li class="breadcrumb-item active">{{$announcement->title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card" style="transform: none;">
                        <div class="card-header text-bg-primary">Duyuru Detay</div>
                        <div class="card-body">
                            <small class="text-danger float-end">{{$announcement->status}}</small>
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

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Çevrimiçi Eğitim Sistemi</strong>
                <small>Az Önce</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function (){
                //Duyuru Güncellendi mesajını gösterir.
            if('{{\Illuminate\Support\Facades\Session::exists('message')}}'){
                $('.toast-body').text('{{\Illuminate\Support\Facades\Session::pull('message')}}')
                $('.toast').toast({delay:5000})
                $('.toast').toast('show');
            }
        });
    </script>
@endsection

