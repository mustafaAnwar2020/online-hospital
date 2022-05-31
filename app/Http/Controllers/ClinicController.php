<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Clinic;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Http\Request;

class ClinicController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Doctor.Clinic.create');

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
            "bio"=>"string|required|max:500",
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::id();

        $clinic = Clinic::create($input);
        return redirect()->route('dashboard.index');
    }


    public function show()
    {
        return view('Dashboard.Doctor.Clinic.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $clinic = Clinic::where('user_id',Auth::id())->first();
        return view('Dashboard.Doctor.Clinic.edit')->with('clinic',$clinic);
    }


    public function update(Request $request,Clinic $Clinic)
    {

        $this->validate($request,[
            "name"=>"required",
            "phone"=>"required|numeric",
            "address"=>"required|string",
            "bio"=>"string|required|max:1000"
        ]);

        $Clinic->update($request->all());
        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        $clinic->delete($clinic->id);
        return redirect()->route('dashboard.index');
    }
}
