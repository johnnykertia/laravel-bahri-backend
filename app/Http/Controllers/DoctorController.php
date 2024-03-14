<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'sip' => 'required'
        ]);

        DB::table('doctors')->insert([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_phone' => $request->doctor_phone,
            'doctor_email' => $request->doctor_email,
            'sip' => $request->sip,
        ]);

        return redirect()->route('doctors.index')->with('success', 'User Created Success');
    }

    public function show($id)
    {
        $doctors = DB::table('doctors')->where('id', $id)->first();
        return view('pages.doctors.index', compact('doctors'));
    }


    public function edit($id)
    {
        $doctors = DB::table('doctors')->where('id', $id)->first();
        return view('pages.doctors.index', compact('doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required'
        ]);

        DB::table('doctors')->where('id', $id)->update([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_phone' => $request->doctor_phone,
            'doctor_email' => $request->doctor_email,
            'sip' => $request->sip,
        ]);


        return redirect()->route('doctors.index')->with('success', 'User Updated Success');
    }

    public function destroy($id)
    {
        DB::table('doctors')->where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('success', 'User Delete Success');
    }
}
