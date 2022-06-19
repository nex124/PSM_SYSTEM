<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deadline;
use App\Models\psm1result;
use App\Models\psm2result;
use App\Models\ptaresult;
use App\Models\Student;
use DB;
use Illuminate\Support\Facades\Mail;

class EvaluationController extends Controller
{
    //display deadine
    public function deadline() {
        return view('evaluation.deadline');
    }

    //store deadline into database
    public function storeDeadline() {

        $deadline = new Deadline();

        $deadline->psmType = request('psmType');
        $deadline->svDeadline = request('svDeadline');
        $deadline->evDeadline = request('evDeadline');

        $deadline->save();

        /*Mail::send('emails.deadlineReminder',$deadline->toArray(),
        function($message){
            $message->to('user@ump.edu.my', 'User')
            ->subject('Reminder: evaluate student PSM marks');
        });*/

        return redirect('/deadline')->with('success', 'Deadline has been saved successfully.');
    }

    //evaluation menu
    public function svMenu() {
        $deadlinePsm1 = Deadline::select(['deadlines.*'])
                            ->where('psmType', '=', 'PSM 1')
                            ->latest('created_at')->first();

        $deadlinePsm2 = Deadline::select(['deadlines.*'])
                            ->where('psmType', '=', 'PSM 2')
                            ->latest('created_at')->first();

        $deadlinePta = Deadline::select(['deadlines.*'])
                            ->where('psmType', '=', 'PTA')
                            ->latest('created_at')->first();

        return view('/evaluation/svMenu', [
            'deadlinePsm1' => $deadlinePsm1,
            'deadlinePsm2' => $deadlinePsm2,
            'deadlinePta' => $deadlinePta,
        ]);
    }
    
    //student evaluation list for supervisor
    public function svView(Request $request) {

        $deadlinePsm1 = Deadline::select(['deadlines.*'])
                                ->where('psmType', '=', 'PSM 1')
                                ->latest('created_at')->first();

        $deadlinePsm2 = Deadline::select(['deadlines.*'])
                                ->where('psmType', '=', 'PSM 2')
                                ->latest('created_at')->first();

        $deadlinePta = Deadline::select(['deadlines.*'])
                                ->where('psmType', '=', 'PTA')
                                ->latest('created_at')->first();

        $search = $request['search'] ?? "";

        if($search != ""){
            $psm1marks = psm1result::orderBy('studentID')
                        ->join('students', 'students.studentID', '=', 'psm1result.studentID')
                        ->select(['psm1result.*', 'students.studentName', 'students.psmType'])
                        ->where("psm1result.studentID", "LIKE", '%'.$search.'%')
                        ->get();

            $psm2marks = psm2result::orderBy('studentID')
                        ->join('students', 'students.studentID', '=', 'psm2result.studentID')
                        ->select(['psm2result.*', 'students.studentName', 'students.psmType'])
                        ->where("psm2result.studentID", "LIKE", '%'.$search.'%')
                        ->get();

            $ptamarks = ptaresult::orderBy('studentID')
                        ->join('students', 'students.studentID', '=', 'ptaresult.studentID')
                        ->select(['ptaresult.*', 'students.studentName', 'students.psmType'])
                        ->where("ptaresult.studentID", "LIKE", '%'.$search.'%')
                        ->get();

        }else{
            $psm1marks = psm1result::orderBy('studentID')
                                    ->join('students', 'students.studentID', '=', 'psm1result.studentID')
                                    ->select(['psm1result.*', 'students.studentName', 'students.psmType'])
                                    ->get();

            $psm2marks = psm2result::orderBy('studentID')
                                    ->join('students', 'students.studentID', '=', 'psm2result.studentID')
                                    ->select(['psm2result.*', 'students.studentName', 'students.psmType'])
                                    ->get();

            $ptamarks = ptaresult::orderBy('studentID')
                                    ->join('students', 'students.studentID', '=', 'ptaresult.studentID')
                                    ->select(['ptaresult.*', 'students.studentName', 'students.psmType'])
                                    ->get();
        } 

        //$psm1marks = psm1result::all();
        return view('evaluation.svView', [
            'deadlinePsm1' => $deadlinePsm1,
            'deadlinePsm2' => $deadlinePsm2,
            'deadlinePta' => $deadlinePta,
            'psm1marks' => $psm1marks,
            'psm2marks' => $psm2marks,
            'ptamarks' => $ptamarks,
            'search' => $search
        ]);
    }

    //evaluation form of a student
    public function svEdit($resultID, $psmType){
        if($psmType == 'psm1'){
            $result = psm1result::join('students', 'students.studentID', '=', 'psm1result.studentID')
                                ->select(['psm1result.*', 'students.*'])
                                ->where('psm1result.resultID', '=', $resultID)
                                ->first();
            return view('evaluation.svEdit', ['result' => $result]);
        }
        elseif($psmType == 'psm2'){
            $result = psm2result::join('students', 'students.studentID', '=', 'psm2result.studentID')
                                ->select(['psm2result.*', 'students.*'])
                                ->where('psm2result.resultID', '=', $resultID)
                                ->first();
            return view('evaluation.svEdit', ['result' => $result]);
        }
        else{
            $result = ptaresult::join('students', 'students.studentID', '=', 'ptaresult.studentID')
                                ->select(['ptaresult.*', 'students.*'])
                                ->where('ptaresult.resultID', '=', $resultID)
                                ->first();
            return view('evaluation.svEdit', ['result' => $result]);
        }
    }

