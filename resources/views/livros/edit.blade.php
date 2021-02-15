@extends('layouts.app')


@section('content')
<h1>Alterar Livro</h1>

<form method="post" action="/livros/{{ $livro->id }}"> 
@method('PUT')
@csrf

<div>
    <input type="text" name="titulo" placeholder="Titulo" value="{{$livro->titulo}}">
</div>

<div>
        <input type="text" name="autor" placeholder="Autor:" value="{{$livro->autor}}">
    </div>

    <div>
        <input type="number" name="paginas" placeholder="Paginas:" value="{{$livro->paginas}}">
    </div>

    <div>
        <input type="number" name="ano_publicacao" placeholder="Ano de Publicacao:" value="{{$livro->ano_publicacao}}">
    </div>

    <button>Alterar</button>

</form>   
@endsection