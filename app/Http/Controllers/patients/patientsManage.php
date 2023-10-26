<?php

namespace App\Http\Controllers\patients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class patientsManage extends Controller
{
  public function index()
  {
    return view('content.patients.patients-manage');
  }
}