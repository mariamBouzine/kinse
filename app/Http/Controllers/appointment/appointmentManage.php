<?php

namespace App\Http\Controllers\appointment;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\offer;
use App\Models\staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class appointmentManage extends Controller
{
  public function index()
  {
    $appointments = appointment::all();
    $offers = offer::all();
    $staffs = staff::all();
    return view('content.appointment.appointment-manage', ['appointments' => $appointments, 'offers' => $offers, 'staffs' => $staffs]);
  }
  public function filterByDate(Request $request)
  {
    $start = Carbon::parse($request->start_date)->startOfDay();
    $end = Carbon::parse($request->end_date)->endOfDay();
    $filteredAppointments = Appointment::whereBetween('appointment_date', [$start, $end])->get();
    $appointments = Appointment::all();
    return view('content.appointment.appointment-manage', compact('appointments', 'filteredAppointments'));
  }
  /**
   * Show the form for editing the specified resource.
   */
 
}
