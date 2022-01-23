<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Charts\PatientsChart;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    #UBER
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'inference']]);
    }
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all();
        $patients_at = Patient::pluck('created_at');

        // dd($patients);
        $patients_chart = new PatientsChart;


        return view('patients.patients', ['patients' => $patients]);
    }

    public function getAllPatients()
    {
        $data = Patient::all();
        return response()->json(['data' => $data]);
    }

    public function patients_vs_months(Request $request)
    {
        $patients_per_month = Patient::selectRaw('monthname(created_at) month, count(*) data')->groupBy('month');
        $data = $patients_per_month->pluck('data');
        $labels = $patients_per_month->pluck('month');
        return response()->json(['data' => $data, 'labels' => $labels]);
    }

    public function patients_with_diabetes(Request $request)
    {
        $patients_per_month = Patient::where('diagnosis', 1)->selectRaw('monthname(created_at) month, count(*) data')->groupBy('month');
        $data = $patients_per_month->pluck('data');
        $labels = $patients_per_month->pluck('month');
        return response()->json(['data' => $data, 'labels' => $labels]);
    }

    public function patients_without_diabetes(Request $request)
    {
        $patients_per_month = Patient::where('diagnosis', 0)->selectRaw('monthname(created_at) month, count(*) data')->groupBy('month');
        $data = $patients_per_month->pluck('data');
        $labels = $patients_per_month->pluck('month');
        return response()->json(['data' => $data, 'labels' => $labels]);
    }



    public function inference(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'glucose' => 'required',
            'bmi' => 'required',
            'diabetespedegreefunction' => 'required',
            'insulin' => 'required',
            'skinthickness' => 'required',
            'bloodpressure' => 'required',
            'pregnancies' => 'required'
        ]);

        $inputs = [
            "plasma_glucose_concentration" => [[floatval($request->get('glucose'))]],
            "bmi" => [[floatval($request->get('bmi'))]],
            "age" => [[floatval($request->get('age'))]],
            "pedigree_function" => [[floatval($request->get('diabetespedegreefunction'))]],
            "serum_insulin" => [[floatval($request->get('insulin'))]],
            "triceps_thickness" => [[floatval($request->get('skinthickness'))]],
            "diastolic_blood_pressure" => [[floatval($request->get('bloodpressure'))]],
            "pregnancies" => [[floatval($request->get('pregnancies'))]]
        ];

        $patient_id = $request->get('patient_id');
        $data = ["signature_name" => "serving_default", "inputs" => $inputs];
        $predictions = Http::post(env('INFERENCE_URL'), $data);
        $predictions = json_decode($predictions->getBody());
        $diagnosis = NULL;
        if ($predictions->outputs) {
            if ($predictions->outputs[0][0] >= 0.5) {
                $diagnosis = 1;
            } else {
                $diagnosis = 0;
            }
        }

        #Todo: use $prediction to insert result in table
        Patient::findOrFail($patient_id)->update(['diagnosis' => $diagnosis]);
        return response()->json(['result' => $predictions->outputs]);
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
            'name' => $request->input('name'),
            'pregnancies' => $request->input('pregnancies'),
            'glucose' => $request->input('glucose'),
            'bloodpressure' => $request->input('bloodpressure'),
            'skinthickness' => $request->input('skinthickness'),
            'insulin' => $request->input('insulin'),
            'bmi' => $request->input('bmi'),
            'diabetespedegreefunction' => $request->input('pedegree'),
            'age' => $request->input('age'),
            'user_id' => auth()->user()->id
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
        $request->validate([
            'name' => 'required', 'pregnancies' => 'required',
            'glucose' => 'required', 'bloodpressure' => 'required',
            'skinthickness' => 'required', 'insulin' => 'required',
            'diabetespedegreefunction' => 'required', 'age' => 'required'
        ]);
        Patient::findOrFail($id)->update([
            'name' => $request->input('name'),
            'pregnancies' => $request->input('pregnancies'),
            'glucose' => $request->input('glucose'),
            'bloodpressure' => $request->input('bloodpressure'),
            'skinthickness' => $request->input('skinthickness'),
            'insulin' => $request->input('insulin'),
            'bmi' => $request->input('bmi'),
            'diabetespedegreefunction' => $request->input('diabetespedegreefunction'),
            'age' => $request->input('age')
        ]);

        return response()->json(['message' => 'Patient record updated successfully']);
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
        return response()->json(['message' => 'Patient record deleted successfully']);
    }
}
