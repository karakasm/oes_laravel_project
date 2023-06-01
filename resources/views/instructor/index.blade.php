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
                    <h5 class="card-header text-center">
                        Son Duyurular
                    </h5>
                    @if(count(session('announcements')))
                    @foreach(session('announcements') as $anno)
                    <div class="list-group list-group-flush">
                        <a href="{{route('courses.announcements.show',['course'=>session('courses')->where('id',$anno->course_id)->first(),'announcement' => $anno])}}"
                            class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="text-truncate">{{$anno->title}}</h5>
                            </div>
                            <div class="d-flex flex-column align-items-start justify-content-between">
                                <small class="text-muted d-inline-block text-truncate">{{$anno->course->code."
                                    ".$anno->course->number." -
                                    ".$anno->course->name." / CRN: ".$anno->course->id}}</small>
                                <small
                                    class="text-muted d-inline-block text-truncate">{{$anno->updated_at->diffForHumans(\Illuminate\Support\Carbon::now())}}</small>

                                <small class="text-danger d-inline-block text-truncate">{{$anno->status}}</small>
                            </div>

                        </a>
                        <hr class="m-0">
                    </div>
                    @endforeach
                    @else
                    <div class="list-group list-group-flush">
                        <li class="list-group-item">Paylaştığınız herhangi bir duyuru bulunmamaktadır.</li>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 text-bg-dark " style="transform: none;">
                    <h5 class="card-header text-center">
                        Son Dosyalar
                    </h5>
                    @if(count(session('folders')))
                    @foreach(session('folders') as $folder)
                    <div class="list-group list-group-flush">
                        <a href="{{route('courses.folders.index',['course'=>session('courses')->where('id',$folder->course_id)->first()])}}"
                            class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="text-truncate">{{$folder->name}}</h5>
                            </div>
                            <div class="d-flex flex-column align-items-start justify-content-between">
                                <small class="text-muted d-inline-block text-truncate">{{$folder->course->code."
                                    ".$folder->course->number." -
                                    ".$folder->course->name." / CRN: ".$folder->course->id}}</small>
                                <small
                                    class="text-muted d-inline-block text-truncate">{{$folder->created_at->diffForHumans(\Illuminate\Support\Carbon::now())}}</small>
                            </div>
                        </a>
                        <hr class="m-0">
                    </div>
                    @endforeach
                    @else
                    <div class="list-group list-group-flush">
                        <li class="list-group-item">Paylaştığınız herhangi bir dosya bulunmamaktadır.</li>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection