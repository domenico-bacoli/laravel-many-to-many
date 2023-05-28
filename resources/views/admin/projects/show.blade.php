@extends('layouts/admin')

@section('content')
    <div class="d-flex justify-content-center mt-5">
      <div class="card-project card-show text-center">
          <div class="thumb">
              <img src="{{asset('storage/' . $project->thumb)}}" alt="anteprima progetto">
          </div>
          <div class="card-details">
              <div class="title">{{$project->title}}</div>
              <div class="link">{{$project->link}}</div>
              <div class="language">{{$project->Languages}}</div>
              <p>{{$project->description}}</p>
              <div class="type">Tipo: {{$project->type->name ?? 'nessuna'}}</div>
              <div class="d-flex">
                @foreach ($project->technologies as $technology)
                
                  <span class="badge rounded-pill mx-1" style="background-color: {{$technology->color}}">{{$technology->name}}</span>
                @endforeach
              </div>
       
             
              <div class="button-edit">
                  <a href="{{route('admin.projects.edit', $project)}}" class="me-2"><button class="btn btn-primary">Modifica</button></a>
                      <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Elimina
                        </button>
                  </form>
  
                  {{-- MODAL --}}
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Vuoi davvero eliminare definitivamente questo progetto??
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Annulla</button>
  
                              {{-- Form per l'eliminazione del comic dal database --}}
                              <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-primary" type="submit">Elimina</button> 
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
          </div>
      </div>
  </div>
    

@endsection