@extends('layout.mainlayout')
@section('content')

<!-- Page Wrapper -->
            <div class="page-wrapper">

                <!-- Page Content -->
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Employee</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Employee</li>
                                </ul>
                            </div>
                            <div class="col-auto float-end ms-auto">
                                {{-- <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a> --}}
                                <a href="{{url('add-employees')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
                                <div class="view-icons">
                                    {{-- <a href="employees" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                                    <a href="employees-list" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(session('message'))
                      <div id="message" class="alert alert-success">
                        {{ session('message') }}
                      </div>
                    @endif
                    <div id="message" style="display: none" class="alert alert-success">
                    </div>
                    <!-- /Page Header -->

                    <!-- Search Filter -->
                    <div class="row filter-row">
                        {{-- <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating">
                                <label class="focus-label">Employee ID</label>
                            </div>
                        </div> --}}
                        {{-- <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating">
                                <label class="focus-label">Employee Name</label>
                            </div>
                        </div> --}}
                        {{-- <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating">
                                    <option>Select Designation</option>
                                    <option>Web Developer</option>
                                    <option>Web Designer</option>
                                    <option>Android Developer</option>
                                    <option>Ios Developer</option>
                                </select>
                                <label class="focus-label">Designation</label>
                            </div>
                        </div> --}}
                        {{-- <div class="col-sm-6 col-md-3">
                            <a href="#" class="btn btn-success w-100"> Search </a>
                        </div> --}}
                    </div>
                    <!-- /Search Filter -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                {{-- <table class="table table-striped custom-table datatable"> --}}
                                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th class="text-nowrap">Join Date</th>
                                            <th>Department</th>
                                            <th class="text-end no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($result as $data)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                    <a
                                                    {{-- href="profile" --}}
                                                      {{-- href="{{ route('employee.edit',[$data->id]) }}" --}}
                                                      href="{{url('profile',[$data->id])}}"


                                                    >
                                                        {{$data->first_name}} {{ $data->last_name}}
                                                    <span>{{$data->designation }}</span></a>
                                                </h2>
                                            </td>
                                            <td>{{$data->emp_id }}</td>
                                            <td>{{$data->email }}</td>
                                            <td>{{$data->phone }}</td>
                                            <td>{{$data->date_of_join }}</td>
                                            @if ($data->department=='web_development')
                                              <td>Web Development</td>
                                            @elseif($data->department=='it_management')
                                               <td>IT Management</td>
                                            @elseif($data->department=='Marketing')
                                               <td>Marketing</td>
                                            @endif

                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"
                                                        {{-- href="{{ route('employee.edit',[$data->id]) }}" --}}
                                                            href="{{url('edit-employee',[$data->id])}}"

                                                            ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item getidval"   href="#"
                                                        data-id="{{$data->eid}}"
                                                        data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Inactive</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Content -->

                <!-- Add Employee Modal -->
                <div id="add_employee" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Employee</h5>

                            </div>
                            <div class="modal-body">
                                <form name="add-blog-post-form" id="add-employee-form" method="POST" action="{{url('store-employee')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="first_name" id="first_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Last Name</label>
                                                <input class="form-control" type="text" name="last_name" id="last_name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                                <input name="email" class="form-control" type="email">
                                                @if($errors->any())
                                                    @if($errors->has('email'))   // Shows the first error of that field
                                                        <h1>{{ $errors->first('email') }}</h1>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                                <input name="empId" id="empId" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Password</label>
                                                <input class="form-control" name="password" id="password" type="password">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Confirm Password</label>
                                                <input class="form-control" type="password" name="c_password" id="c_password">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                                <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="date_Of_birth" id="date_Of_birth"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="date_Of_join" id="date_Of_join"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Phone </label>
                                                <input name="phone" id="phone" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Emergency Contact No </label>
                                                <input name="emergency_phone" id="emergency_phone" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Relation with Contact</label>
                                                <input name="relation" id="relation" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">PAN</label>
                                                <input name="pan" id="pan" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Aadhar No</label>
                                                <input name="aadhar_no" id="aadhar_no" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Passport No</label>
                                                <input name="passport_no" id="passport_no" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Highest Education</label>
                                                <input name="education" id="education" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Experience in Years</label>
                                                <input name="experience" id="experience" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Role</label>
                                                <input name="role" id="role" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Reporting To</label>
                                                <input name="reporting" id="reporting" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Department <span class="text-danger">*</span></label>
                                                <select name="department" class="select">
                                                    <option>Select Department</option>
                                                    <option>Web Development</option>
                                                    <option>IT Management</option>
                                                    <option>Marketing</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation <span class="text-danger">*</span></label>
                                                <select name="designation" class="select">
                                                    <option>Select Designation</option>
                                                    <option>Web Designer</option>
                                                    <option>Web Developer</option>
                                                    <option>Android Developer</option>
                                                </select>
                                            </div>
                                        </div>




                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Address <span class="text-danger">*</span></label>
                                                <textarea name="address" id="address" rows="5" cols="5" class="form-control" placeholder="Enter message"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="submit-section">
                                        <button type="button" class="btn btn-primary submit-btn add-submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Add Employee Modal -->

                <!-- Edit Employee Modal -->
                <div id="edit_employee" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Employee</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                                <input class="form-control" value="John" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Last Name</label>
                                                <input class="form-control" value="Doe" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Username <span class="text-danger">*</span></label>
                                                <input class="form-control" value="johndoe" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                                <input class="form-control" value="johndoe@example.com" type="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Password</label>
                                                <input class="form-control" value="johndoe" type="password">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Confirm Password</label>
                                                <input class="form-control" value="johndoe" type="password">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                                <input type="text" value="FT-0001" readonly class="form-control floating">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Phone </label>
                                                <input class="form-control" value="9876543210" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Company</label>
                                                <input type="text" value="Numeroeins" readonly class="form-control floating">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Department <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select Department</option>
                                                    <option>Web Development</option>
                                                    <option>IT Management</option>
                                                    <option>Marketing</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select Designation</option>
                                                    <option>Web Designer</option>
                                                    <option>Web Developer</option>
                                                    <option>Android Developer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Edit Employee Modal -->

                <!-- Delete Employee Modal -->
                <div class="modal custom-modal fade" id="delete_employee" role="dialog">

                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-header">
                                    <h3>Inactive Employee</h3>
                                    <p>Are you sure want to Inactive Employee ?</p>
                                </div>
                                <div class="modal-btn delete-action">
                                    <div class="row">
                                        <div id="" data-id="" class="col-6 inactive">
                                            <input type="hidden" id="inactive_val" name="incative_val" value="" >
                                            <a
                                            data-bs-dismiss="modal"
                                            data-id=""
                                            href="javascript:void(0);" class="btn btn-primary continue-btn">Inactive</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Delete Employee Modal -->

            </div>
            <!-- /Page Wrapper -->

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
     $(function() {
       console.log( "ready!" );
       setTimeout(function() {
                    $('.login-message').fadeOut('fast');
                }, 4000);
                console.log( "Done!" );
    });
$( document ).ready(function() {
    //console.log( "ready!" );
    //alert('hello world');

    $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});

    $('.getidval').click(function(){
       // alert($(this).data("id"));
        val = $(this).data("id");
      $('#inactive_val').val($(this).data("id"));
      //$('#inactive_val').data('id',val);
    });

    $('.inactive').click(function(){
    //Ajax code
     alert($('#inactive_val').val());
            $.ajax({
               type:'POST',
               url:'/getEmployeeInactive',
               data:{_token: '{{csrf_token()}}',id:val},
               success:function(data) {
                   console.log('Success in AJAX......');


                    $("#message").html("Employee Inactive Successfully !");
                    $("#message").show();

                   setTimeout(function() {
                    $("#message").fadeOut('fast');
                }, 2000);
                setTimeout(function() {
                    location.reload();
                }, 2000);

                   console.log('Success in AJAX......');
               },
                  error: function (data, textStatus, errorThrown) {
                  console.log('Error in AJAX.........');
                  console.log(data);
                  },
            });
    });   // id='+val,
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
});
</script>
