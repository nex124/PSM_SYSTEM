<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supervisor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'supervisorID';

    public $incrementing = false;
    protected $keyType = 'string';
}
