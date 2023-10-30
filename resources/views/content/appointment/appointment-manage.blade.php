@extends('layouts/contentNavbarLayout')

@section('title', 'Appointment Manage')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Appointment /</span> appointment manage</h4>

<div class="card">
  <div class="card-header">
    {{-- <h5 class="card-title mb-0">Search Filter</h5> --}}
  </div>
  <div class="card-datatable table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer" style="">
      <div class="row m-2">
        <div class="col-md-2">
          <div class="me-3">
            <div class="dataTables_length" id="DataTables_Table_0_length">
              <label>
                <h5 class="card-title mb-0">Search Filter</h5>
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <div
            class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
            <div class="dt-buttons">
              {{-- action="{{ route('appointments.filter') }}" --}}
              <form method="POST" action="{{ route('appointments.filter') }}">
                @csrf
                <div class="row mb-3">
                  <input type="date" style="width: 37%" class="form-control col-6 m-1" name="start_date">
                  <input type="date" style="width: 37%" class="form-control col-6 m-1" name="end_date">
                  <button type="submit" style="width: 19%" class="dt-button add-new btn btn-primary m-1">Filter</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <br>
      {{-- @if(isset($filteredAppointments))
      <h2>Filtered Appointments</h2>
      @foreach ($filteredAppointments as $appointment)
      <p>{{ $appointment->id }}</p>
      @endforeach
      @endif --}}
      <div class="table-responsive text-nowrap">
        <table class="table table-striped">
          <thead>
            <tr>
              <th></th>
              <th>Id</th>
              <th>Name Patient</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Offer</th>
              <th>Price</th>
              <th>Date</th>
              <th>status</th>
            </tr>
          </thead>
          <tbody>
            {{-- @if(isset($appointments)&& count($appointments) > 0)
              @foreach ($appointments as $item)
                <tr>
                  <td class="  control" tabindex="0"></td>
                  <td><span>#{{$item["id"]}}</span></td>
                  <td>
                    <div class="d-flex justify-content-start align-items-center user-name">
                      <div class="avatar-wrapper">
                        <div class="avatar avatar-sm me-3">
                          <span
                            class="avatar-initial rounded-circle bg-label-success">{{substr($item["Full_Name"], 0, 2);}}</span>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <span class="fw-medium">{{$item["Full_Name"]}}</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span>{{$item["email"]}}</span>
                  </td>
                  <td>
                    <span>{{$item["phone"]}}</span>
                  </td>
                  <td>
                    <span>
                      @if ($item->offer)
                      {{ $item->offer->Name }}
                      @else
                      No Offer
                      @endif
                    </span>
                  </td>
                  <td>
                    <span>
                      @if ($item->offer)
                      {{ $item->offer->Cost }}$
                      @else
                      No Offer
                      @endif
                    </span>
                  </td>
                  <td>
                    <span>{{$item["Appointment_Date"]}}</span>
                  </td>
                  <td>
                    <span class="badge  bg-label-info me-1">
                      @if ($item->offer)
                      {{ $item->offer->Localization }}
                      @else
                      No Offer
                      @endif
                    </span>
                  </td>
                </tr>
              @endforeach
            @endif --}}
            @if(isset($filteredAppointments) && count($filteredAppointments) > 0)
              @foreach ($filteredAppointments as $item)
                <tr>
                  <td class="  control" tabindex="0"></td>
                  <td><span>#{{$item["id"]}}</span></td>
                  <td>
                    <div class="d-flex justify-content-start align-items-center user-name">
                      <div class="avatar-wrapper">
                        <div class="avatar avatar-sm me-3">
                          <span
                            class="avatar-initial rounded-circle bg-label-success">{{substr($item["Full_Name"], 0, 2);}}</span>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <span class="fw-medium">{{$item["Full_Name"]}}</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span>{{$item["email"]}}</span>
                  </td>
                  <td>
                    <span>{{$item["phone"]}}</span>
                  </td>
                  <td>
                    <span>
                      @if ($item->offer)
                      {{ $item->offer->Name }}
                      @else
                      No Offer
                      @endif
                    </span>
                  </td>
                  <td>
                    <span>
                      @if ($item->offer)
                      {{ $item->offer->Cost }}$
                      @else
                      No Offer
                      @endif
                    </span>
                  </td>
                  <td>
                    <span>{{$item["Appointment_Date"]}}</span>
                  </td>
                  <td>
                    <span class="badge  bg-label-info me-1">
                      @if ($item->offer)
                      {{ $item->offer->Localization }}
                      @else
                      No Offer
                      @endif
                    </span>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
    <!-- Offcanvas to add new user -->

  </div>

</div>
@endsection