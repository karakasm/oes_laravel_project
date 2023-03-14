@extends('layout.instructor.app')

@section('title','Düzenle')

@section('content')
    <main class="pt-3 mb-5">
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('instructor.index')}}">Panel</a></li>
                        <li class="breadcrumb-item"><a href="{{route('instructor.course.index',['course' => $course])}}">{{ $course->name." - Crn: ".$course->id }}</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('courses.announcements.index',['course' => $course])}}">Duyurular</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('courses.announcements.show',['course' => $course,'announcement' => $announcement])}}">{{$announcement->title}}</a></li>
                        <li class="breadcrumb-item active">Güncelle</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card border-0" style="transform: none;">
                        <h5 class="card-header text-primary">Duyuru Düzenle</h5>
                        <div class="card-body">
                            <form action="{{route('courses.announcements.update',['course' => $course,'announcement'=>$announcement])}}" method="POST" enctype="multipart/form-data" class="py-4 px-3 mb-2 rounded-3 shadow border border-1 needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="row ">
                                    <div class="col-12">
                                        <label class="form-label" id="title">Başlık</label>
                                        <input class="form-control shadow-none" type="text" name="title" id="title" value="{{$announcement->title}}" required>
                                        <div class="invalid-feedback">
                                            Duyuru için bir başlık giriniz!
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 flex-column align-items-start justify-content-center g-2">
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="status" value="pending" id="pending" @if($announcement->status === "pending") checked @endif required>
                                        <label class="form-check-label" for="pending">Taslak</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="status" value="active" id="active" @if($announcement->status === "active") checked @endif required>
                                        <label class="form-check-label" for="active">Yayınla</label>
                                        <div class="invalid-feedback">Duyuru paylaşım şeklini belirtiniz!</div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label class="form-label">İçerik</label>
                                        <textarea class="form-control shadow-none"  name="content" id="content" required>
                                            {!! $announcement->content !!}
                                        </textarea>
                                        <div class="invalid-feedback">
                                            Duyuru için bir içerik giriniz!
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col-6">
                                        <input type="submit" class="btn btn-outline-primary w-100" value="Güncelle">
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


        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection

