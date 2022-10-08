<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Stripe\Exception\CardException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('Dashboard.Appointments.create');
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
            'start_time'=>'required',
            'finish_time'=>'required',
            'price'=>'required|string',
        ]);
        $input = $request->all();
        $input['doctor_id'] = Auth::id();
        $appointment = Appointment::create($input);
        return redirect()->route('appointments.show');
    }

    public function meeting(User $user){
        return view('Dashboard.Appointments.meeting')->with(['user'=>$user]);
    }

    public function bookMeeting(User $user,Appointment $appointment){
        return view('Dashboard.Appointments.bookMeeting')->with([
            'user'=>$user,
            'apponitment'=>$appointment
        ]);
    }
    public function storemeeting(Appointment $appointment){

        return redirect(url('/'));
    }
    public function show()
    {
        $appointments = Appointment::where('doctor_id',Auth::id())->get();
        return view('Dashboard.Appointments.show')->with('appointments',$appointments);
    }



    public function edit(Appointment $appointment)
    {
        return view('Dashboard.Appointments.edit')->with('appointment',$appointment);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $this->validate($request,[
            'start_time'=>'required',
            'finish_time'=>'required',
            'price'=>'required|string',
        ]);
        $input = $request->all();
        $input['doctor_id'] = Auth::id();
        $appointment->update($input);
        return redirect()->route('appointments.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete($appointment->id);
        return redirect()->route('appointments.show');
    }


    public function checkout(Request $request , Appointment $app){


        try{
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $app->price * 100,
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'description' => 'Doctor Appointment',
            'receipt_email' => $request->email,
        ]);

        $user = User::where('id',Auth::id())->first();
        $user->patientAppointment()->attach($app->id);
        }
        catch(CardException $e){
            return back()->withErrors('Error! ' . $e->getMessage());
        }
        return redirect()->route('appointments.confirm');
    }

    public function confirm(){
        return view('Dashboard.Appointments.confirm');
    }
}
