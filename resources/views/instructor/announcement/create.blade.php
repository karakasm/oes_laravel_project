@extends('layout.instructor.app')

@section('title','Create Announcement')

@section('content')
    <main class="pt-3 mb-5">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('instructor.index') }}">Panel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Duyuru Ekle</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card" style="transform: none;">
                        <h5 class="card-header">Duyuru Paylaş</h5>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="row gx-3 gy-3 mt-3">
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label" id="title">Duyuru Başlığı</label>
                                        <input class="form-control shadow-none" type="text" name="title" id="title">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label" id="courses">Duyuru Sınıflarını Seç</label>
                                        <select class="form-select shadow-none" name="courses" id="courses" multiple>
                                            @foreach(session('courses') as $course)
                                                <option value="{{ $course->id }}">{{$course->code." ".$course->number." ".$course->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <textarea class="form-control shadow-none" name="content" id="content" placeholder="Duyuru İçeriği Buraya"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col-4 ">
                                        <input type="submit" class="btn btn-outline-primary w-50" value="Paylaş">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

