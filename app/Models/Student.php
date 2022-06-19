<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'studentID';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = array('studentName', 'stdaddress', 'studentPhone','stdemail','stdyear','stdsupervisor','stdpsmtitle');
}
