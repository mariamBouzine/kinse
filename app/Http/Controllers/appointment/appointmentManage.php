<?php

namespace App\Http\Controllers\appointment;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\appointmentscoach;
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
    $filteredAppointments = Appointment::whereBetween('Appointment_DateTime', [$start, $end])->get();
    $staffs = Staff::where('status', 'Accepted')->orderBy('last_name')->get();
    $appointments = Appointment::all();
    return view('content.appointment.appointment-manage', compact('appointments', 'filteredAppointments', 'staffs'));
  }
  // public function handleAppointment(Request $request)
  // {
  //   $offers = offer::all();
  //   $appointments = Appointment::find();
  //   // $appointments = appointment::where('Appointment_DateTime', '>=', now())->get();
  //   foreach ($offers as $offer) {
  //     if ($offer->Class_Type === 'Clinic' || $offer->Class_Type === 'Home') {
  //       if ($appointments) {
  //       $appointmentTrainer = new appointmentscoach();
  //       $appointmentTrainer->coach_id = $request->input('staff_id');
  //       $appointmentTrainer->appointment_id = $appointments->id;
  //       $appointmentTrainer->save();
  //       }
  //     }
  //   }
  //   return Redirect("/appointment/appointment-manage")->with("success", "The appointment has been sent to coach !");
  // }
  public function handleAppointment(Request $request)
  {
    // Assuming you have the appointment ID in the request
    $appointmentId = $request->input('appointment_id');
    $coachId = $request->input('staff_id');
    $offers = offer::all();
    foreach ($offers as $offer) {
      if ($offer->Class_Type === 'Clinic' || $offer->Class_Type === 'Home') {
        if ($appointmentId && $coachId) {
          $appointment = appointment::find($appointmentId);

          if ($appointment) {
            $appointmentTrainer = new appointmentscoach();
            $appointmentTrainer->coach_id = $coachId;
            $appointmentTrainer->appointment_id = $appointment->id;
            $appointmentTrainer->save();

            return redirect("/appointment/appointment-manage")->with("success", "The appointment has been sent to the coach!");
          } else {
            return redirect("/appointment/appointment-manage")->with("error", "Invalid appointment ID.");
          }
        } else {
          return redirect("/appointment/appointment-manage")->with("error", "Appointment ID or Coach ID is missing.");
        }
      }
    }
  }
}
