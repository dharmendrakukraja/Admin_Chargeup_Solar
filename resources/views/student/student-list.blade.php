@extends('layout.mainlayout')
@section('content')

<!-- Page Wrapper -->
            <div class="page-wrapper">
                <form name="delete-list" enctype="multipart/form-data" id="delete-list" method="POST" action="{{url('delete-student-list')}}">
                    @csrf
                <!-- Page Content -->
                <div class="content container-fluid">
                    @if (Session::has('success'))

                    <div class="successMsg alert alert-success mt-2">{{ Session::get('success') }}
                    </div>

                    @endif
                    @if (Session::has('error'))

                    <div class="successMsg alert alert-danger mt-2">{{ Session::get('error') }}
                    </div>

                    @endif

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Student</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Student</a></li>
                                    <li class="breadcrumb-item active">Student List</li>
                                </ul>
                            </div>
                            <div class="col-auto float-end ms-auto">
                                {{-- <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a> --}}
                                <a style="margin-left:20px" href="{{url('student-register')}}" class="btn add-btn"><i class="fa fa-plus"></i> Register Student</a>
                                <button type="button" id="delete_all" data-bs-toggle="modal" data-bs-target="#delete_list"  class="btn add-btn"><i class="fa fa-minus"></i>Delete Student</button>
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
                                            <th style="cursor: none" id="no-sort"><input id="all_check" class="checkbox" type="checkbox" name="list[]" value=""></th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th class="text-nowrap">Contact No</th>
                                            <th class="text-end no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($studentList as $data)
                                        <tr>
                                            <td><input class="checkbox" type="checkbox" name="list[]" value="{{$data['_id']}}"></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    {{-- <a href="profile" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a> --}}
                                                    <a href="{{url('assignment-details',[$data['_id']])}}">
                                                        @if(isset($data['firstName']))
                                                        {{$data['firstName']}}
                                                        @endif
                                                   </a>
                                                </h2>
                                            </td>
                                            <td>
                                                @if(isset($data['lastName']))
                                                 {{$data['lastName'] }}
                                                @endif
                                            </td>
                                            <td>{{$data['email'] }}</td>
                                            <td>
                                                @if(isset($data['address']))
                                                <a  href="{{ route('edit-student', ['id' => $data['_id']]) }}">{{ Str::limit($data['address'], 300) }}</a>

                                                @endif
                                            </td>
                                             <td>
                                                @if(isset($data['lastName']))
                                                 {{$data['city'] }}
                                                @endif
                                                </td>
                                             <td>
                                                @if(isset($data['lastName']))
                                                {{$data['phoneNumber'] }}
                                               @endif

                                                </td>

                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a
                                                        href="{{ route('edit-student', ['id' => $data['_id']]) }}"
                                                        class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item getidval"   href=""
                                                        data-id="{{$data['_id']}}"
                                                        data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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


                <!-- Delete Employee Modal -->
                <div class="modal custom-modal fade" id="delete_employee" role="dialog">

                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-header">
                                    <h3>Delete Student</h3>
                                    <p>Are you sure want to Delete Student ?</p>
                                </div>
                                <div class="modal-btn delete-action">
                                    <div class="row">
                                        <div id="" data-id="" class="col-6 inactive">
                                            <input type="hidden" id="inactive_val" name="incative_val" value="" >
                                            <a
                                            data-bs-dismiss="modal"
                                            data-id=""
                                            href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
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
                  <!-- Delete Multiple Student Model-->
                  <div class="modal custom-modal fade" id="delete_list" role="dialog">

                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-header">
                                    <h3>Delete Student</h3>
                                    <p>Are you sure want to Delete Selected Student ?</p>
                                </div>
                                <div class="modal-btn delete-action">
                                    <div class="row">
                                        <div id="" data-id="" class="col-6 inactive">
                                            {{-- <input type="hidden" id="inactive_val" name="incative_val" value="" > --}}
                                            <button data-bs-dismiss="modal" type="button" class="btn btn-primary submit-btn add-submit">Delete</button>
                                            {{-- <a
                                            data-bs-dismiss="modal"
                                            data-id=""
                                            href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a> --}}
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
                <!-- END Delete Multiple Student  -->
            </form>
            </div>
            <!-- /Page Wrapper -->

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
     $(function() {
          setTimeout(function () {
                 $('.successMsg').hide();
             }, 2500);

       console.log( "ready!" );
       setTimeout(function() {
                    $('.login-message').fadeOut('fast');
                }, 4000);
                console.log( "Done!" );
    });
$( document ).ready(function() {
    $('#delete_all').prop('disabled', true);
    setTimeout(function() {
            $("#no-sort").removeClass('sorting_asc');
                        }, 2000);
                $('#no-sort').click(function(){
                    //alert($('#all_check').is(':checked'));
                    if($('#all_check').is(':checked')==true){
                        $(".checkbox").prop('checked', true);
                    }else{
                        $(".checkbox").prop('checked', false);
                    }
                    //alert($(this).val());
                });

                $('.checkbox').click(function(){
                    //alert($('#all_check').is(':checked'));
                    if ($('.checkbox:checkbox:checked').length>0) {
                        $('#delete_all').prop('disabled', false);
                       // $(".checkbox").prop('checked', true);
                    }else{
                        $('#delete_all').prop('disabled', true);
                        //$(".checkbox").prop('checked', false);
                    }
                    //alert($(this).val());
                });

                $('.add-submit').click(function(){

                   document.getElementById("delete-list").submit();
                });

    localStorage.setItem("count", "1");
    //console.log( "ready!" );
    //alert('hello world');

    $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});

    $('.getidval').click(function(){
        //alert($(this).data("id"));
        val = $(this).data("id");
      $('#inactive_val').val($(this).data("id"));
      //$('#inactive_val').data('id',val);
    });

    $('.inactive').click(function(){
    //Ajax code
     var val = $('#inactive_val').val()
     //alert($('#inactive_val').val());
            $.ajax({
                type: 'DELETE',
               //type:'POST',
               url:'http://173.212.217.22:5050/api/admin/remove_student/'+val,
               data:{_token: '{{csrf_token()}}',id:val},
               success:function(data) {
                   console.log('Success in AJAX......');
                   console.log(data);
                   console.log(data.status);
                   //alert('AJAX');
                    if(data.status=='200'){
                        $("#message").html("Student Deleted Successfully !");
                        $("#message").show();

                        setTimeout(function() {
                            $("#message").fadeOut('fast');
                        }, 2000);
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }else{
                        $("#message").html(data.message);
                        $("#message").show();

                    }


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
