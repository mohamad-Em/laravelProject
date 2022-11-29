<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = [
        'postID','postTitle','postDecraption',
        'postStatus','postDate','adminID','userID'
    ];
    public $timestamps = false;
}
