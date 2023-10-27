<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Analytics extends Controller
{
  public function index()
  { 
    $currentDate = Carbon::now()->toDateString();

    // $appointments = Appointment::whereDate('Appointment_Date', $currentDate)
    //     ->whereHas('patient', function ($query) {
    //         $query->where('condition', 'value'); 
    //     })->get();

    $staffs = staff::orderBy("created_at","asc")->paginate(5);
    $appointment = Appointment::with('offer')->get();
    return view('content.dashboard.dashboards-analytics', ['staffs' => $staffs,'appointment'=>$appointment]);    
  }
}
