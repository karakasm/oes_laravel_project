@extends('layout.student.app')

@section('title','Home')

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
            <div class="row gy-5 gx-3" id="cards">
                <div class="col-12 col-md-4">
                    <div class="card border-0 text-bg-success " style="transform: none;">
                        <h5 class="card-header">
                            Son Duyurular
                        </h5>
                        @if(count(session('announcements')))
                            @foreach(session('announcements') as $anno)
                                <div class="list-group list-group-flush">
                                    <a href="{{route('student.courses.announcements.show',['course'=>session('courses')->where('id',$anno->course_id)->first(),'announcement'=>$anno])}}" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5>{{$anno->title}}</h5>
                                            <small class="text-muted">{{$anno->updated_at->diffForHumans(\Illuminate\Support\Carbon::now())}}</small>
                                        </div>
                                        <small class="text-muted">{{$anno->course->code." ".$anno->course->number." - ".$anno->course->name." / CRN: ".$anno->course->id}}</small>
                                    </a>
                                    <hr class="m-0">
                                </div>
                            @endforeach
                        @else
                            <div class="list-group list-group-flush">
                                <li class="list-group-item">Herhangi bir duyuru bulunmamaktadır.</li>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 text-bg-dark " style="transform: none;">
                        <h5 class="card-header">
                            Son Duyurular
                        </h5>
                        @if(count(session('announcements')))
                            @foreach(session('announcements') as $anno)
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5>{{$anno->title}}</h5>
                                            <small class="text-muted">{{$anno->updated_at->diffForHumans(\Illuminate\Support\Carbon::now())}}</small>
                                        </div>
                                        <small class="text-muted">MAT 4902 - Matematik Müh. Tasarımı II / CRN: 21897</small>
                                    </a>
                                    <hr class="m-0">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 text-bg-danger " style="transform: none;">
                        <h5 class="card-header">
                            Son Duyurular
                        </h5>
                        @if(count(session('announcements')))
                            @foreach(session('announcements') as $anno)
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5>{{$anno->title}}</h5>
                                            <small class="text-muted">{{$anno->created_at->diffForHumans(\Illuminate\Support\Carbon::now())}}</small>
                                        </div>
                                        <small class="text-muted">{{$anno->course->code." ".$anno->course->number." - ".$anno->course->name." - Crn: ".$anno->course->id}}</small>
                                    </a>
                                    <hr class="m-0">
                                </div>
                            @endforeach
                        @endif
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


        $(document).ready(function(){
            //Her 10 saniyede bir sayfayı yenilemeden sadece card kısımlarını yenileme.
            setInterval(function (){
                $.get('/student/index',function (data,status){
                    $('#cards').empty();
                    $('#cards').html($(data).find('#cards').html());
                }) ;
            },10000)
        });
    </script>
@endsection
