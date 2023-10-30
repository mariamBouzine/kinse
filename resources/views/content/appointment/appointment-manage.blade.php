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
        <div class="col-md-5">
          <div class="me-3">
            <div class="dataTables_length" id="DataTables_Table_0_length">
              <label>
                <div class="dt-buttons">
                  <button class="dt-button add-new btn btn-secondary" tabindex="0" aria-controls="DataTables_Table_0"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddOffer">
                    <span>
                      <i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add
                        New Offer</span>
                    </span>
                  </button>
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
        <table class="table table-striped " >
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
              <td>
                <div class="d-inline-block text-nowrap">
                  <button class="btn btn-sm btn-icon edit-record" tabindex="0" aria-controls="DataTables_Table_0"
                    data-offer-id="" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasAddOffer{{$item->id}}">
                    <i class="bx bx-edit"></i>
                  </button>
                </div>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddOffer{{$item->id}}" aria-labelledby="offcanvasAddOfferLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddOfferLabel" class="offcanvas-title">Add Offer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
                      novalidate="novalidate" method="POST" action="/offer">
                      @csrf
                      <span>{{$item->id}}</span>
                      {{-- <input type="hidden" name="id" id="user_id"> --}}
                      <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-NameOffer">Name Offer</label>
                        <input type="text" class="form-control" id="add-NameOffer" placeholder="Enter Your Offer" name="Name" wire:model="Full_Name"
                          aria-label="">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
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
    <!-- Offcanvas to add new user -->
   
  </div>

</div>
@endsection