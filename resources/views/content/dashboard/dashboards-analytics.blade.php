@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h2 class="card-title ">Good morning,<span class="text-primary">Daniel Bruk</span></h2>
            <p class="mb-4">Have a nice day at work</p>
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/morning-img.png')}}" height="140" alt="View Badge User"
              data-app-dark-img="illustrations/morning-img.png" data-app-light-img="illustrations/morning-img.png">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-4 col-md-12 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                {{-- <i class='bx bx-calendar-check' class="rounded"></i> --}}
                <img src="{{asset('assets/img/icons/unicons/calendar.png')}}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="/appointment/appointment-manage">View More</a>
                </div>
              </div>
            </div>
            <span>Today's Appointments</span>
            <h3 class="card-title text-nowrap mb-1">{{ $appointmentsToday }}</h3>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/Patient.png')}}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="/patients/patients-manage">View More</a>
                </div>
              </div>
            </div>
            <span>Today's Patients</span>
            <h3 class="card-title text-nowrap mb-1">{{ $PatientsToday }}</h3>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                </div>
              </div>
            </div>
            <span>Clinic Earning</span>
            <h3 class="card-title text-nowrap mb-1">13,921$</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <!-- Striped Rows -->
  <div class="col-md-6 col-lg-8 col-xl-8 order-0 mb-4">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">New Appointments</h5>
      </div>
      <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer" style="">
          <div class="row mx-2">
            <div class="col-md-2">
              <div class="me-3">
                <div class="dataTables_length" id="DataTables_Table_0_length">
                  <label>
                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-10">
              <div
                class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                <div class="dt-buttons">
                  <a href="/appointment/appointment-manage">show all</a>

                </div>
              </div>
            </div>
          </div>
          <br>
          <table class="table table-striped table-wrapper-scroll-y" style="height: 20px">
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
              @foreach ($appointment as $item)
              <tr>
                <td class="  control" tabindex="0"></td>
                <td><span>#{{$item["id"]}}</span></td>
                <td>
                  <div class="d-flex justify-content-start align-items-center user-name">
                    <div class="avatar-wrapper">
                      <div class="avatar avatar-sm me-3">
                        <span
                          class="avatar-initial rounded-circle bg-label-warning">{{substr($item["Full_Name"], 0, 2);}}</span>
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
            </tbody>
          </table><br>
        </div>
        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
          aria-labelledby="offcanvasAddUserLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body mx-0 flex-grow-0">
            <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm"
              novalidate="novalidate">
              <input type="hidden" name="id" id="user_id">
              <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="add-user-fullname">Full Name</label>
                <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="name"
                  aria-label="John Doe">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
              </div>
              <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="add-user-email">Email</label>
                <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com"
                  aria-label="john.doe@example.com" name="email">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
              </div>
              <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="add-user-contact">Contact</label>
                <input type="text" id="add-user-contact" class="form-control phone-mask"
                  placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
              </div>
              <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="add-user-company">Company</label>
                <input type="text" id="add-user-company" name="company" class="form-control" placeholder="Web Developer"
                  aria-label="jdoe1">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="country">Country</label>
                <div class="position-relative"><select id="country"
                    class="select2 form-select select2-hidden-accessible" data-select2-id="country" tabindex="-1"
                    aria-hidden="true">
                    <option value="United States">United States</option>
                  </select><span class="select2 select2-container select2-container--default" dir="ltr"
                    data-select2-id="1" style="width: 335.333px;"><span class="selection"><span
                        class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                        aria-expanded="false" tabindex="0" aria-disabled="false"
                        aria-labelledby="select2-country-container"><span class="select2-selection__rendered"
                          id="select2-country-container" role="textbox" aria-readonly="true"><span
                            class="select2-selection__placeholder">Select Country</span></span><span
                          class="select2-selection__arrow" role="presentation"><b
                            role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                      aria-hidden="true"></span></span></div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="user-role">User Role</label>
                <select id="user-role" class="form-select">
                  <option value="subscriber">Subscriber</option>
                  <option value="editor">Editor</option>
                  <option value="maintainer">Maintainer</option>
                  <option value="author">Author</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
              <div class="mb-4">
                <label class="form-label" for="user-plan">Select Plan</label>
                <select id="user-plan" class="form-select">
                  <option value="basic">Basic</option>
                  <option value="enterprise">Enterprise</option>
                  <option value="company">Company</option>
                  <option value="team">Team</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
              <input type="hidden">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Striped Rows -->
  <!-- Transactions -->
  <div class="col-md-6 col-lg-4 order-2 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Doctors List</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
            <a class="dropdown-item" href="/staff/Staff-manage">more</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          @foreach ($staffs as $item)
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3" style="width: 3.375rem; height:3.375rem">
              <img src="{{asset('assets/img/avatars/avatar.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Dr.{{$item["First_Name"]}} {{$item["Last_Name"]}}</h6>
                <small class="text-muted d-block mb-1">{{$item["Specialization"]}}</small>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <!--/ Transactions -->
</div>
@endsection