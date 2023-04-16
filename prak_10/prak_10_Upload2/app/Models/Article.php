<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $table = 'article';
    public $timestamps = 'false';
    protected $fillable = ['title', 'content', 'featured_image'];

}
