<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\supervisor;
use App\Http\Controllers\studentcontroller;
use Image;

class studentcontroller extends Controller
{
    //Manage Student
    function svlist()
    {
        $deta = supervisor::all();
        return view('\Student\searchsupervisor',['deta'=>$deta]);
    }

    public function searchsupervisor(request $request)
    {
       
        $deta = $request->input('deta'); 
        $deta = supervisor::select('svname','supervisorID','svphonenum','svemail')->where('svname','LIKE', '%' . $deta . '%')->get();
        if (count ( $deta ) > 0)
        return view('\Student\searchsupervisor', ['deta' => $deta])->with('successMsg','Results Found !');
        else
        return view ('\Student\searchsupervisor', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
        
    }

    public function svprofile($supervisorID)
    {
        $result = supervisor::select('*')->where('supervisorID', '=', $supervisorID)->get();
        return view('\Student\svprofile', ['result' => $result]);
    }

    function mylist()
    {
        $deta = Student::select('*')->where('studentName','=',auth()->user()->name)->first();
        return view('\Student\myprofile',['deta'=>$deta]);
    }
    
    }