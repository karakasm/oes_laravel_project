@extends('layout.instructor.app')

@section('title','Home')


@section('content')
    <main class="pt-3 mb-5">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active fs-4" aria-current="page">Panel</li>
                    </ol>
                </nav>
            </div>
            <div class="row gy-5 gx-3">
                <div class="col-12 col-md-4">
                        <div class="card border-0 text-bg-success " style="transform: none;">
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
                                            <small class="text-muted">{{$anno->course->code." ".$anno->course->number." - ".$anno->course->name." / CRN: ".$anno->course->id}}</small>
                                        </a>
                                        <hr class="m-0">
                                    </div>
                                @endforeach
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
                                            <small class="text-muted">{{$anno->created_at->diffForHumans(\Illuminate\Support\Carbon::now())}}</small>
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
@endsection

