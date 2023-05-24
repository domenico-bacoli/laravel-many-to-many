@extends('layouts/admin')

@section('content')
    <div class="container">
        <div class="card-container">
            @foreach ($projects as $project)
            <div class="card-project">
                <div class="thumb">
                    <img src="{{$project->thumb}}" alt="anteprima progetto">
                </div>
                <div class="card-details">
                    <div class="title">{{$project->title}}</div>
                    <div class="button-more">
                        <a href="{{route('admin.projects.show', $project->slug)}}"><button class="btn btn-primary">More</button></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="add-button text-center my-5">
        <a href="{{route('admin.projects.create')}}"><button class="btn btn-primary">Aggiungi progetto</button></a>
    </div>

@endsection