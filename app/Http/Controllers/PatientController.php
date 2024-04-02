<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = \App\Models\Patient::paginate(10);
        return view('pages.patients.index', compact('patients'));
    }
}
