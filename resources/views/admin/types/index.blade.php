@extends('layouts.admin')

@section('content')

<div class="container py-3">
    <h1>Tipologie</h1>

    <table class="table table-striped">

      <thead>
        <th>Nome</th>
        <th>Descrizione</th>
        <th>N° progetti</th>
        <th></th>
      </thead>

      <tbody>
        @foreach($types as $type)
        
          <tr>
            <td>{{$type->name}}</td>
            <td>{{$type->description}}</td>
            <td>{{count($type->projects)}}</td>
            <td><a href="{{route('admin.types.show', $type)}}"><i class="fa-solid fa-magnifying-glass text-secondary"></i></a></td>
          </tr>
        @endforeach

      </tbody>

    </table>

    <div class="d-flex justify-content-center py-3">
      <a href="#" class="btn btn-primary">Aggiungi una categoria</a>
    </div>
</div>
    
@endsection