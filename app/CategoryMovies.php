<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryMovies extends Model
{
    protected $table = 'category_movies';
    protected $fillable = [
        'name', 'description', 'status'
    ];
}
