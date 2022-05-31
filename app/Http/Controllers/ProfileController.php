<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id',Auth::id())->first();
        return view('Profile.index')->with(['user'=>$user]);
    }

    public function show(User $User){
        return view('Profile.show')->with(['user'=>$User]);
    }

    public function edit()
    {

        $user = User::where('id',Auth::id())->first();
        $professions = Profession::all();
        return view('Profile.edit')->with([
            'user'=>$user,
            'professions'=>$professions,
        ]);
    }



    public function update(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|email',
            'phone'=>'required|numeric',
            'Address'=>'required|string',
        ]);
        $user = User::where('id',Auth::id())->first();
        $input = $request->all();
        if($request->has('photo')){
            if($request->photo != 'default.png'){
                Storage::disk('public_uploads')->delete('uploads/doctor_uploads/' . $user->photo);
            }
            Image::make($input['photo'])
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/doctor_uploads/' . $input['photo']->hashName()));

            $input['photo'] = $input['photo']->hashName();
        }

        if($request->has('password'))
        {
            $input['password'] = Hash::make($request->password);
        }

        $user->update([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => $input['password'],
            'phone' =>$input['phone'],
            'Address' =>$input['Address'],
            'bio' =>$input['bio'] ?? null,
            'degree' =>$input['degree'] ?? null,
            'photo' =>$input['photo'] ?? null,
            'prof_id' => $input['specialization'] ?? null
        ]);
        return redirect()->route('profile.index');

    }

}
