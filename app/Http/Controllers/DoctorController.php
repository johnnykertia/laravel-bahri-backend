<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')->when($request->input('name'), function ($query, $doctor_name) {
            return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
        })->orderBy('id', 'desc')->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('pages.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required',
            'id_ihs' => 'required',
            'nik' => 'required',
        ]);


        $doctor = new Doctor;
        $doctor->doctor_name = $request->doctor_name;
        $doctor->doctor_specialist = $request->doctor_specialist;
        $doctor->doctor_phone = $request->doctor_phone;
        $doctor->doctor_email = $request->doctor_email;
        $doctor->sip = $request->sip;
        $doctor->id_ihs = $request->id_ihs;
        $doctor->nik = $request->nik;
        $doctor->save();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->storeAs('public/doctors/', $doctor->id . '.' . $image->getClientOriginalExtension());
            $doctor->photo = 'storage/doctors/' . $doctor->id . '.' . $image->getClientOriginalExtension();
            $doctor->save();
        }

        return redirect()->route('doctors.index')->with('success', 'User Created Success');
    }

    public function show($id)
    {
        $doctors = DB::table('doctors')->where('id', $id)->first();
        return view('pages.doctors.index', compact('doctors'));
    }


    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('pages.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required',
            'id_ihs' => 'required',
            'nik' => 'required',
        ]);


        $doctor = Doctor::find($id);
        $doctor->doctor_name = $request->doctor_name;
        $doctor->doctor_specialist = $request->doctor_specialist;
        $doctor->doctor_phone = $request->doctor_phone;
        $doctor->doctor_email = $request->doctor_email;
        $doctor->sip = $request->sip;
        $doctor->id_ihs = $request->id_ihs;
        $doctor->nik = $request->nik;
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'User Created Success');
    }


    public function destroy($id)
    {
        DB::table('doctors')->where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('success', 'User Delete Success');
    }
}
// $imagePath = $this->handleFileUpload($request, 'image');

        // $news->image = !empty($imagePath) ? $imagePath : $news->image;


                //Cara pertama kesimpan di Resource bukan public
                // if ($request->file('photo')) {
                //     $photo = $request->file('photo');
                //     $photo_name = time() . '.' . $photo->extension();
                //     $photo->move(public_path(''), $photo_name);
                // } else {
                //     $photo_name = null;
                // }

                // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'role' => 'required',
    //     ]);

    //     $user = User::find($id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->phone = $request->phone;
    //     $user->role = $request->role;
    //     if ($request->password) {
    //         $user->password = Hash::make($request->password);
    //     }
    //     $user->save();

    //     return redirect()->route('users.index')->with('success', 'User Updated Success');
    // }

    // $request->validate([
        //     'doctor_name' => 'required',
        //     'doctor_specialist' => 'required',
        //     'doctor_phone' => 'required',
        //     'doctor_email' => 'required|email',
        //     'sip' => 'required',
        //     'id_ihs' => 'required',
        //     'nik' => 'required',
        // ]);


        // $user = Doctor::find($id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->save();

        // return redirect()->route('doctors.index')->with('success', 'User Updated Success');
