@extends('layouts.app')

@section('content')
<h1>Novos Livros</h1>

    <form method="POST" action="/livros">
        @csrf
        <div>
            <input type="text" name="titulo" placeholder="Titulo:">
        </div>

        <div>
            <input type="text" name="autor" placeholder="Autor:">
        </div>

        <div>
            <input type="number" name="paginas" placeholder="Paginas:">
        </div>

        <div>
            <input type="number" name="ano_publicacao" placeholder="Ano de Publicacao:">
        </div>

        <div class="control">
            <select name="tags[]" multiple>
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    
                @endforeach
            
              </select>

           @error('tags')    
              <p class="help is-danger"> {{ $errors->first('tags')}} </p> {{-- require tag  --}}
          @enderror
          </div>
      </div>

        <Button>Salvar</Button>
    </form>
    
@endsection