<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carnival;
use App\Models\CarnivalEvaluation;

class CarnivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('masuk.');
        $carnivals = CarnivalEvaluation::all();
        return view('CarnivalEvaluation.index', compact('carnivals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CarnivalEvaluation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carnival_evaluation = CarnivalEvaluation::create([
            'coordinatorID' => $request->coordinatorID,
            'coordinatorName' => $request->coordinatorName,
            'studentID' => $request->studentID,
            'studentName' => $request->studentName,
            'studentPhone' => $request->studentPhone,
            'date' => $request->date,
            'appoinmentID' => $request->appoinmentID,
            'reason' => $request->reason,


        ]);
        return redirect()->route('CarnivalEvaluation', ['CarnivalEvaluation' => $carnival_evaluation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carnival_evaluation = CarnivalEvaluation::find($id);
        return view('CarnivalEvaluation.edit', compact('carnival_evaluation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarnivalEvaluation $carnival_evaluation)
    {
        // dd($carnival_evaluation);
        $carnival_evaluation->date = $request->date;
        $carnival_evaluation->reason = $request->reason;
        $carnival_evaluation->save();



        return redirect()->route('CarnivalEvaluation', ['carnival_evaluation' => $carnival_evaluation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
