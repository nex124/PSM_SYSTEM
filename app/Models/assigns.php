<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assigns extends Model
{
    use HasFactory;
    protected $fillable = ['studentID','studentName','studentTitle','indusName','indusType','reason'];
    public $timestamps = false;
}
