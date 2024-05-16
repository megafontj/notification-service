<?php

namespace App\Models;

use App\Support\QuerySearch\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Filterable,
        HasFactory;

    protected $fillable = ['content', 'user_id'];
}
