<?php

namespace App\Http\Controllers\patients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\patient;

class patientsManage extends Controller
{
  public function index()
  {
    $patients = patient::all();
    return view('content.patients.patients-manage', ['patients' => $patients]);
  }
}