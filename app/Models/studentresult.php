<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class studentresult extends Model
{
    use HasFactory;
    protected $fillable = ['studentID','studentName','studentTitle','SvName','psm1Marks','psm1Marks','psmFinalResult'];
}
