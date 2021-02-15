<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
    public function index()
    {
        
        $livros = Livro::where('user_id', Auth::user()->id)->get();
       
        // dd($livros);
        return view('/livros.index', ['livros' => $livros]);
    }

    public function show(Livro $livro)
    {
        return view('/livros.show',
        [
         'livro' => $livro   
        ]);
    }

    public function create()
    {
        return view('/livros.create',
        [
            'tags' => Tag::all()
        ]);
        
    }

    public function store()
    {
        $livro = new Livro($this->validateLivro());
        $livro->user_id = auth()->id();
        $livro->save();
        $livro->tags()->attach(request('tags'));
        
        
       
        return redirect('/');
    }

    public function edit(Livro $livro)
    {
        return view('/livros.edit', 
        [
            'livro' => $livro
        ]);
    }

    public function update(Livro $livro)
    {
        $livro->update($this->validateLivro());

        return redirect('livros/' . $livro->id);
    }
    
    public function validateLivro()
    {
        return request()->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'paginas' => 'required',
            'ano_publicacao' => 'required',
            
            // 'completed' => 'required'
        ]);
        }

        // public function destroy($id)
        // {
        //     Livro::find($id)->delete();           

        //     return redirect('/');
        // }

        public function destroy(Livro $livro)
        {
            $livro->delete();

            return redirect('/');
        }
}
