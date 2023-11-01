<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;
use App\Models\offer;
use App\Models\service;
use App\Models\staff;
use Illuminate\Http\Request;

class offerManage extends Controller
{
  public function index()
  {
    $offers = offer::all();
    $services = service::all();
    $staffs = staff::all();
    return view('content.service.offer-manage', ['offers' => $offers, 'services' => $services, 'staffs' => $staffs]);
  }
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('content.service.offer-manage');
  }
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      'Name' => 'required',
      'service_id' => 'required',
      'staff_id' => 'required',
      'Duration' => 'required',
      'Cost' => 'required',
      'Localization' => 'required',
      'Description' => 'required',
      'Capacity' => 'required',
    ]);

    $offer = new offer();
    $offer->Name = $request->input('Name');
    $offer->service_id = $request->input('service_id');
    $offer->staff_id = $request->input('staff_id');
    $offer->Duration = $request->input('Duration');
    $offer->Cost = $request->input('Cost');
    $offer->Localization = $request->input('Localization');
    $offer->Description = $request->input('Description');
    $offer->Capacity = $request->input('Capacity');
    $offer->save();
    return Redirect("/service/offer-manage")->with("success", "offer is added !");
  }
  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return view('edit', ['offers' => offer::find($id)]);
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(offer $id)
  {
    $offer  = offer::find($id);
    return view('content.service.offer-manage', ['offer' => $offer]);
  }
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $offer = offer::find($id);
    $offer->Name = $request->input('Name');
    $offer->service_id = $request->input('service_id');
    $offer->staff_id = $request->input('staff_id');
    $offer->Duration = $request->input('Duration');
    $offer->Cost = $request->input('Cost');
    $offer->Localization = $request->input('Localization');
    $offer->Description = $request->input('Description');
    $offer->Capacity = $request->input('Capacity');
    $offer->save();
    return redirect('/service/offer-manage')->with('success', 'Record updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(offer $id)
  {
    $id->delete();
    return redirect('/service/offer-manage')
      ->with('message', 'Offer deleted successfully. <a href="' . route('offer.restore', ['id' => $id->id]) . '">Whoops, Undo</a>');
  }
  public function restore(int $id_offer)
  {
    $offer = offer::withTrashed()->find($id_offer);

    if ($offer && $offer->trashed()) {
      $offer->restore();
    }

    return redirect('/service/offer-manage')
      ->with('success', 'Service restored successfully');
  }
}
