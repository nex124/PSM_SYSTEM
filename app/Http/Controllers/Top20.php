<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentresult;
use App\Models\assigns;
use Illuminate\Support\Facades\DB;
class Top20 extends Controller
{
    /**
     * Display the generated Top 20 results
     *
     * @return \Illuminate\Http\Response
     */
    public function order()
    {
        $id = studentresult::select('studentName','studentID','SvName','studentTitle','psm1Marks','psm2Marks','psmFinalResult')
                            ->orderBy('psmFinalResult', 'DESC')
                            ->take(20)
                            ->get();
        return view('Top_20_students.Resultmain',['id'=> $id])->with('success','Generated Top 20 students');        

 
    }



    /**
     * Display all the results with no orderly manner
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = \App\Models\studentresult::all();
        return view('Top_20_students.Resultmain',['id'=> $id]);//returning back to Reusltmain page
    }

    /**
     * Form to add new info into the table
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {

         \App\Models\assigns::create($request->all());
         return redirect('/studentresult');//return to student result if successful
    }    


}