    //update evaluation marks into database
    public function updateSvMarks(Request $request, $resultID, $psmType) {

        if($psmType == 'psm1'){
            $psm1results = psm1result::find($resultID);

            $psm1results->totalMark = (float) $psm1results->totalMark - (float) $psm1results->svMark1 - (float) $psm1results->svMark2;

            $psm1results->svMark1 = $request->input('svMark1');
            $psm1results->svMark2 = $request->input('svMark2');

            $psm1results->totalMark = (float) $psm1results->totalMark + (float) $psm1results->svMark1 + (float) $psm1results->svMark2;   

            if($psm1results->totalMark >= 80)
                $psm1results->grade = 'A';
            elseif($psm1results->totalMark >= 70)
                $psm1results->grade = 'B';
            elseif($psm1results->totalMark >= 60)
                $psm1results->grade = 'C';
            elseif($psm1results->totalMark >= 50)
                $psm1results->grade = 'D';
            elseif($psm1results->totalMark >= 40)
                $psm1results->grade = 'E';
            else
                $psm1results->grade = 'F';

            $psm1results->update();

            return redirect('svView');
        }
        elseif($psmType == 'psm2'){
            $psm2results = psm2result::find($resultID);

            $psm2results->totalMark = (float) $psm2results->totalMark - (float) $psm2results->svMark1 - (float) $psm2results->svMark2;

            $psm2results->svMark1 = $request->input('svMark1');
            $psm2results->svMark2 = $request->input('svMark2');

            $psm2results->totalMark = (float) $psm2results->totalMark + (float) $psm2results->svMark1 + (float) $psm2results->svMark2;   

            if($psm2results->totalMark >= 80)
                $psm2results->grade = 'A';
            elseif($psm2results->totalMark >= 70)
                $psm2results->grade = 'B';
            elseif($psm2results->totalMark >= 60)
                $psm2results->grade = 'C';
            elseif($psm2results->totalMark >= 50)
                $psm2results->grade = 'D';
            elseif($psm2results->totalMark >= 40)
                $psm2results->grade = 'E';
            else
                $psm2results->grade = 'F';

            $psm2results->update();

            return redirect('svView');
        }
        else{
            $ptaresults = ptaresult::find($resultID);

            $ptaresults->totalMark = (float) $ptaresults->totalMark - (float) $ptaresults->svMark;

            $ptaresults->svMark = $request->input('svMark');

            $ptaresults->totalMark = (float) $ptaresults->totalMark + (float) $ptaresults->svMark;   

            if($ptaresults->totalMark >= 80)
                $ptaresults->grade = 'A';
            elseif($ptaresults->totalMark >= 70)
                $ptaresults->grade = 'B';
            elseif($ptaresults->totalMark >= 60)
                $ptaresults->grade = 'C';
            elseif($ptaresults->totalMark >= 50)
                $ptaresults->grade = 'D';
            elseif($ptaresults->totalMark >= 40)
                $ptaresults->grade = 'E';
            else
                $ptaresults->grade = 'F';

            $ptaresults->update();

            return redirect('svView');
        }
    }

    //student evaluation list for evaluator
    public function evView(Request $request) {

        $deadlinePsm1 = Deadline::select(['deadlines.*'])
                                ->where('psmType', '=', 'PSM 1')
                                ->latest('created_at')->first();

        $deadlinePsm2 = Deadline::select(['deadlines.*'])
                                ->where('psmType', '=', 'PSM 2')
                                ->latest('created_at')->first();

        $deadlinePta = Deadline::select(['deadlines.*'])
                                ->where('psmType', '=', 'PTA')
                                ->latest('created_at')->first();

        $search = $request['search'] ?? "";     

        if($search != ""){
            $psm1marks = psm1result::orderBy('studentID')
                                ->join('students', 'students.studentID', '=', 'psm1result.studentID')
                                ->select(['psm1result.*', 'students.studentName', 'students.psmType'])
                                ->where("psm1result.studentID", "LIKE", '%'.$search.'%')
                                ->get();

            $psm2marks = psm2result::orderBy('studentID')
                                ->join('students', 'students.studentID', '=', 'psm2result.studentID')
                                ->select(['psm2result.*', 'students.studentName', 'students.psmType'])
                                ->where("psm2result.studentID", "LIKE", '%'.$search.'%')
                                ->get();

            $ptamarks = ptaresult::orderBy('studentID')
                                ->join('students', 'students.studentID', '=', 'ptaresult.studentID')
                                ->select(['ptaresult.*', 'students.studentName', 'students.psmType'])
                                ->where("ptaresult.studentID", "LIKE", '%'.$search.'%')
                                ->get();
        }else{
            $psm1marks = psm1result::orderBy('studentID')
                                ->join('students', 'students.studentID', '=', 'psm1result.studentID')
                                ->select(['psm1result.*', 'students.studentName', 'students.psmType'])
                                ->get();

            $psm2marks = psm2result::orderBy('studentID')
                                ->join('students', 'students.studentID', '=', 'psm2result.studentID')
                                ->select(['psm2result.*', 'students.studentName', 'students.psmType'])
                                ->get();

            $ptamarks = ptaresult::orderBy('studentID')
                                ->join('students', 'students.studentID', '=', 'ptaresult.studentID')
                                ->select(['ptaresult.*', 'students.studentName', 'students.psmType'])
                                ->get();
        }

        //$psm1marks = psm1result::all();
        return view('evaluation.evView', [
            'deadlinePsm1' => $deadlinePsm1,
            'deadlinePsm2' => $deadlinePsm2,
            'deadlinePta' => $deadlinePta,
            'psm1marks' => $psm1marks,
            'psm2marks' => $psm2marks,
            'ptamarks' => $ptamarks,
            'search' => $search
        ]);
    }

