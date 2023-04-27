<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected  $guarded = [];
    protected $fillable = [
        'title',
        'slug',
        'is_featured',
        'status',
        'image',
        'excerpt',
        'content',
        'priority',
        'posted_at',
    ];
    use HasFactory;
}
