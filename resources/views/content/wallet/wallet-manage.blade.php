@extends('layouts/contentNavbarLayout')

@section('title', 'Wallet Manage')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection
@section('page-script')
<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Wallet /</span> wallet manage</h4>
{{-- <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title">Search Filter</h5>
      <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
        <div class="col-md-4 user_role"><select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option><option value="Admin">Admin</option><option value="Author">Author</option><option value="Editor">Editor</option><option value="Maintainer">Maintainer</option><option value="Subscriber">Subscriber</option></select></div>
        <div class="col-md-4 user_plan"><select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Plan </option><option value="Basic">Basic</option><option value="Company">Company</option><option value="Enterprise">Enterprise</option><option value="Team">Team</option></select></div>
        <div class="col-md-4 user_status"><select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option><option value="Pending" class="text-capitalize">Pending</option><option value="Active" class="text-capitalize">Active</option><option value="Inactive" class="text-capitalize">Inactive</option></select></div>
      </div>
    </div>
    <div class="card-datatable table-responsive">
      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row mx-2"><div class="col-md-2"><div class="me-3"><div class="dataTables_length" id="DataTables_Table_0_length"><label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div></div><div class="col-md-10"><div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0"></label></div><div class="dt-buttons"> <button class="dt-button buttons-collection dropdown-toggle btn btn-label-secondary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="bx bx-export me-1"></i>Export</span><span class="dt-down-arrow">▼</span></button> <button class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span><i class="bx bx-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add New User</span></span></button> </div></div></div></div>
      <table class="order-table datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 954px;">
        <thead>
          <tr><th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th><th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 229px;" aria-label="User: activate to sort column ascending" aria-sort="descending">User</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;" aria-label="Role: activate to sort column ascending">Role</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 67px;" aria-label="Plan: activate to sort column ascending">Plan</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 132px;" aria-label="Billing: activate to sort column ascending">Billing</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 65px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 88px;" aria-label="Actions">Actions</th></tr>
        </thead><tbody><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-info">TW</span></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Tyne Widmore</span></a><small class="text-muted">twidmore12@bravesites.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="bx bx-user bx-xs"></i></span>Subscriber</span></td><td><span class="fw-medium">Team</span></td><td>Manual - Cash</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Stu Delamaine</span></a><small class="text-muted">sdelamainek@who.int</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i class="bx bx-cog bx-xs"></i></span>Author</span></td><td><span class="fw-medium">Basic</span></td><td>Auto Debit</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-primary">SO</span></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Saunder Offner</span></a><small class="text-muted">soffner19@mac.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="bx bx-pie-chart-alt bx-xs"></i></span>Maintainer</span></td><td><span class="fw-medium">Enterprise</span></td><td>Auto Debit</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-primary">SM</span></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Stephen MacGilfoyle</span></a><small class="text-muted">smacgilfoyley@bigcartel.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="bx bx-pie-chart-alt bx-xs"></i></span>Maintainer</span></td><td><span>Company</span></td><td>Manual - Paypal</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Seth Hallam</span></a><small class="text-muted">shallamb@hugedomains.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="bx bx-user bx-xs"></i></span>Subscriber</span></td><td><span class="fw-medium">Team</span></td><td>Manual - Credit Card</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Rafaellle Snowball</span></a><small class="text-muted">rsnowballv@indiegogo.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"><i class="bx bx-edit bx-xs"></i></span>Editor</span></td><td><span class="fw-medium">Basic</span></td><td>Manual - Paypal</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-warning">OW</span></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Onfre Wind</span></a><small class="text-muted">owind1b@yandex.ru</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span>Admin</span></td><td><span class="fw-medium">Basic</span></td><td>Manual - Paypal</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/10.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Maggy Hurran</span></a><small class="text-muted">mhurran4@yahoo.co.jp</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="bx bx-user bx-xs"></i></span>Subscriber</span></td><td><span class="fw-medium">Enterprise</span></td><td>Auto Debit</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/9.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Kathryne Liger</span></a><small class="text-muted">kliger7@vinaora.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i class="bx bx-cog bx-xs"></i></span>Author</span></td><td><span class="fw-medium">Enterprise</span></td><td>Manual - Cash</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-body text-truncate"><span class="fw-medium">Kare Skitterel</span></a><small class="text-muted">kskitterelm@washingtonpost.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="bx bx-pie-chart-alt bx-xs"></i></span>Maintainer</span></td><td><span class="fw-medium">Basic</span></td><td>Manual - Paypal</td><td><span class="badge bg-label-warning">Pending</span></td><td><div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr></tbody>
      </table><div class="row mx-2"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 19 entries (filtered from 50 total entries)</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
    </div>
    <!-- Offcanvas to add new user -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
      <div class="offcanvas-header">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" onsubmit="return false" novalidate="novalidate">
          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-user-fullname">Full Name</label>
            <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="userFullname" aria-label="John Doe">
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-user-email">Email</label>
            <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="userEmail">
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
          <div class="mb-3">
            <label class="form-label" for="add-user-contact">Contact</label>
            <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact">
          </div>
          <div class="mb-3">
            <label class="form-label" for="add-user-company">Company</label>
            <input type="text" id="add-user-company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" name="companyName">
          </div>
          <div class="mb-3">
            <label class="form-label" for="country">Country</label>
            <div class="position-relative"><select id="country" class="select2 form-select select2-hidden-accessible" data-select2-id="country" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="2">Select</option>
              <option value="Australia">Australia</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Belarus">Belarus</option>
              <option value="Brazil">Brazil</option>
              <option value="Canada">Canada</option>
              <option value="China">China</option>
              <option value="France">France</option>
              <option value="Germany">Germany</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Japan">Japan</option>
              <option value="Korea">Korea, Republic of</option>
              <option value="Mexico">Mexico</option>
              <option value="Philippines">Philippines</option>
              <option value="Russia">Russian Federation</option>
              <option value="South Africa">South Africa</option>
              <option value="Thailand">Thailand</option>
              <option value="Turkey">Turkey</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 335.333px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-country-container"><span class="select2-selection__rendered" id="select2-country-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
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
            <label class="form-label"  for="user-plan">Select Plan</label>
            <select id="user-plan" type="search"class="form-select select-table-filter" data-table="order-table">
              <option value="basic">Basic</option>
              <option value="enterprise">Enterprise</option>
              <option value="company">Company</option>
              <option value="team">Team</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        <input type="hidden"></form>
      </div>
    </div>
</div> --}}
<div class="card">
    <h5 class="card-header">Row Grouping</h5>
    <div class="card-datatable table-responsive">
        <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap5">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="DataTables_Table_2_length"><label>Show <select
                                name="DataTables_Table_2_length" aria-controls="DataTables_Table_2" class="form-select">
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select> entries</label></div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                    <div id="DataTables_Table_2_filter" class="dataTables_filter"><label>Search:<input type="search"
                                class="form-control" placeholder="" aria-controls="DataTables_Table_2"></label></div>
                </div>
            </div>
            <table class="dt-row-grouping table border-top dataTable dtr-column" id="DataTables_Table_2"
                aria-describedby="DataTables_Table_2_info" style="width: 1210px;">
                <thead>
                    <tr>
                        <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                            style="width: 0px; display: none;" aria-label=""></th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            style="width: 160px;" aria-label="Name: activate to sort column ascending">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            style="width: 238px;" aria-label="Email: activate to sort column ascending">Email</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            style="width: 172px;" aria-label="City: activate to sort column ascending">City</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            style="width: 79px;" aria-label="Date: activate to sort column ascending">Date</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            style="width: 77px;" aria-label="Salary: activate to sort column ascending">Salary</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            style="width: 108px;" aria-label="Status: activate to sort column ascending">Status</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 64px;" aria-label="Actions">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>Evangelina Carnock</td>
                        <td>ecarnock2q@washington.edu</td>
                        <td>Doushaguan</td>
                        <td>01/26/2021</td>
                        <td>$23704.82</td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-inline-block">
                                <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="javascript:;" class="dropdown-item">Details</a>
                                    <a href="javascript:;" class="dropdown-item">Archive</a>
                                    <div class="dropdown-divider">
                                    </div>
                                    <a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a>
                                </div>
                            </div>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>Jules Auten</td>
                        <td>jauten1n@foxnews.com</td>
                        <td>Mojo</td>
                        <td>08/13/2021</td>
                        <td>$13870.62</td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                        class="dropdown-item">Details</a><a href="javascript:;"
                                        class="dropdown-item">Archive</a>
                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                        class="dropdown-item text-danger delete-record">Delete</a>
                                </div>
                            </div><a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i
                                    class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>Eileen Diehn</td>
                        <td>ediehn6@163.com</td>
                        <td>Lampuyang</td>
                        <td>10/15/2021</td>
                        <td>$18991.67</td>
                        <td><span class="badge  bg-label-danger">Rejected</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                        class="dropdown-item">Details</a><a href="javascript:;"
                                        class="dropdown-item">Archive</a>
                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                        class="dropdown-item text-danger delete-record">Delete</a>
                                </div>
                            </div><a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i
                                    class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>Aili De Coursey</td>
                        <td>adew@etsy.com</td>
                        <td>Łazy</td>
                        <td>09/30/2021</td>
                        <td>$14082.44</td>
                        <td><span class="badge  bg-label-info">Applied</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                        class="dropdown-item">Details</a><a href="javascript:;"
                                        class="dropdown-item">Archive</a>
                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                        class="dropdown-item text-danger delete-record">Delete</a>
                                </div>
                            </div><a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i
                                    class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>Sheila-kathryn Haborn</td>
                        <td>shaborn10@about.com</td>
                        <td>Lewolang</td>
                        <td>11/10/2021</td>
                        <td>$24624.23</td>
                        <td><span class="badge  bg-label-danger">Rejected</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                        class="dropdown-item">Details</a><a href="javascript:;"
                                        class="dropdown-item">Archive</a>
                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                        class="dropdown-item text-danger delete-record">Delete</a>
                                </div>
                            </div><a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i
                                    class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>Nadia Bettenson</td>
                        <td>nbettensong@joomla.org</td>
                        <td>Chabařovice</td>
                        <td>07/11/2021</td>
                        <td>$20484.44</td>
                        <td><span class="badge bg-label-primary">Current</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                        class="dropdown-item">Details</a><a href="javascript:;"
                                        class="dropdown-item">Archive</a>
                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                        class="dropdown-item text-danger delete-record">Delete</a>
                                </div>
                            </div><a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i
                                    class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>Ddene Chaplyn</td>
                        <td>dchaplyn16@nymag.com</td>
                        <td>Lattes</td>
                        <td>01/23/2021</td>
                        <td>$11958.33</td>
                        <td><span class="badge  bg-label-success">Professional</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                    class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"
                                        class="dropdown-item">Details</a><a href="javascript:;"
                                        class="dropdown-item">Archive</a>
                                    <div class="dropdown-divider"></div><a href="javascript:;"
                                        class="dropdown-item text-danger delete-record">Delete</a>
                                </div>
                            </div><a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i
                                    class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="control dtr-hidden" rowspan="1" colspan="1" style="display: none;"></th>
                        <th rowspan="1" colspan="1">Name</th>
                        <th rowspan="1" colspan="1">Email</th>
                        <th rowspan="1" colspan="1">City</th>
                        <th rowspan="1" colspan="1">Date</th>
                        <th rowspan="1" colspan="1">Salary</th>
                        <th rowspan="1" colspan="1">Status</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_info" id="DataTables_Table_2_info" role="status" aria-live="polite">Showing
                        22 to 28 of 100 entries</div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_2_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous" id="DataTables_Table_2_previous">
                                <a href="#" aria-controls="DataTables_Table_2" role="link" data-dt-idx="previous"
                                    tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="DataTables_Table_2" role="link" data-dt-idx="0" tabindex="0"
                                    class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="DataTables_Table_2" role="link" data-dt-idx="1" tabindex="0"
                                    class="page-link">2</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="DataTables_Table_2" role="link" data-dt-idx="2" tabindex="0"
                                    class="page-link">3</a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="DataTables_Table_2" role="link" aria-current="page"
                                    data-dt-idx="3" tabindex="0" class="page-link">4</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="DataTables_Table_2" role="link" data-dt-idx="4" tabindex="0"
                                    class="page-link">5</a>
                            </li>
                            <li class="paginate_button page-item disabled" id="DataTables_Table_2_ellipsis">
                                <a aria-controls="DataTables_Table_2" aria-disabled="true" role="link"
                                    data-dt-idx="ellipsis" tabindex="0" class="page-link">…</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2"
                                    role="link" data-dt-idx="14" tabindex="0" class="page-link">15</a>
                            </li>
                            <li class="paginate_button page-item next" id="DataTables_Table_2_next">
                                <a href="#" aria-controls="DataTables_Table_2" role="link" data-dt-idx="next"
                                    tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection