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
                                        aria-controls="DataTables_Table_0" data-offer-id="" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditOffer{{ $item->id }}">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <form action="{{ route('offer.destroy',['id' => $item->id]) }}" method="POST">
                                        {{-- <a href="" class="btn btn-sm btn-icon edit-record" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEdit"><i class="bx bx-edit"></i></a> --}}
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit"
                                            class="btn btn-sm btn-icon delete-record" data-id="58"><i
                                                class='bx bx-trash'></i></button>
                                    </form>
                                </div>
                                <div class="offcanvas offcanvas-end" tabindex="-1"
                                    id="offcanvasEditOffer{{ $item->id }}" aria-labelledby="offcanvasEditOfferLabel">
                                    <div class="offcanvas-header">
                                        <h5 id="offcanvasEditOfferLabel" class="offcanvas-title">Edit Offer</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body mx-0 flex-grow-0">
                                        <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework"
                                            id="addNewUserForm" novalidate="novalidate" method="POST" action="">
                                            {{-- {{ route('offers.update', ['id' => $offers->id]) }} --}}
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="user_id">
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="add-NameOffer">Name Offer</label>
                                                <input type="text" class="form-control" id="add-NameOffer"
                                                    value="{{$item!= null ? $item->Name : "" }}"
                                                    placeholder="Enter Your Offer" name="Name" aria-label="">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="add-Duration">Duration</label>
                                                <input type="text" class="form-control" id="add-Duration"
                                                    placeholder="Enter Your Duration (00:00:00)" name="Duration"
                                                    aria-label="" value="{{$item!= null ? $item->Duration : "" }}">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="add-COST">Cost</label>
                                                <input type="number" min="0" class="form-control" id="add-COST"
                                                    placeholder="Enter Your Cost" name="Cost"
                                                    value="{{$item!= null ? $item->Cost : "" }}">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="add-Capacity">Capacity</label>
                                                <input type="number" min="0" class="form-control" id="add-Capacity"
                                                    placeholder="Enter Your Capacity" name="Capacity"
                                                    value="{{$item!= null ? $item->Capacity : "" }}">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="add-Description">Description </label>
                                                <textarea type="text" class="form-control" id="add-Description"
                                                    placeholder="Enter Your Description" name="Description"
                                                    aria-label="">{{$item!= null ? $item->Name : "" }}</textarea>
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Type">Service</label>
                                                <div class="position-relative">
                                                    <select id="Type" name="service_id"
                                                        class="select2 form-select select2-hidden-accessible"
                                                        data-select2-id="service_id" tabindex="-1" aria-hidden="true">
                                                        <option value="" data-select2-id="2">Select</option>
                                                        @foreach ($services as $service)
                                                        @if($service->id==$item->service_id)
                                                        <option value="{{ $service->id }}" selected>
                                                            {{ $service->Service_Name }}
                                                            ({{ $service->Type_Service }})</option>
                                                        @else
                                                        <option value="{{$service->id}}">{{$service->Service_Name}}
                                                            ({{ $service->Type_Service }})</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="type">Localization</label>
                                                <div class="type">
                                                    <select id="Localization" name="Localization"
                                                        class="select2 form-select select2-hidden-accessible"
                                                        data-select2-id="Type" tabindex="-1" aria-hidden="true">
                                                        <option value="" data-select2-id="2">Select</option>
                                                        <option value="Online"
                                                            {{ $item->Localization == "Online" ? 'selected' : '' }}>
                                                            Online</option>
                                                        <option value="Clinic"
                                                            {{ $item->Localization == "Clinic" ? 'selected' : '' }}>
                                                            Clinic</option>
                                                        <option value="Home"
                                                            {{ $item->Localization == "Home" ? 'selected' : '' }}>Home
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Type">Coach</label>
                                                <div class="position-relative">
                                                    <select id="Type" name="staff_id"
                                                        class="select2 form-select select2-hidden-accessible"
                                                        data-select2-id="Type" tabindex="-1" aria-hidden="true">
                                                        <option value="" data-select2-id="2">Select</option>
                                                        @foreach ($staffs as $staff)
                                                        @if($staff->id==$item->staff_id)
                                                        <option value="{{$staff->id}}" selected>{{$staff->First_Name}} {{$staff->Last_Name}}</option>
                                                        @else
                                                        <option value="{{$staff->id}}">{{$staff->First_Name}} {{$staff->Last_Name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
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

        @endsection