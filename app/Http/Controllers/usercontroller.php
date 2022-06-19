<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\supervisor;
use App\Models\User;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Image;

class usercontroller extends Controller
{
    
    public function homec(request $request)
    {
       
        $deta = $request->input('deta'); 
        $deta = Student::select('studentName','studentID','studentPhone','stdemail','stdsupervisor','stdpsmtitle')->where('studentName','LIKE', '%' . $deta . '%')->get();
        if (count ( $deta ) > 0)
        return view('\Coordinator\searchstudent', ['deta' => $deta])->with('successMsg','Results Found !');
        else
        return view ('\Coordinator\searchstudent', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
        
    }


    //Manage Coordinator
    function createstudent(Request $req)
    {
       /* $var = new student;
        $var->studentName=$req->name;
        $var->studentID=$req->id;
        $var->stdaddress=$req->address;
        $var->studentPhone=$req->phonenum;
        $var->stdemail=$req->email;
        $var->stdyear=$req->year;
        $var->stdsupervisor=$req->supervisor;
        $var->stdpsmtitle=$req->psmtitle;
        $var->psmType=$req->psmtype;*/
        if (request()->has('image')){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/uploads/student/');
            $imageuploaded->move($imagepath,$imagename);
            //Image::make($image)->resize(300,300)->save(public_path('/uploads/student/'.$filename));
            $var = new student;
            $var->studentName=$req->name;
            $var->studentID=$req->id;
            $var->stdaddress=$req->address;
            $var->studentPhone=$req->phonenum;
            $var->stdemail=$req->email;
            $var->stdyear=$req->year;
            $var->stdsupervisor=$req->supervisor;
            $var->stdpsmtitle=$req->psmtitle;
            $var->psmType=$req->psmtype;
            $var->image = '/uploads/student/' . $imagename;
            $var->save();
            return redirect('searchstudent')->with('successMsg','Profile Successful created !');
    
        }
        //$var->save();
        //return redirect('searchstudent')->with('successMsg','Profile Successful created !');

    }

     function viewstudentlist()
    {
        $deta = Student::all();
        return view('\Coordinator\searchstudent',['deta'=>$deta]);
    }

    public function searchstudent(request $request)
    {
       
        $deta = $request->input('deta'); 
        $deta = Student::select('studentName','studentID','studentPhone','stdemail','stdsupervisor','stdpsmtitle')->where('studentName','LIKE', '%' . $deta . '%')->get();
        if (count ( $deta ) > 0)
        return view('\Coordinator\searchstudent', ['deta' => $deta])->with('successMsg','Results Found !');
        else
        return view ('\Coordinator\searchstudent', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
        
    }

    public function viewstudentprofile($studentID)
    {
        $result = Student::select('*')->where('studentID', '=', $studentID)->get();
        
        return view('\Coordinator\viewstudent', ['result' => $result]);
    }

    public function deletestudentprofile($studentID)
    {
        $result = Student::select('*')->where('studentID', '=', $studentID)->delete();
        return redirect('searchstudent')->with('successMsg','Profile Successful deleted !');
    }

    public function updatestudentprofile($studentID)
    {
        $result = Student::select('*')->where('studentID', '=', $studentID)->first();
        return view('\Coordinator\updatestudent', ['result' => $result]);
    }

    public function updatestdprofile(request $request,$studentID)
    {

        $result=Student::findOrFail($studentID)->first()->fill($request->all())->save();
        /*$result=Student::find($request->$studentID);
        $result->studentName=$request->input('studentName');
        $result->stdaddress=$request->input('stdaddress');
        $result->studenPhone=$request->input('studentPhone');
        $result->stdemail=$request->input('stdemail');
        $result->stdyear=$request->input('stdyear');
        $result->stdsupervisor=$request->input('stdsupervisor');
        $result->stdpsmtitle=$request->input('stdpsmtitle');
        $result->update();*/
        return view('\Coordinator\viewstudent', ['result' => $result])->with('successMsg','Results Found !');
    }

    function viewpsmlist()
    {
        $deta = Student::all();
        return view('\Coordinator\searchpsmtitle',['deta'=>$deta]);
    }
    
    function searchpsm(request $request)
    {
       
        $deta = $request->input('deta'); 
        $deta = Student::select('studentName','studentID','stdsupervisor','stdpsmtitle','psmType')->where('stdpsmtitle','LIKE', '%' . $deta . '%')->get();
        if (count ( $deta ) > 0)
        return view('\Coordinator\searchpsmtitle', ['deta' => $deta])->with('successMsg','Results Found !');
        else
        return view ('\Coordinator\searchpsmtitle', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
        
    }

    function createsupervisor(Request $req)
    {
        $var = new supervisor;
        $var->supervisorID=$req->id;
        $var->svbiography=$req->biography;
        $var->svname=$req->name;
        $var->svphonenum=$req->phonenum;
        $var->svemail=$req->email;
        $var->svexpertise=$req->expertise;
        $var->save();
        return redirect('searchsvlist')->with('successMsg','Profile Successful created !');

    }

    function viewsvlist()
    {
        $deta = supervisor::all();
        return view('\Coordinator\searchsvlist',['deta'=>$deta]);
    }

    function searchsv(request $request)
    {
       
        $deta = $request->input('deta'); 
        $deta = supervisor::select('svname','supervisorID','svphonenum','svemail')->where('svname','LIKE', '%' . $deta . '%')->get();
        if (count ( $deta ) > 0)
        return view('\Coordinator\searchsvlist', ['deta' => $deta])->with('successMsg','Results Found !');
        else
        return view ('\Coordinator\searchsvlist', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
        
    }


    function viewsvprofile($supervisorID)

    {
        $result = supervisor::select('*')->where('supervisorID', '=', $supervisorID)->get();
        return view('\Coordinator\viewsvprofile', ['result' => $result]);
    }


    function deletesvprofile($supervisorID)

    {
        $result = supervisor::select('*')->where('supervisorID', '=', $supervisorID)->delete();
        return redirect('searchsvlist')->with('successMsg','Profile Successful deleted !');
    }

    function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}