<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'message';
    protected $fillable = [
        'messageID','messageTitle','messageDate',
        'messageSender','userID'
    ];
    public $timestamps = false;
}
