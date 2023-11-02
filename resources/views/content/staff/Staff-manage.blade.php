@extends('layouts/contentNavbarLayout')

@section('title', 'Services Manage')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Staff /</span> staff manage</h4>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if (Session('message'))
<div class="alert alert-success">
    <p>{!! Session('message') !!}</p>
</div>
@endif
@if (Session('error'))
<div class="alert alert-success">
    <p>{!! Session('error') !!}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Search Filter</h5>
    </div>
    <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer" style="">
            <div class="row m-2 ">
                <div class="col-md-2">
                    <div class="me-3">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <label>
                                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                    class="form-select">
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
                        <div class="col-md-4 user_plan mx-3">
                            <select id="UserPlan" class="form-select text-capitalize">
                                <option value=""> Select Type </option>
                                <option value="Professional">Professional</option>
                                <option value="Particular">Particular</option>
                            </select>
                        </div>
                        {{-- <div id="DataTables_Table_0_filter" class="dataTables_filter mx-3">
                        <label>
                            <input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0">
                        </label>
                    </div> --}}
                        <div class="dt-buttons">
                            <button class="dt-button add-new btn btn-primary" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasAddUser">
                                <span>
                                    <i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add
                                        New Staff</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-striped" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                style="width: 100%;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Specialization </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $item)
                    <tr class="odd" data-service-id="{{$item["id"]}}">
                        <td class="  control" tabindex="0" style="display: none;">
                        </td>
                        <td>
                            <span>#{{$item["id"]}}</span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar-sm me-3">
                                        <span class="avatar-initial rounded-circle bg-label-warning">
                                            {{substr($item["First_Name"], 0, 1);}}
                                            {{substr($item["Last_Name"], 0, 1);}}
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="fw-medium">{{$item["First_Name"]}} {{$item["Last_Name"]}}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>{{$item["Phone"]}}</span>
                        </td>
                        <td>
                            <span>{{$item["Email"]}}</span>
                        </td>
                        <td>
                            <span>{{$item["Specialization"]}}</span>
                        </td>
                        <td>
                            <div class="d-inline-block text-nowrap">
                                <button class="btn btn-sm btn-icon edit-record" tabindex="0"
                                    aria-controls="DataTables_Table_0" data-offer-id="" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditstaff{{ $item->id }}">
                                    <i class="bx bx-edit"></i>
                                </button>
                                <form action="{{ route('staff.destroy',['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit"
                                        class="btn btn-sm btn-icon delete-record" data-id="58"><i
                                            class='bx bx-trash'></i></button>
                                </form>
                            </div>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditstaff{{ $item->id }}"
                                aria-labelledby="offcanvasEditlabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"> Edit Staff
                                    </h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body mx-0 flex-grow-0">
                                    <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework"
                                        id="editserviceForm" novalidate="novalidate"
                                        action="{{ route('staff.update', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" id="user_id">
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="add-FirstName">First Name</label>
                                            <input type="text" class="form-control" id="add-FirstName"
                                                value="{{$item!= null ? $item->First_Name : "" }}"
                                                placeholder="Enter Your First Name" name="First_Name" aria-label="">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="add-LastName">Last Name</label>
                                            <input type="text" class="form-control" id="add-LastName"
                                                value="{{$item!= null ? $item->Last_Name : "" }}"
                                                placeholder="Enter Your Last Name" name="Last_Name" aria-label="">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="add-Phone">Phone</label>
                                            <input type="number" min="0" class="form-control" id="add-Phone"
                                                value="{{$item!= null ? $item->Phone : "" }}"
                                                placeholder="Enter Your Number Phone" name="Phone" aria-label="">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="add-Email">Email</label>
                                            <input type="email" class="form-control" id="add-Email"
                                                value="{{$item!= null ? $item->Email : "" }}"
                                                placeholder="Enter Your Email" name="Email" aria-label="">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="add-Specialization">Specialization</label>
                                            <input type="text" class="form-control" id="add-Specialization"
                                                placeholder="Enter Your Specialization" name="Specialization"
                                                value="{{$item!= null ? $item->Specialization : "" }}" aria-label="">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
                                            value="submit">
                                        {{-- <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"  value="submit">Submit</button> --}}
                                        <button type="reset" class="btn btn-label-secondary"
                                            data-bs-dismiss="offcanvas">Cancel</button>
                                        <input type="hidden">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br>
        </div>
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to
                    4 of 4 entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                            <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link"
                                data-dt-idx="previous" tabindex="0" class="page-link">Previous</a>
                        </li>
                        <li class="paginate_button page-item active">
                            <a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page"
                                data-dt-idx="0" tabindex="0" class="page-link">1</a>
                        </li>
                        <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                            <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next"
                                tabindex="0" class="page-link">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Staff</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
                <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm"
                    novalidate="novalidate" action="/staff" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="user_id">
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-FirstName">First Name</label>
                        <input type="text" class="form-control" id="add-FirstName" placeholder="Enter Your First Name"
                            name="First_Name" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-LastName">Last Name</label>
                        <input type="text" class="form-control" id="add-LastName" placeholder="Enter Your Last Name"
                            name="Last_Name" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-Phone">Phone</label>
                        <input type="number" min="0" class="form-control" id="add-Phone"
                            placeholder="Enter Your Number Phone" name="Phone" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-Email">Email</label>
                        <input type="email" class="form-control" id="add-Email" placeholder="Enter Your Email"
                            name="Email" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-Specialization">Specialization</label>
                        <input type="text" class="form-control" id="add-Specialization"
                            placeholder="Enter Your Specialization" name="Specialization" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" value="submit">
                    {{-- <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"  value="submit">Submit</button> --}}
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden">
                </form>
            </div>
        </div>

    </div>
</div>
@endsection