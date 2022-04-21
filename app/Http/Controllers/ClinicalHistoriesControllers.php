<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicalHistories;
use Illuminate\Support\Facades\DB;

class ClinicalHistoriesControllers extends Controller
{
    //show Data
    public function view()
    {
        $clinical_histories = DB::table('clinical_histories')->select('*')->get();
        return view('crud.index', compact('clinical_histories'));
    } 

    public function patient ($id)
    {
        $clinical_histories = DB::table('clinical_histories')->select('*')->where('patient_historial', '=', $id)->get();
        return view('crud.patient', compact('clinical_histories'));
    }

    //index
    public function index ()
    {
        return view('crud.create');
    }

    //store post the data
    public function store (Request $request)
    {
        $clinical_histories = new ClinicalHistories();
        $clinical_histories->ci  = $request->ci;
        $clinical_histories->patient_name = $request->patient_name;
        $clinical_histories->born_date = $request->born_date;
        $clinical_histories->age = $request->age;
        $clinical_histories->temperature = $request -> temperature;
        $clinical_histories->blood_presure = $request -> blood_presure;
        $clinical_histories->pulse = $request -> pulse;
        $clinical_histories->respiratory_frecuency = $request->respiratory_frecuency;
        $clinical_histories->saturation = $request-> saturation;
        $clinical_histories->weight = $request-> weight;
        $clinical_histories->height = $request -> height;
        $clinical_histories->imc = $request->imc;
        $clinical_histories->save();
        return redirect('/')->with('mensaje','Registro guardado exitosamente!!');
        
    }

    //Delete
    public function destroy($id)
    {   
        $clinical_histories = DB::table('clinical_histories')->select('*')->where('patient_historial', '=', $id)->get();
        if($clinical_histories!== null){
            $clinical_histories = DB::table('clinical_histories')->select('*')->where('patient_historial', '=', $id)->delete();
            return redirect('/')->with('mensaje', 'Registro Eliminado');
        }else{
            return redirect('/')->with('error', 'No se encuentra el registro');
        }
    }

    //edit
    public function show($id)
    {
        $clinical_histories = DB::table('clinical_histories')->select('*')->where('patient_historial', '=', $id)->get();
        return view('crud.edit', compact('clinical_histories'));
    }

    public function update(Request $request, $id)
    {
        $clinical_histories = DB::table('clinical_histories')->select('*')->where('patient_historial', '=', $id)->get();
        if($clinical_histories!== null){
            $clinical_histories= DB::table('clinical_histories')->where('patient_historial', '=', $id)->update($request->except(['_token', '_method']));
            return redirect('/')->with('mensaje', 'Registro Editado');
        }else{
            return redirect('/')->with('error', 'No se encuentra el registro');
        }
    }
}