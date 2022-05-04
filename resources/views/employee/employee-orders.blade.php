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
                                <h3 class="page-title">Employee Orders</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Employee</a></li>
                                    <li class="breadcrumb-item active">Employee Orders</li>
                                </ul>
                            </div>
                            <div class="col-auto float-end ms-auto">
                                {{-- <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a> --}}
                                <a style="margin-left:20px" href="{{url('add-employee')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
                                {{-- <button type="button" id="delete_all" data-bs-toggle="modal" data-bs-target="#delete_list"  class="btn add-btn"><i class="fa fa-minus"></i>Delete Employee</button> --}}
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
                            <th>Building Type</th>
                            <th>Solar Type</th>
                            <th>Status</th>
                            <th>User Name</th>
                            <th width="11%">Appointment Date</th>
                            <th class="text-end no-sort">Action</th>
                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderList as $data)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a>
                                                        @if(isset($data['addedBy']['fullName']))
                                                        {{$data['addedBy']['fullName']}}
                                                        @endif
                                                   </a>
                                                </h2>
                                            </td>


                                            <td>
                                                @if(isset($data['buildingTypeId']['Type']))
                                                {{-- <a href="{{ route('edit-employee', ['id' => $data['_id']]) }}">{{ Str::limit($data['buildingTypeId']['Type'], 300) }}</a> --}}
{{ $data['buildingTypeId']['Type'] }}
                                                @endif
                                            </td>
                                             <td>
                                                @if(isset($data['solarTypeId']['title']))
                                                 {{$data['solarTypeId']['title'] }}
                                                @endif
                                                </td>
                                             <td>
                                                @if(isset($data['orderStatus']))
                                                @if($data['orderStatus']=='track') Track @endif
                                                @if($data['orderStatus']=='order_placed') Order Placed @endif
                                                @if($data['orderStatus']=='shipped') Shipped @endif
                                                @if($data['orderStatus']=='out_for_delivery') Out for Delivery @endif
                                                @if($data['orderStatus']=='delivered') Delivered @endif
                                                @if($data['orderStatus']=='installation_start') Installation Start @endif

                                                @if($data['orderStatus']=='installation_completed') Installation Completed @endif
                                                {{-- {{$data['orderStatus'] }} --}}
                                               @endif

                                                </td>
                                                <td>
                                                    @if(isset($data['fullName']))
                                                    {{$data['fullName'] }}
                                                   @endif

                                                    </td>
                                                <td>
                                                    @if(isset($data['appointmentDate']))
                                                    {{$data['appointmentDate'] }}
                                                   @endif

                                                    </td>

                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        {{-- <a
                                                        href="{{ route('employee-order-assign', ['id' => $data['_id']]) }}"
                                                        class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Assign</a>
                                                        <a
                                                        href="{{ route('employee-order-edit', ['id' => $data['_id']]) }}"
                                                        class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a> --}}
                                                        {{-- <a class="dropdown-item getidval"    href="{{ route('employee-order-detail', ['id' => $data['_id']]) }}"
                                                        data-id="{{$data['_id']}}"><i class="fa fa-trash-o m-r-5"></i> Details</a> --}}
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
                                    <h3>Delete Employee</h3>
                                    <p>Are you sure want to Delete Employee ?</p>
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
                  <!-- Delete Multiple Employee Model-->
                  <div class="modal custom-modal fade" id="delete_list" role="dialog">

                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-header">
                                    <h3>Delete Employee</h3>
                                    <p>Are you sure want to Delete Selected Employee ?</p>
                                </div>
                                <div class="modal-btn delete-action">
                                    <div class="row">
                                        <div id="" data-id="" class="col-6 inactive">
                                            <input type="hidden" id="inactive_val" name="incative_val" value="" >
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
                <!-- END Delete Multiple Employee  -->
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
     //alert('ID='+$('#inactive_val').val());
     var adminId = '<?php echo Session::get("userData")["_id"]; ?>';
     var token = '<?php echo Session::get("userData")["token"]; ?>';
     //alert('TOOKEN=>'+token);
     //alert('AdminID='+adminId)
    //  var AjaUrl = "<?php
    //  Http::withHeaders([
    //      ?>";
    //      AjaUrl = AjaUrl + val;
     // alert(AjaUrl);
    // header("Access-Control-Allow-Origin: *");

    });   // id='+val,
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
});
</script>
