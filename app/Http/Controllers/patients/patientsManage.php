<?php

namespace App\Http\Controllers\patients;

use App\Http\Controllers\Controller;
use App\Models\patient;
use Illuminate\Http\Request;

class patientsManage extends Controller
{
  public function index()
  {
    $patients = patient::all();
    return view('content.patients.patients-manage', ['patients' => $patients]);
  }
}