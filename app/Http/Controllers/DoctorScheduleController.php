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
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors_schedule.index', compact('doctorSchedule'));
    }


    public function create()
    {
        $doctors = Doctor::all();
        return view('pages.doctors_schedule.create', compact('doctors'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'doctor_id' => 'required'
        ]);

        if ($request->senin) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Senin';
            $doctorSchedule->time = $request->senin;
            $doctorSchedule->save();
        }

        if ($request->selasa) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Selasa';
            $doctorSchedule->time = $request->selasa;
            $doctorSchedule->save();
        }

        if ($request->rabu) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Rabu';
            $doctorSchedule->time = $request->rabu;
            $doctorSchedule->save();
        }

        if ($request->kamis) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Kamis';
            $doctorSchedule->time = $request->kamis;
            $doctorSchedule->save();
        }

        if ($request->jumat) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Jumat';
            $doctorSchedule->time = $request->jumat;
            $doctorSchedule->save();
        }

        if ($request->sabtu) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Sabtu';
            $doctorSchedule->time = $request->sabtu;
            $doctorSchedule->save();
        }

        if ($request->minggu) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Minggu';
            $doctorSchedule->time = $request->minggu;
            $doctorSchedule->save();
        }

        return redirect()->route('doctors-schedule.index')->with('success', 'User Created Success');
    }


    public function show($id)
    {
        $doctorSchedule = DB::table('doctor-schedule')->where('id', $id)->first();
        return view('pages.doctors_schedule.index', compact('doctors'));
    }


    public function edit($id)
    {
        $doctorSchedule = DoctorSchedule::find($id);
        $doctors = Doctor::all();
        return view('pages.doctors_schedule.edit', compact('doctorSchedule', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'doctor_id' => 'required',
            'time' => 'required',
        ]);

        if ($request->senin) {
            $doctorSchedule = DoctorSchedule::find($id);
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Senin';
            $doctorSchedule->time = $request->senin;
            $doctorSchedule->save();
        }
        if ($request->selasa) {
            $doctorSchedule = DoctorSchedule::find($id);
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Selasa';
            $doctorSchedule->time = $request->selasa;
            $doctorSchedule->save();
        }
        if ($request->rabu) {
            $doctorSchedule = DoctorSchedule::find($id);
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Rabu';
            $doctorSchedule->time = $request->rabu;
            $doctorSchedule->save();
        }
        if ($request->kamis) {
            $doctorSchedule = DoctorSchedule::find($id);
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Kamis';
            $doctorSchedule->time = $request->kamis;
            $doctorSchedule->save();
        }
        if ($request->jumat) {
            $doctorSchedule = DoctorSchedule::find($id);
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Jumat';
            $doctorSchedule->time = $request->jumat;
            $doctorSchedule->save();
        }
        if ($request->sabtu) {
            $doctorSchedule = DoctorSchedule::find($id);
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Sabtu';
            $doctorSchedule->time = $request->sabtu;
            $doctorSchedule->save();
        }

        if ($request->minggu) {
            $doctorSchedule = DoctorSchedule::find($id);
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Minggu';
            $doctorSchedule->time = $request->minggu;
            $doctorSchedule->save();
        }


        return redirect()->route('doctors-schedule.index')->with('success', 'Doctor Schedule Updated Success');
    }


    public function destroy($id)
    {
        DoctorSchedule::find($id)->delete();
        return redirect()->route('doctors-schedule.index')->with('success', 'Doctor Schedule Delete Success');
    }
}






    // public function show($id)
    // {
    //     $doctorSchedule = DB::table('doctor-schedule')->where('id', $id)->first();
    //     return view('pages.doctors_schedule.index', compact('doctors'));
    // }
