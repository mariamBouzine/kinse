<?php


namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\offer;
use App\Models\staff;
use Illuminate\Http\Request;

class staffManage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = staff::all();
        return view('content.staff.Staff-manage', ['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.staff.Staff-manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $staff)
    {
      $staff = staff::find($staff);
      $staff->First_Name = $request->input('First_Name');
      $staff->Last_Name = $request->input('Last_Name');
      $staff->Phone = $request->input('Phone');
      $staff->Email = $request->input('Email');
      $staff->Specialization = $request->input('Specialization');
      $staff->save();
      return Redirect("/staff/Staff-manage");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(staff $id)
    {
        // $id->offer()->delete();
        $id->delete();
        return redirect('/staff/Staff-manage')
            ->with('message', 'staff deleted successfully. <a href="' . route('staff.restore', ['id' => $id->id]) . '">Whoops, Undo</a>');
    }
    public function restore(int $id_staff)
    {
      $staff = staff::onlyTrashed()->find($id_staff);
        // $offer = offer::onlyTrashed()->find($id_staff);
      if ($staff && $staff->withTrashed()) {
        // $offer->restore();
        $staff->restore();
        return redirect('/staff/Staff-manage')
        ->with('success', 'staff restored successfully');
      }else{
        return redirect('/staff/Staff-manage')->with('error', 'Staff not found or already restored');
      }
      
    }
}
