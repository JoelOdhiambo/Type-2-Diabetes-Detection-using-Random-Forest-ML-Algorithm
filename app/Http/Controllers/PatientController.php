<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Charts\PatientsChart;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     * Submodule test comment
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients=Patient::all();
        $patients_at=Patient::pluck('created_at');
        
        // dd($patients);
        $patients_chart= new PatientsChart;
        
     
        return view('patients.patients',['patients'=>$patients]);
    }

    public function patients_vs_months(Request $request){
        $patients_per_month = Patient::selectRaw('monthname(created_at) month, count(*) data')->groupBy('month');
        $data = $patients_per_month->pluck('data');
        $labels = $patients_per_month->pluck('month');
        return response()->json(['data' => $data, 'labels' => $labels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $patient=new Patient;
        // $patient->name=$request->input('name');
        // $patient->pregnancies=$request->input('pregnancies');
        // $patient->glucose=$request->input('glucose');
        // $patient->bloodpressure=$request->input('bloodpressure');
        // $patient->skinthickness=$request->input('skinthickness');
        // $patient->insulin=$request->input('insulin');
        // $patient->bmi=$request->input('bmi');
        // $patient->diabetespedegreefunction=$request->input('pedegree');
        // $patient->age=$request->input('age');
        // $patient->save();

        $patients = Patient::create([
            'name'=>$request->input('name'),
            'pregnancies'=>$request->input('pregnancies'),
            'glucose'=>$request->input('glucose'),
            'bloodpressure'=>$request->input('bloodpressure'),
            'skinthickness'=>$request->input('skinthickness'),
            'insulin'=>$request->input('insulin'),
            'bmi'=>$request->input('bmi'),
            'diabetespedegreefunction'=>$request->input('pedegree'),
            'age'=>$request->input('age'),
            'user_id'=>auth()->user()->id
        ]);
        return redirect('/patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $patient = Patient::find($id);
        // dd($id);
        // return view('patients.edit')->with('patient',$patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $patient = Patient::where('id',$id)->update([
            'name'=>$request->input('name'),
            'pregnancies'=>$request->input('pregnancies'),
            'glucose'=>$request->input('glucose'),
            'bloodpressure'=>$request->input('bloodpressure'),
            'skinthickness'=>$request->input('skinthickness'),
            'insulin'=>$request->input('insulin'),
            'bmi'=>$request->input('bmi'),
            'diabetespedegreefunction'=>$request->input('pedegree'),
            'age'=>$request->input('age')
        ]);

        return redirect('/patients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //

        $patient->delete();

        return redirect('/patients');
    }
}
