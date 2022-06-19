<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coordinator extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'coordinatorID';

    public $incrementing = false;
    protected $keyType = 'string';
}
