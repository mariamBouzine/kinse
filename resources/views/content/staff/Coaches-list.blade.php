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
            <br>
            <table class="table table-striped" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                style="width: 100%;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Specialization </th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $item)
                    <tr class="odd" data-service-id="{{$item["id"]}}">
                        <td class="  control" tabindex="0" >
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
                            @if ($item->Status == 'Accepted')
                            <span>{{$item["Status"]}}</span>
                            @endif
                            @if ($item->Status == 'Pending')
                            <form action="{{ route('staff.accept', ['id' => $item->id]) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <button onclick="return confirm('Are you sure?')" class="btn badge bg-label-success"
                                    type="submit">Accept</button>
                            </form><br>
                            <form action="{{ route('staff.reject', ['id' => $item->id]) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <button onclick="return confirm('Are you sure?')" class="btn badge bg-label-primary"
                                    type="submit">Rejected</button>
                            </form><br>
                            @endif
                            @if ($item->Status == 'Rejected')
                            <span>{{$item["Status"]}}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br>
        </div>
    </div>
    @endsection