<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;
use Illuminate\Support\Facades\Storage;
use Image;
class ProfessionController extends Controller
{
    public function index(){
        $professions = Profession::all();
        return view('Admin.profession.index')->with('professions',$professions);
    }

    public function create(){
        return view('Admin.profession.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'image'=>'required|image'
        ]);

        $input = $request->all();

        Image::make($input['image'])
        ->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save(public_path('uploads/doctor_uploads/' . $input['image']->hashName()));

        $input['image'] = $input['image']->hashName();

        $profession = Profession::create($input);

        return redirect()->route('admin.professions.index');
    }


    public function edit(Profession $profession){
        return view('Admin.profession.edit')->with('profession',$profession);
    }

    public function update(Request $request,Profession $profession){
        $this->validate($request,[
            'name'=>'required|string',
            'image'=>'required|image'
        ]);

        $input = $request->all();

        if($request->image != 'default.png'){
            Storage::disk('public_uploads')->delete('uploads/doctor_uploads/' . $profession->image);
        }
        Image::make($input['image'])
        ->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save(public_path('uploads/doctor_uploads/' . $input['image']->hashName()));

        $input['image'] = $input['image']->hashName();
        $profession->update($input);
        return redirect()->route('admin.professions.index');
    }

    public function destroy(Profession $profession){
        $profession->delete($profession->id);
        return redirect()->route('admin.professions.index');

    }
}
