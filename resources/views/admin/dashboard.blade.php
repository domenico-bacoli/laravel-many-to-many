@extends('layouts/admin')

@section('content')
    <div class="container text-center">
        <h2 class="pt-5">Benvenuto <strong>{{$users[0]->name}}</strong></h2>
         
        <br>
        <a href="{{route('admin.projects.index')}}">gestisci i tuoi progetti</a>
    </div>
    
@endsection