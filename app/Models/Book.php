<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $table = "Books";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','author_id','title','cover','year','publisher_id'];

    public function author(): BelongsTo
        {
            return $this->belongsTo(Author::class);
    }
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
}
