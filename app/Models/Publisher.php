<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = "Publishers";
    protected $primaryKey = "id";
    protected $fillable = ['id','name'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
