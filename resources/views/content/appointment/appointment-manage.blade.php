@extends('layouts/contentNavbarLayout')

@section('title', 'Appointment Manage')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Appointment /</span> appointment manage</h4>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Search Filter</h5>
  </div>
  <div class="card-datatable table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer" style="">
      <div class="row m-2">
        <div class="col-md-5">
          <div class="me-3">
            <div class="dataTables_length" id="DataTables_Table_0_length">
              <label>
                <div class="dt-buttons">
                  {{-- <button class="dt-button add-new btn btn-secondary" tabindex="0" aria-controls="DataTables_Table_0"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddOffer">
                    <span>
                      <i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add
                        New Offer</span>
                    </span>
                  </button> --}}
                </div>
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-7">
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
      <div class="table-responsive text-nowrap">
        <table class="table table-striped ">
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
              <th>Duration Type</th>
              <th>status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
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
                @if ($item->offer)
                <span> {{ $item->offer->Name }}</span>
                @else
                <span class="badge  bg-label-primary me-1">
                  No offer
                </span>
                @endif
              </td>
              <td>
                @if ($item->offer)
                <span>{{ $item->offer->Cost }}$</span>
                @else
                <span class="badge  bg-label-primary me-1">
                  No offer
                </span>
                @endif
              </td>
              <td>
                <span>{{$item["Appointment_DateTime"]}}</span>
              </td>
              <td>
                @if ($item->offer)
                <span class="badge  bg-label-dark me-1">{{ $item->offer->Duration_Type }}</span>
                @else
                <span class="badge  bg-label-primary me-1">
                  No offer
                </span>
                @endif
              </td>
              <td>
                @if ($item->offer)
                <span class="badge  bg-label-info me-1">{{ $item->offer->Class_Type }}</span>
                @else
                <span class="badge  bg-label-primary me-1">
                  No offer
                </span>
                @endif
              </td>
              <td>
                <div class="d-inline-block text-nowrap">
                  <button class="btn btn-sm btn-icon edit-record" tabindex="0" aria-controls="DataTables_Table_0"
                    data-offer-id="" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasAddOffer{{$item->id}}">
                    <i class="bx bx-edit"></i>
                  </button>
                </div>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddOffer{{$item->id}}"
                  aria-labelledby="offcanvasAddOfferLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddOfferLabel" class="offcanvas-title">Handle Appointment</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body mx-0 flex-grow-0">
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert  error">
                      <div>Error!</div>
                      <div class="typeerror">{{$error}}</div>
                    </div>
                    @endforeach
                    @endif
                    <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm"
                      novalidate="novalidate" method="POST" action="{{ route('appointments.handleAppointment',['id' => $item->id]) }}">
                      @csrf
                      <input type="hidden" name="appointment_id" id="appointment_id" value="{{$item->id}}">
                      <div class="mb-3 fv-plugins-icon-container">
                        <div class="position-relative">
                          <select id="Type" name="staff_id" class="select2 form-select select2-hidden-accessible"
                            data-select2-id="service_id" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="2">Select</option>
                            @foreach ($staffs as $staff)
                            <option value="{{ $staff->id }}">
                              {{ $staff->First_Name }} {{ $staff->Last_Name }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                      <input type="hidden">
                    </form>
                  </div>
                </div>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection