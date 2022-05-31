<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    public function index(Request $request)
    {
        $hospitals = Hospital::when($request->search,function($q) use ($request){
            return $q->where('name','LIKE','%' . $request->search . '%');
        })->get();;
        return view('Dashboard.Hospital.index')->with(['hospitals'=>$hospitals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Doctor.addHospital');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
            "phone"=>"required|numeric",
            "address"=>"required|string",
            "bio"=>"string|required|max:500"
        ]);


        $hospital = Hospital::create($request->all());

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $Hospital)
    {
        return view('Dashboard.Hospital.show')->with('hospital',$Hospital);
    }

    public function showDoctor(){
        return view('Dashboard.Doctor.Hospital.show');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $Hospital)
    {
        return view('Dashboard.Hospital.edit')->with('hospital',$Hospital);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $Hospital)
    {
        $this->validate($request,[
            "name"=>"required",
            "phone"=>"required|numeric",
            "address"=>"required|string",
            "bio"=>"string|required|max:500"
        ]);


        $Hospital->update($request->all());

        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $Hospital)
    {
        $Hospital->delete($Hospital->id);
        return redirect()->route('dashboard.index');
    }
}
