@extends('layouts/admin')

@section('content')
    <div class="container mt-5 text-center">
        <h2>Benvenuto <strong>{{$users[0]->name}}</strong></h2>
         
        <br>
        <a href="{{route('admin.projects.index')}}">gestisci i tuoi progetti</a>
    </div>
    
@endsection