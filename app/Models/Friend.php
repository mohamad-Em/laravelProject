<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    protected $table = 'friend';
    protected $fillable = [
        'friendID','friendStatus',
        'friendDate','futureUser','sendingUser'
    ];
    public $timestamps = false;
}
