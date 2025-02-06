<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    use HasFactory;

    protected $fillable = ['title', 'author', 'summary', 'pdf_link', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function toReadListUsers() {
        return $this->belongsToMany(User::class, 'toreadlist');
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favourites');
    }


    
}

