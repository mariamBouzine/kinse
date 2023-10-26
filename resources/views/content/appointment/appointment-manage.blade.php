@extends('layouts/contentNavbarLayout')

@section('title', 'Appointment Manage')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Appointment /</span> appointment manage</h4>

<!-- Striped Rows -->
<div class="card">
    <h5 class="card-header">
      <div class="input-group">
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
            <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
              <div id="DataTables_Table_0_filter" class="dataTables_filter">
                <label>
                  <input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0">
                </label>
              </div>
              <div class="dt-buttons"> 
                {{-- <button class="dt-button buttons-collection dropdown-toggle btn btn-label-secondary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="bx bx-export me-2"></i>Export</span><span class="dt-down-arrow">▼</span></button> --}}
                <button class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span><i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add New User</span></span></button> 
              </div>
            </div>
          </div>
        </div>
        {{-- <p>Type Sevice</p>
        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
          <option selected>Choose...</option>
          <option value="1">Clinic</option>
          <option value="2">Home</option>
          <option value="3">Online</option>
        </select> --}}
      </div>
      
    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Date</th>
            <th>Phone</th>
            <th>Offer</th>
            <th>Price</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>#<span>001</span></strong></td>
            <td>Matt Dickerson</td>
            <td>13/05/2022  11:15 AM</td>
            <td>844-575-3135</td>
            <td>Title Offer</td>
            <td>$4.95	</td>
            <td><button type="button" class="btn rounded-pill btn-primary">Primary</button></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>#<span>001</span></strong></td>
            <td>Matt Dickerson</td>
            <td>13/05/2022  11:15 AM</td>
            <td>844-575-3135</td>
            <td>Title Offer</td>
            <td>$4.95	</td>
            <td><button type="button" class="btn rounded-pill btn-primary">Primary</button></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>#<span>001</span></strong></td>
            <td>Matt Dickerson</td>
            <td>13/05/2022  11:15 AM</td>
            <td>844-575-3135</td>
            <td>Title Offer</td>
            <td>$4.95	</td>
            <td><button type="button" class="btn rounded-pill btn-primary">Primary</button></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>#<span>001</span></strong></td>
            <td>Matt Dickerson</td>
            <td>13/05/2022  11:15 AM</td>
            <td>844-575-3135</td>
            <td>Title Offer</td>
            <td>$4.95	</td>
            <td><button type="button" class="btn rounded-pill btn-primary">Primary</button></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>#<span>001</span></strong></td>
            <td>Matt Dickerson</td>
            <td>13/05/2022  11:15 AM</td>
            <td>844-575-3135</td>
            <td>Title Offer</td>
            <td>$4.95	</td>
            <td><button type="button" class="btn rounded-pill btn-primary">Primary</button></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>#<span>001</span></strong></td>
            <td>Matt Dickerson</td>
            <td>13/05/2022  11:15 AM</td>
            <td>844-575-3135</td>
            <td>Title Offer</td>
            <td>$4.95	</td>
            <td><button type="button" class="btn rounded-pill btn-primary">Primary</button></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>#<span>001</span></strong></td>
            <td>Matt Dickerson</td>
            <td>13/05/2022  11:15 AM</td>
            <td>844-575-3135</td>
            <td>Title Offer</td>
            <td>$4.95	</td>
            <td><button type="button" class="btn rounded-pill btn-primary">Primary</button></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>#<span>001</span></strong></td>
            <td>Matt Dickerson</td>
            <td>13/05/2022  11:15 AM</td>
            <td>844-575-3135</td>
            <td>Title Offer</td>
            <td>$4.95	</td>
            <td><button type="button" class="btn rounded-pill btn-primary">Primary</button></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>#<span>001</span></strong></td>
            <td>Matt Dickerson</td>
            <td>13/05/2022  11:15 AM</td>
            <td>844-575-3135</td>
            <td>Title Offer</td>
            <td>$4.95	</td>
            <td><button type="button" class="btn rounded-pill btn-primary">Primary</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection