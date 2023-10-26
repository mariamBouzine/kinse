@extends('layouts/contentNavbarLayout')

@section('title', 'Offers Manage')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Service /</span> Offers manage</h4>
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
            <div class="row m-2">
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
                        <div id="DataTables_Table_0_filter" class="dataTables_filter mx-3">
                            <label>
                                <input type="search" class="form-control" placeholder="Search.."
                                    aria-controls="DataTables_Table_0">
                            </label>
                        </div>
                        <div class="dt-buttons">
                            <button class="dt-button add-new btn btn-primary" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasAddOffer">
                                <span>
                                    <i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add
                                        New Offer</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name Offer</th>
                            <th>Name Service</th>
                            <th>Type Service</th>
                            <th>Name Coach</th>
                            <th>Duration</th>
                            <th>Cost</th>
                            <th>Capacity</th>
                            <th>Localization</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($offers as $item)
                        <tr>
                            <td>#<span>{{$item["id"]}}</span></td>
                            <td>{{$item["Name"]}}</td>
                            <td>{{$item->service->Service_Name}}</td>
                            <td>{{$item->service->Type_Service}}</td>
                            <td>{{$item->staff->First_Name}} {{$item->staff->Last_Name}}</td>
                            <td>{{$item["Duration"]}} min</td>
                            <td>{{$item["Cost"]}}$</td>
                            <td>{{$item["Capacity"]}}</td>
                            <td>{{$item["Localization"]}}</td>
                            <td>{{$item["Description"]}}</td>
                            <td>
                                <div class="d-inline-block text-nowrap">
                                    <button class="btn btn-sm btn-icon edit-record" tabindex="0"
                                        aria-controls="DataTables_Table_0" data-offer-id="{{ $item->id }}" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditOffer">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <a class="btn btn-sm btn-icon edit-record" tabindex="0" href="#offcanvasEditOffer&id={{ $item->id }}"
                                        aria-controls="DataTables_Table_0" data-offer-id="{{ $item->id }}" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditOffer">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('offer.destroy',['id' => $item->id]) }}" method="POST">
                                        {{-- <a href="" class="btn btn-sm btn-icon edit-record" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEdit"><i class="bx bx-edit"></i></a> --}}
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
        </div>
        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddOffer"
            aria-labelledby="offcanvasAddOfferLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddOfferLabel" class="offcanvas-title">Add Offer</h5>
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
                    novalidate="novalidate" method="POST" action="/offer">
                    @csrf
                    {{-- <input type="hidden" name="id" id="user_id"> --}}
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-NameOffer">Name Offer</label>
                        <input type="text" class="form-control" id="add-NameOffer" placeholder="Enter Your Offer"
                            name="Name" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Type">Service</label>
                        <div class="position-relative">
                            <select id="Type" name="service_id" class="select2 form-select select2-hidden-accessible"
                                data-select2-id="service_id" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->Service_Name }}
                                    ({{ $service->Type_Service }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Type">Coach</label>
                        <div class="position-relative">
                            <select id="Type" name="staff_id" class="select2 form-select select2-hidden-accessible"
                                data-select2-id="Type" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                @foreach ($staffs as $item)
                                <option value="{{$item->id}}">{{$item->First_Name}} {{$item->Last_Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-Description">Description </label>
                        <textarea type="text" class="form-control" id="add-Description"
                            placeholder="Enter Your Description" name="Description" aria-label=""></textarea>
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="type">Localization</label>
                        <div class="type">
                            <select id="Localization" name="Localization"
                                class="select2 form-select select2-hidden-accessible" data-select2-id="Type"
                                tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                <option value="Online">Online</option>
                                <option value="Clinic">Clinic</option>
                                <option value="Home">Home</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-Duration">Duration</label>
                        <input type="text" class="form-control" id="add-Duration"
                            placeholder="Enter Your Duration (00:00:00)" name="Duration" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-COST">Cost</label>
                        <input type="number" min="0" class="form-control" id="add-COST" placeholder="Enter Your Cost"
                            name="Cost" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-Capacity">Capacity</label>
                        <input type="number" min="0" class="form-control" id="add-Capacity"
                            placeholder="Enter Your Capacity" name="Capacity" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden">
                </form>
            </div>
        </div>
        {{-- /// end--}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditOffer"
            aria-labelledby="offcanvasEditOfferLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasEditOfferLabel" class="offcanvas-title">Edit Offer</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
                <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm"
                    novalidate="novalidate" method="POST" action="">
                    {{-- {{ route('offers.update', ['id' => $offers->id]) }} --}}
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="user_id">
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-NameOffer">Name Offer</label>
                        <input type="text" class="form-control" id="add-NameOffer" placeholder="Enter Your Offer"
                            name="Name" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Type">Service</label>
                        <div class="position-relative">
                            <select id="Type" name="service_id" class="select2 form-select select2-hidden-accessible"
                                data-select2-id="service_id" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->Service_Name }}
                                    ({{ $service->Type_Service }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Type">Coach</label>
                        <div class="position-relative">
                            <select id="Type" name="staff_id" class="select2 form-select select2-hidden-accessible"
                                data-select2-id="Type" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                @foreach ($staffs as $item)
                                <option value="{{$item->id}}">{{$item->First_Name}} {{$item->Last_Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-Description">Description </label>
                        <textarea type="text" class="form-control" id="add-Description"
                            placeholder="Enter Your Description" name="Description" aria-label=""></textarea>
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="type">Localization</label>
                        <div class="type">
                            <select id="Localization" name="Localization"
                                class="select2 form-select select2-hidden-accessible" data-select2-id="Type"
                                tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                <option value="Online">Online</option>
                                <option value="Clinic">Clinic</option>
                                <option value="Home">Home</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-Duration">Duration</label>
                        <input type="text" class="form-control" id="add-Duration"
                            placeholder="Enter Your Duration (00:00:00)" name="Duration" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-COST">Cost</label>
                        <input type="number" min="0" class="form-control" id="add-COST" placeholder="Enter Your Cost"
                            name="Cost" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-Capacity">Capacity</label>
                        <input type="number" min="0" class="form-control" id="add-Capacity"
                            placeholder="Enter Your Capacity" name="Capacity" aria-label="">
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden">
                </form>
            </div>
        </div>
        {{-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::
        <div class="modal fade" id="edit-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" align="center"><b>Edit User</b></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="/edit_user">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User ID</label>
                                    <input type="text" class="form-control" name="user_id" placeholder="User ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact</label>
                                    <input type="text" class="form-control" name="contact" placeholder="Enter contact">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Change Password</label>
                                    <input type="password" class="form-control" name="change_password"
                                        placeholder="Enter password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     /**
        //      * for showing edit item popup
        //      */
        //     $(document).on('click', "#edit-item", function() {
        //         $(this).addClass(
        //         'edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
        //         var options = {
        //             'backdrop': 'static'
        //         };
        //         $('#edit-modal').modal(options)
        //     })
        //     // on modal show
        //     $('#edit-modal').on('show.bs.modal', function() {
        //         var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
        //         var row = el.closest(".data-row");
        //         // get the data
        //         var id = el.data('item-id');
        //         var name = row.children(".name").text();
        //         var description = row.children(".description").text();
        //         // fill the data in the input fields
        //         $("#modal-input-id").val(id);
        //         $("#modal-input-name").val(name);
        //         $("#modal-input-description").val(description);
        //     })
        //     // on modal hide
        //     $('#edit-modal').on('hide.bs.modal', function() {
        //         $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        //         $("#edit-form").trigger("reset");
        //     })
        // })
    </script>
</div>
@endsection