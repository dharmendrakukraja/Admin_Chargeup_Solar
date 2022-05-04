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
                            <h3 class="page-title">Add Employee</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Employee</a></li>
                                <li class="breadcrumb-item active">Add Employee</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-employee" method="POST" action="{{url('employee-add')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Full Name <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{old('fullname')}}" type="text" name="fullname" id="fullname">
                                @if($errors->any())
                                    @if($errors->has('fullname'))
                                        <p class="text-danger">{{ $errors->first('fullname') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Mobile Number</label>
                                <input class="form-control" value="{{old('mobileNumber')}}" type="text" name="mobileNumber" id="mobileNumber">
                                @if($errors->any())
                                    @if($errors->has('mobileNumber'))
                                        <p class="text-danger">{{ $errors->first('mobileNumber') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                <input value="{{old('email')}}" name="email" id="email" type="text" class="form-control">
                                @if($errors->any())
                                    @if($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Password<span class="text-danger">*</span></label>
                                <input  class="form-control" name="password" id="password" value="{{old('password')}}" type="password">
                                @if($errors->any())
                                    @if($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Address<span class="text-danger">*</span></label>
                                {{-- <input  class="form-control" type="text" name="address" id="address"> --}}
                                <textarea class="form-control" type="text" name="address" id="address">{{old('address')}}</textarea>
                                @if($errors->any())
                                    @if($errors->has('address'))
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">State<span class="text-danger">*</span></label>
                                <input value="{{old('state')}}"  class="form-control" type="text" name="state" id="state">
                                @if($errors->any())
                                    @if($errors->has('state'))
                                        <p class="text-danger">{{ $errors->first('state') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">City<span class="text-danger">*</span></label>
                                <input value="{{old('city')}}"  class="form-control" type="text" name="city" id="city">
                                @if($errors->any())
                                    @if($errors->has('city'))
                                        <p class="text-danger">{{ $errors->first('city') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Zip Code<span class="text-danger">*</span></label>
                                <input value="{{old('zipcode')}}" class="form-control" type="text" name="zipcode" id="zipcode">
                                @if($errors->any())
                                    @if($errors->has('zipcode'))
                                        <p class="text-danger">{{ $errors->first('zipcode') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>







                    </div>


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

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    //console.log( "ready!" );
    function selectRefresh() {
        $('.select').select2({
            //-^^^^^^^^--- update here
            tags: true,
            placeholder: "Select an Option",
            allowClear: true,
            width: '100%'
        });
    }
    //alert('hello world');
    $('.add-submit').click(function(){
    //Some code
    document.getElementById("add-employee").submit();
    });
    // Course Level Dropdown
        // $('select[name="courseId"]').on('change',function()
        $(document).on("change",'input,  select', function(){
    //$('.courseId').on('click',function()
                  var id = $(this).attr('id');
                    //alert(id);
                       var categoryID = $(this).val();
                       //alert(categoryID);
                       if(categoryID)
                       {
                        $.ajax({
                             url : 'course_list/' +categoryID,
                             type : "GET",
                             dataType : "json",
                             success:function(data)
                             {
                                console.log(data);
                                $('#l_'+id).empty();
                                //$('select[name="levelId"]').empty();
                                $.each(data, function(key,value){
                                    $('#l_'+id)
         .append($("<option></option>")
                    .attr("value", value._id)
                    .text(value.Level));

                                //    $('select[name="levelId"]').append('<option value="'+ value._id +'">'+ value.Level +'</option>');
                                });
                             }
                          });
                       }
                       else
                       {
                          $('select[name="levelId"]').empty();
                       }
                    });
      // End Course Level Dropdown
     // Start Add More

     // End More
     $(document).on('click', '#removeRow', function () {
             // alert('Delete');
            //$(this).closest('#inputFormRow').remove();
            $(this).closest('#inputFormRow').html('');
        });
});
</script>
