<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'autor', 'paginas', 'ano_publicacao'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
