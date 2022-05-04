@extends('layout.mainlayout')
@section('content')
<style>
    .text-danger {
        font-color:red !important;
    }
    </style>
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="row align-items-center">

                <!-- Page Content -->

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">User Order Detail</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">User</a></li>
                                <li class="breadcrumb-item active">Order Details</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-employee-form" method="POST" action="{{url('update-student',[$orderDetails['_id']])}}">

                        @csrf
                        @method('PUT')
                        <div class="row">



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">User Name </label>

                                    <input readonly name="phoneNumber" value="@if(isset($orderDetails['fullName'])){{$orderDetails['fullName']}}@endif" class="form-control" type="text">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">House/Block No./Street</label>
                                    <input value="@if(isset($orderDetails['houseNumber'])){{$orderDetails['houseNumber']}}@endif" readonly type="text" class="form-control">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Apartment/Road/Area/City</label>
                                    <input readonly value="@if(isset($orderDetails['city'])){{$orderDetails['city']}}@endif" class="form-control" type="text">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">State/Province</label>
                                    <input readonly value="@if(isset($orderDetails['state'])){{$orderDetails['state']}}@endif" class="form-control" type="text">

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Zip/Postal Code</label>
                                    <input value="@if(isset($orderDetails['zipcode'])){{ $orderDetails['zipcode'] }}@endif"  class="form-control" type="text"  readonly >
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">AppointmentDate & Time</label>
                                    <input readonly value="@if(isset($orderDetails['appointmentDate'])){{ $orderDetails['appointmentDate'] }} {{ $orderDetails['appointmentTime'] }}@endif"  class="form-control" type="text" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Referral Code</label>
                                    <input value="@if(isset($orderDetails['referralCode'])){{ $orderDetails['referralCode'] }}@endif"  class="form-control" type="text"  readonly >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Tracking Number</label>
                                    <input value="@if(isset($orderDetails['trackingNumber'])){{ $orderDetails['trackingNumber'] }}@endif"  class="form-control" type="text" name="city" readonly id="city">
                               </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Solar Type</label>
                                    <input value="@if(isset($orderDetails['solarTypeId']['title'])){{ $orderDetails['solarTypeId']['title'] }}@endif"  class="form-control" type="text" name="city" readonly id="city">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Building Type</label>
                                    <input value="@if(isset($orderDetails['buildingTypeId']['Type'])){{ $orderDetails['buildingTypeId']['Type'] }}@endif"  class="form-control" type="text" name="city" readonly >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Zip/Postal Code</label>
                                    <input value="@if(isset($orderDetails['zipcode'])){{ $orderDetails['zipcode'] }}@endif"  class="form-control" type="text" name="city" readonly id="city">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Order Status</label>
                                    <input value="@if(isset($orderDetails['orderStatus']))@if($orderDetails['orderStatus']=='track')Track @endif
@if($orderDetails['orderStatus']=='order_placed')Order Placed @endif
@if($orderDetails['orderStatus']=='shipped')Shipped @endif @if($orderDetails['orderStatus']=='out_for_delivery')Out for Delivery @endif
@if($orderDetails['orderStatus']=='delivered')Delivered @endif
@if($orderDetails['orderStatus']=='installation_start') Installation Start @endif
@if($orderDetails['orderStatus']=='installation_completed') Installation Completed @endif
@endif"  class="form-control" type="text" name="city" readonly id="city">
                                    {{-- <select id="File_type" class="select" required name="type">
                                        <option value="">Select Status</option>
                                        <option value="track">Track</option>
                                        <option value="order_placed">Order Placed</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="out_for _delivery">Out for Delivery</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="installation _start">Installation Start</option>
                                        <option value="installation _completed">Installation Completed</option>
                                    </select> --}}
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Assigned Employees</label>
                                    <input value="@if(isset($assigned)){{ $assigned }}@endif"  class="form-control" type="text" name="city" readonly id="city">
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Image</label>
                                    <img src="@if(isset($orderDetails['Image'])){{ $orderDetails['Image'] }}@endif"  class="form-control" />
                                </div>
                            </div> --}}


                        {{-- <div class="submit-section">
                            <button type="button" class="btn btn-primary submit-btn add-submit">Submit</button>
                        </div> --}}

                </form>

                <!-- /Delete Employee Modal -->
            </div>
            </div>
        </div>
            <!-- /Page Wrapper -->

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    //console.log( "ready!" );
    $(document).on('click', '#removeRow', function () {
             // alert('Delete');
            //$(this).closest('#inputFormRow').remove();
            $(this).closest('#inputFormRow').html('');
        });
    //alert('hello world');
    $('.add-submit').click(function(){
    //Some code
    document.getElementById("add-employee-form").submit();
    });
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
    function selectRefresh() {
        $('.select').select2({
            //-^^^^^^^^--- update here
            tags: true,
            placeholder: "Select an Option",
            allowClear: true,
            width: '100%'
        });
        //alert('Done');
    }
    setTimeout(function(){

        selectRefresh();
    }, 2000);

    ///Add More



</script>
