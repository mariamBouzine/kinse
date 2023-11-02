<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\staff;
use Illuminate\Http\Request;

class CoachesListManage extends Controller
{
    public function index()
    {
        $staffs = Staff::where('status', 'Pending')->orderBy('created_at', 'desc')->get();
        // $staffs = staff::all();
        return view('content.staff.Coaches-list', ['staffs' => $staffs]);
    }
    public function accept($id)
    {
      $staff = Staff::find($id);
      $staff->Status = 'Accepted';
      $staff->save();
      return Redirect("/staff/Coaches-list");
    //   $staff = Staff::find($id);
    //   if ($staff->Status !== 'Accepted') {
    //     $staff->Status = 'Accepted';
    //     $staff->save();
  
    //     Mail::to($staff->coach->email)->send(new CoachNotification($staff));
    //   }
  
    //   return redirect("/staff/Staff-manage");
    }
    public function reject($id)
    {
        $staff = Staff::find($id);
    
        if ($staff) {
            $staff->Status = 'Rejected';
            $staff->save();  
        }
    
        return Redirect("/staff/Coaches-list"); 
    }
}
