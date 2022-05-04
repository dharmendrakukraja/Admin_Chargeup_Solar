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
                            <h3 class="page-title">Update User Order</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">User Order</a></li>
                                <li class="breadcrumb-item active">Update User Order</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="update-order-form" enctype="multipart/form-data" id="update-order-form" method="POST" action="{{url('user-order-edit',[$orderDetails['_id']])}}">
<input type="hidden" name="userId" value="{{ $orderDetails['bookedBy']['_id'] }}" />
                        @csrf
                        @method('PUT')
                        <div class="row">



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">User Name </label>

                                    <input readonly name="phoneNumber" value="@if(isset($orderDetails['bookedBy']['fullName'])){{$orderDetails['bookedBy']['fullName']}}@endif" class="form-control" type="text">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">User Email </label>

                                    <input readonly name="phoneNumber" value="@if(isset($orderDetails['bookedBy']['email'])){{$orderDetails['bookedBy']['email']}}@endif" class="form-control" type="text">

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
                                    <label class="col-form-label">Order Status</label>
                                    {{-- <input value="@if(isset($orderDetails['orderStatus'])){{ $orderDetails['orderStatus'] }}@endif"  class="form-control" type="text" name="city" readonly id="city"> --}}
                                    <select id="File_type" class="select" required name="orderStatus">
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
                                    </select>
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
            placeholder: "Select an Option",
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
