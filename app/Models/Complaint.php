<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $table = 'complaint';
    protected $fillable = [
        'complaintID','complaintTitle',
        'complaintDate','userID'
    ];
    public $timestamps = false;
}
