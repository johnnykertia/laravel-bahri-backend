<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorScheduleController extends Controller
{
    //Index
    public function index(Request $request)
    {

        $doctorSchedule = DoctorSchedule::with('doctor')->when($request->input('doctor_id'), function ($query, $doctor_id) {
            return $query->where('doctor_id', $doctor_id);
        })
        ->orderBy('doctor_id', 'desc')
        ->paginate(10);
        return view('pages.doctors_schedule.index', compact('doctorSchedule'));
    }


    public function create()
    {
        $doctor = Doctor::all();
        return view('pages.doctors_schedule.create', compact('doctor'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
            'time' => 'required',
        ]);


        $doctorSchedule = new DoctorSchedule;
        $doctorSchedule->doctor_id = $request->doctor_id;
        $doctorSchedule->day = $request->day;
        $doctorSchedule->time = $request->time;
        $doctorSchedule->status = $request->status;
        $doctorSchedule->note = $request->note;
        $doctorSchedule->save();

        return redirect()->route('doctors-schedule.index')->with('success', 'User Created Success');
    }

    // public function show($id)
    // {
    //     $doctorSchedule = DB::table('doctor-schedule')->where('id', $id)->first();
    //     return view('pages.doctors_schedule.index', compact('doctors'));
    // }


    public function edit($id)
    {
        $doctorSchedule = DoctorSchedule::find($id);
        $doctor = Doctor::all();
        return view('pages.doctors_schedule.edit', compact('doctorSchedule', 'doctor'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
            'time' => 'required',
        ]);


        $doctorSchedule = DoctorSchedule::find($id);
        $doctorSchedule->doctor_id = $request->doctor_id;
        $doctorSchedule->day = $request->day;
        $doctorSchedule->time = $request->time;
        $doctorSchedule->status = $request->status;
        $doctorSchedule->note = $request->note;
        $doctorSchedule->save();

        return redirect()->route('doctors-schedule.index')->with('success', 'User Created Success');
    }


    public function destroy($id)
    {
        DoctorSchedule::find($id)->delete();
        return redirect()->route('doctors-schedule.index')->with('success', 'User Delete Success');
    }
}