    //evaluation form of a student
    public function evEdit($resultID, $psmType){
        if($psmType == 'psm1'){
            $result = psm1result::join('students', 'students.studentID', '=', 'psm1result.studentID')
                                ->select(['psm1result.*', 'students.*'])
                                ->where('psm1result.resultID', '=', $resultID)
                                ->first();
            return view('evaluation.evEdit', ['result' => $result]);
        }
        elseif($psmType == 'psm2'){
            $result = psm2result::join('students', 'students.studentID', '=', 'psm2result.studentID')
                                ->select(['psm2result.*', 'students.*'])
                                ->where('psm2result.resultID', '=', $resultID)
                                ->first();
            return view('evaluation.evEdit', ['result' => $result]);
        }
        else{
            $result = ptaresult::join('students', 'students.studentID', '=', 'ptaresult.studentID')
                                ->select(['ptaresult.*', 'students.*'])
                                ->where('ptaresult.resultID', '=', $resultID)
                                ->first();
            return view('evaluation.evEdit', ['result' => $result]);
        }
    }

    //update evaluation marks into database
    public function updateEvMarks(Request $request, $resultID, $psmType) {

        if($psmType == 'psm1'){
            $psm1results = psm1result::find($resultID);

            $psm1results->totalMark = (float) $psm1results->totalMark - (float) $psm1results->evMark;

            $psm1results->evMark = $request->input('evMark');

            $psm1results->totalMark = (float) $psm1results->totalMark + (float) $psm1results->evMark;   

            if($psm1results->totalMark >= 80)
                $psm1results->grade = 'A';
            elseif($psm1results->totalMark >= 70)
                $psm1results->grade = 'B';
            elseif($psm1results->totalMark >= 60)
                $psm1results->grade = 'C';
            elseif($psm1results->totalMark >= 50)
                $psm1results->grade = 'D';
            elseif($psm1results->totalMark >= 40)
                $psm1results->grade = 'E';
            else
                $psm1results->grade = 'F';

            $psm1results->update();

            return redirect('evView');
        }
        elseif($psmType == 'psm2'){
            $psm2results = psm2result::find($resultID);

            $psm2results->totalMark = (float) $psm2results->totalMark - (float) $psm2results->evMark;

            $psm2results->evMark = $request->input('evMark');

            $psm2results->totalMark = (float) $psm2results->totalMark + (float) $psm2results->evMark;   

            if($psm2results->totalMark >= 80)
                $psm2results->grade = 'A';
            elseif($psm2results->totalMark >= 70)
                $psm2results->grade = 'B';
            elseif($psm2results->totalMark >= 60)
                $psm2results->grade = 'C';
            elseif($psm2results->totalMark >= 50)
                $psm2results->grade = 'D';
            elseif($psm2results->totalMark >= 40)
                $psm2results->grade = 'E';
            else
                $psm2results->grade = 'F';

            $psm2results->update();

            return redirect('evView');
        }
        else{
            $ptaresults = ptaresult::find($resultID);

            $ptaresults->totalMark = (float) $ptaresults->totalMark - (float) $ptaresults->evMark;

            $ptaresults->evMark = $request->input('evMark');

            $ptaresults->totalMark = (float) $ptaresults->totalMark + (float) $ptaresults->evMark;   

            if($ptaresults->totalMark >= 80)
                $ptaresults->grade = 'A';
            elseif($ptaresults->totalMark >= 70)
                $ptaresults->grade = 'B';
            elseif($ptaresults->totalMark >= 60)
                $ptaresults->grade = 'C';
            elseif($ptaresults->totalMark >= 50)
                $ptaresults->grade = 'D';
            elseif($ptaresults->totalMark >= 40)
                $ptaresults->grade = 'E';
            else
                $ptaresults->grade = 'F';

            $ptaresults->update();

            return redirect('evView');
        }
    }

}
