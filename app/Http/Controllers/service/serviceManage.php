<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
use App\Models\offer;
class serviceManage extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {

    // $services = service::latest()->paginate(5);

    // return view('content.service.service-manage',compact('services'))
    //     ->with('i', (request()->input('page', 1) - 1) * 10);
    $services = service::all();
    return view('content.service.service-manage', ['services' => $services]);
  }
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('content.service.service-manage');
  }
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $service = new service();
    $service->Service_Name = $request->input('Service_Name');
    $service->Description = $request->input('Description');
    $service->Type_Service = $request->input('Type_Service');
    $service->Url_video = $request->input('Url_video');
    $service->save();
    return Redirect("/service/service-manage");
  }
  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return view('content.service.service-manage', ['services' => service::find($id)]);
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(service $id)
  {
    $services = service::find($id);
    return view('content.service.service-manage', ['services' => $services]);
  }
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request,  $id)
  {
    $service = service::find($id);
    $service->Service_Name = $request->input('Service_Name');
    $service->Description = $request->input('Description');
    $service->Type_Service = $request->input('Type_Service');
    $service->Url_video = $request->input('Url_video');
    $service->save();
    return Redirect("/service/service-manage");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(service $id)
  {
    // $service = Service::find($id);
    // $id->offer()->delete();
    $id->delete();
    return redirect('/service/service-manage')
      ->with('message', 'Sevice deleted successfully. <a href="' . route('service.restore', ['id' => $id->id]) . '">Whoops, Undo</a>');
  }
  public function restore(int $id_service)
  {
    $service = service::onlyTrashed()->find($id_service);
    // $offer = offer::onlyTrashed()->find($id_service);
    if ($service && $service->withTrashed()) {
      // $offer->restore();
      $service->restore();
      return redirect('/service/service-manage')
      ->with('success', 'Service restored successfully');
    }else{
      return redirect('/staff/Staff-manage')->with('error', 'Staff not found or already restored');
    }
    
  }
}
