<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "Authors";
    protected $primaryKey = "id";
    protected $fillable = ['id','name'];    

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
