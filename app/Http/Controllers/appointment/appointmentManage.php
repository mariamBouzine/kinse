<?php

namespace App\Http\Controllers\appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class appointmentManage extends Controller
{
  public function index()
  {
    return view('content.appointment.appointment-manage');
  }
}