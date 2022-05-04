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
                            <h3 class="page-title">Assign Employee Order</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Employee Order</a></li>
                                <li class="breadcrumb-item active">Assign Employee Order</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="update-order-form" enctype="multipart/form-data" id="update-order-form" method="POST" action="{{url('employee-order-assign',[$orderDetails['_id']])}}">
<input type="hidden" name="orderId" value="{{ $orderDetails['_id'] }}" />
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Employee  Name </label>

                                    <input readonly class="form-control" value="@if(isset($orderDetails['addedBy']['fullName'])){{ $orderDetails['addedBy']['fullName'] }}@endif" type="text" >

                                </div>
                            </div>


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
                                    <label class="col-form-label">Tracking Number</label>
                                    <input value="@if(isset($orderDetails['trackingNumber'])){{ $orderDetails['trackingNumber'] }}@endif"  class="form-control" type="text" name="trackingNumber" readonly id="city">
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
                                    <label class="col-form-label">Assigned Employee</label>
                                    <select multiple placeholder="Select employee"  class="select student" id="employee_name" required name="employee[]">
                                         <option value="" >Select Employee</option>
                                      @foreach($employeeList as $employee)
                                        <option
                                        @if (in_array($employee['_id'], $all))
                                        {{ 'selected' }}
                                        @endif
                                        value="{{ $employee['_id'] }}">{{ $employee['fullName']  }}</option>
                                      @endforeach
                                 </select>


                                    {{-- <select id="File_type" class="select" required name="orderStatus">
                                        <option value="">Select Status</option>
                                        <option  @if(isset($orderDetails['orderStatus']) && $orderDetails['orderStatus']=="track")
                                        {{ 'selected' }}
                                        @endif
                                        value="track">Track</option>
                                        <option @if(isset($orderDetails['orderStatus']) && $orderDetails['orderStatus']=="order_placed")
                                        {{ 'selected' }}
                                        @endif value="order_placed">Order Placed</option>
                                        <option @if(isset($orderDetails['orderStatus']) && $orderDetails['orderStatus']=="shipped")
                                        {{ 'selected' }}
                                        @endif value="shipped">Shipped</option>
                                        <option @if(isset($orderDetails['orderStatus']) && $orderDetails['orderStatus']=="out_for_delivery")
                                        {{ 'selected' }}
                                        @endif value="out_for_delivery">Out for Delivery</option>
                                        <option @if(isset($orderDetails['orderStatus']) && $orderDetails['orderStatus']=="delivered")
                                        {{ 'selected' }}
                                        @endif value="delivered">Delivered</option>
                                        <option @if(isset($orderDetails['orderStatus']) && $orderDetails['orderStatus']=="installation_start")
                                        {{ 'selected' }}
                                        @endif value="installation_start">Installation Start</option>
                                        <option @if(isset($orderDetails['orderStatus']) && $orderDetails['orderStatus']=="installation_completed")
                                        {{ 'selected' }}
                                        @endif value="installation_completed">Installation Completed</option>
                                    </select> --}}


                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Image</label>
                                    <img src="@if(isset($orderDetails['Image'])){{ $orderDetails['Image'] }}@endif"  class="form-control" />
                                </div>
                            </div> --}}


                        <div class="submit-section">
                            <button type="button" class="btn btn-primary submit-btn add-submit">Submit</button>
                        </div>

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
    document.getElementById("update-order-form").submit();
    });
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
    function selectRefresh() {
        $('.select').select2({
            //-^^^^^^^^--- update here
            tags: true,
            placeholder: "Select Assigned Employee",
            allowClear: true,
            width: '100%'
        });
        //alert('Done');
    }
    setTimeout(function(){

        selectRefresh();
    }, 2000);

    $('.add-submit').click(function(){
       document.getElementById("update-order-form").submit();
    });
});
    ///Add More



</script>
