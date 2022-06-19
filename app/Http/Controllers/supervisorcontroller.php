<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\supervisor;

class supervisorcontroller extends Controller
{

    //Manage Supervisor

    function studentlist()
    {
        $deta = Student::all();
        return view('\supervisor\searchstudentlist',['deta'=>$deta]);
    }

    public function studentprofile(request $request)
    {
       
        $deta = $request->input('deta'); 
        $deta = Student::select('studentName','studentID','studentPhone','stdemail','stdsupervisor','stdpsmtitle')->where('studentName','LIKE', '%' . $deta . '%')->get();
        if (count ( $deta ) > 0)
        return view('\supervisor\searchstudentlist', ['deta' => $deta])->with('successMsg','Results Found !');
        else
        return view ('\supervisor\searchstudentlist', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
        
    }

    public function viewprofile($studentID)
    {
        $result = Student::select('*')->where('studentID', '=', $studentID)->get();
        return view('\supervisor\viewstudentprofile', ['result' => $result]);
    }

    function svmyprofile()
    {
        $deta = supervisor::select('*')->where('svName','=',auth()->user()->name)->first();
        return view('\supervisor\svmyprofile',['deta'=>$deta]);
    }
}
