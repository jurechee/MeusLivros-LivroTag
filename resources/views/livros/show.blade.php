@extends('layouts.app')

@section('content')
<h1>{{ $livro->titulo }}</h1>
<a href="{{ url('livros/' . $livro->id . '/edit') }}">Alterar</a>
<form action="{{route('livros.delete', $livro)}}" onclick="return confirm('Tem certeza que deseja excluir?')" method="POST">
@csrf
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger">Deletar</button>
</form>
{{-- <a href="{{route('livros.delete', ['id'=>$livro->id])}}" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</a> --}}


<h2>Autor</h2>
<p>{{ $livro->autor }}</p>

<h2>Numero de Paginas</h2>
<p>{{ $livro->paginas }} paginas</p>

<h2>Ano de publicacao</h2>
<p>{{ $livro->ano_publicacao }}</p>

<p>Categoria:</p>
@foreach ($livro->tags as $tag)
<p> {{ $tag->name }}</p>
@endforeach

<a href="{{ url('/') }}">Voltar</a>
@endsection