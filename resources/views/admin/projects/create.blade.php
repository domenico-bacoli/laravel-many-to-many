@extends('layouts/admin')

@section('content')
    
    <main class="home-container d-flex flex-column align-items-center py-5">
        <h1 class="mb-5">Inserisci un nuovo Progetto</h1>
        <form class="w-50" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">Titolo</label>
                                                                                    {{-- con il metodo old() facciamo in modo che il dato rimanga anche se l'utente ha inviato il form senza compilare tutti i campi --}}
                <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title')}}">
                @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3 ">
                <label for="thumb">Anteprima</label>
                <input class="form-control @error('thumb') is-invalid @enderror" type="file" id="thumb" name="thumb">
                @error('thumb')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 ">
                <label for="link">github link</label>
                <input class="form-control @error('link') is-invalid @enderror" type="text" id="price" name="link" value="{{old('link')}}">
                @error('link')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror    
            </div>

            {{-- relazione one to many  --}}
            <div class="mb-3">
                <label for="type_id">Tipo</label>
                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">

                    <option value="">Nessuna</option>

                    @foreach ($types as $type)
                        <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
                    @endforeach
                </select>
                @error('type_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            {{--  Relazione many to many --}}
            <div class="mb-3 form-group">
                <div>Tags</div>

                @foreach ($technologies as $technology)
                <div class="form-check">
                    <input type="checkbox" id="technology-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}">
                    <label for="technology-{{$technology->id}}">{{ $technology->name}}</label>
                </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="description">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Aggiungi</button>
        </form>

    </main>
@endsection