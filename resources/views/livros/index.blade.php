@extends('layouts.app')


@section('content')
    <h1>Livros de {{Auth::user()->name}}</h1>
    
    <form method="get" action="/livros/create">
        @csrf
    <button type="submit" class="btn btn-primary btn-sm">Adicionar Livro</button>   
    </form> 

<ul>
    @foreach ($livros as $livro)
    
    <li>
        
        <h3>{{ $livro->titulo }}</h1>
        <p>
            
            <a href="{{ url('livros/' . $livro->id) }}">{{ $livro->autor}}</a>
            <form action="{{route('livros.delete', $livro)}}" onclick="return confirm('Tem certeza que deseja excluir?')" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Deletar</button>
                </form>

        </p>
    </li>

    @endforeach
</ul>
@endsection