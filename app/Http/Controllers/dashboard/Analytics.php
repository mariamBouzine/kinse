<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\patient;
use App\Models\staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Analytics extends Controller
{
  public function index()
  {
    $today = Carbon::now()->toDateString();
    $appointmentsToday = Appointment::whereDate('Appointment_DateTime', $today)->count() ?? 0;
    $PatientsToday = patient::whereDate('created_at', $today)->count();
    $staffs = staff::where('status', 'Pending')->orderBy("created_at", "asc")->paginate(5);
    $appointment =  Appointment::whereDate('Appointment_DateTime', $today)->with('offer')->get();
    // $appointment = Appointment::with('offer')->get();
    return view('content.dashboard.dashboards-analytics', ['staffs' => $staffs, 'appointment' => $appointment,'appointmentsToday'=>$appointmentsToday,'PatientsToday'=>$PatientsToday]);
  }
}
