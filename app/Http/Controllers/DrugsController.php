<?php

namespace App\Http\Controllers;

use App\Patient;

use App\Drug;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;

class DrugsController extends Controller
{
	public function index()
    {
    	$patient = Patient::get()->first(); 
    	
    	return view('drugs.index')->withPatient($patient);
    }    

	public function store(Request $request, $patient_id)
	{
		$this->validate($request, [
			'name' => 'required',
			'dose' => 'required',
			'duration'=>'required'
		]);

		$patientDrug = new Drug;
		
/*		$days = Carbon::create(null, 'duration', null, 0);*/

		$patientDrug->patient_id = $patient_id;
		$patientDrug->name = $request->input('name');
		$patientDrug->dose = $request->input('dose');
		$patientDrug->duration = $request->input('duration');

		$patientDrug->save();

		return redirect()->route('patients.index')->with('info', 'Successfully entered.');
	}    
	 public function show($id)
    {
    	return view('drugs.store');
    }
}
