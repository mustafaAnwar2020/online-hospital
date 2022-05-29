<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Clinic;
use App\Models\Hospital;
use App\Models\Profession;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::role('Doctor')->get();
        return view('Dashboard.Doctor.index')->with('doctors',$doctors);
    }


    public function store(Request $request)
    {
        //
    }


    public function professionDoctors(Profession $profession,Request $request){
         $doctors = User::whereHas('profission',function($query) use ($profession){
            $query->where('user_profession.prof_id',$profession->id);
        })->when($request->search,function($q) use ($request){
            return $q->where('name','LIKE','%' . $request->search . '%');
        })->get();
        return view('Doctor.department')->with([
            'doctors'=>$doctors,
            'prof'=>$profession,
    ]);
    }

    public function show($id)
    {
        $doctor = User::find($id);
        return view('Doctor.show')->with('doctor',$doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = User::find($id);
        return view('Doctor.edit')->with('doctor',$doctor);
    }

    public function createHospital(){
        $hospitals = Hospital::all();
        return view('Dashboard.Doctor.addHospital')->with('hospitals',$hospitals);
    }

    public function storeHospital(Request $request){

        // dd($request);
        $this->validate($request,[
            'hospital_id'=>'required'
        ]);
        $user = User::role('Doctor')->find(Auth::id());
        $user->Hospital()->attach($request->hospital_id);
        return redirect()->route('dashboard.index');
    }


    public function destroy($id)
    {
        $doctor = User::find($id);
        $doctor->delete($id);
        return redirect()->route('doctor.index');
    }
}
