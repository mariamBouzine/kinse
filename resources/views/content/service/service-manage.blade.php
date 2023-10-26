@extends('layouts/contentNavbarLayout')

@section('title', 'Services Manage')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Service /</span> service manage</h4>
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
                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
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
                        <button class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                            <span>
                                <i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add New Service</span>
                            </span>
                        </button> 
                    </div>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name Service</th>
                    <th>Type Service</th>
                    <th>URL Video</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($services as $item)
                <tr>
                    <td>#<span>{{$item["id"]}}</span></td>
                    <td>{{$item["Service_Name"]}}</td>
                    <td>{{$item["Type_Service"]}}</td>
                    <td>{{$item["Description"]}}</td>
                    <td><a href="#">{{$item["Url_video"]}}</a></td>
                    <td>
                        <div class="d-inline-block text-nowrap">
                            <form action="{{ route('service.destroy',['id' => $item->id]) }}" method="POST">
                                <a href="" class="btn btn-sm btn-icon edit-record" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEdit"><i class="bx bx-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" type="submit"
                                    class="btn btn-sm btn-icon delete-record" data-id="58"><i
                                        class='bx bx-trash'></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
      </div>
      {{-- <div class="row mx-2">
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                        <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a>
                    </li>
                    <li class="paginate_button page-item active">
                        <a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a>
                    </li>
                    <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                        <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a>
                    </li>
                </ul>
            </div>
        </div>
      </div> --}}
      <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Service</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
                <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" novalidate="novalidate" action="/service" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="user_id">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="add-NameService">Name Service</label>
                            <input type="text" class="form-control" id="add-NameService" placeholder="Enter Your Service" name="Service_Name" aria-label="">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Type">Type Service</label>
                            <div class="position-relative">
                                <select id="Type" name="Type_Service" class="select2 form-select select2-hidden-accessible" data-select2-id="Type" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                <option value="Professional">Professional</option>
                                <option value="Particular">Particular</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="add-Description">Description	</label>
                            <textarea type="text" class="form-control" id="add-Description" placeholder="Enter Your Description" name="Description" aria-label=""></textarea>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="add-Video">URL Video</label>
                            <input type="text" class="form-control" id="add-Video" placeholder="Enter Your Url" name="Url_video" aria-label="">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <input type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"  value="submit">
                        {{-- <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"  value="submit">Submit</button> --}}
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden">
                </form>
            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEdit" aria-labelledby="offcanvasEditlabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title"> Edit Service</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
                <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="editserviceForm" novalidate="novalidate" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="add-NameService">Name Service</label>
                            <input type="text" class="form-control" value="" id="add-NameService" placeholder="Enter Your Service" name="Service_Name" aria-label="">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Type">Type Service</label>
                            <div class="position-relative"><select id="Type" name="Type_Service" class="select2 form-select select2-hidden-accessible" data-select2-id="Type" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                <option value="Professional">Professional</option>
                                <option value="Particular">Particular</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="add-Description">Description	</label>
                            <textarea type="text" class="form-control" id="add-Description" placeholder="Enter Your Description" name="Description" aria-label=""></textarea>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="add-Video">URL Video</label>
                            <input type="text" class="form-control" id="add-Video" placeholder="Enter Your Url" name="Url_video" aria-label="">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <input type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"  value="submit">
                        {{-- <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"  value="submit">Submit</button> --}}
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection