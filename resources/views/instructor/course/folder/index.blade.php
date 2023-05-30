@extends('layout.instructor.app')

@section('title','Dosyalar');

@section('content')
<main class="pt-3 mb-5">
    <div class="container-fluid">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('instructor.index')}}">Panel</a></li>
                    <li class="breadcrumb-item"><a href="{{route('instructor.course.index',['course' => $course])}}">{{
                            $course->name." - Crn: ".$course->id }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dosyalar</li>
                </ol>
            </nav>
        </div>
        <livewire:show-folders :course="$course" />
    </div>
</main>
@endsection