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
                            <h3 class="page-title">Student Register</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Student</a></li>
                                <li class="breadcrumb-item active">Student Register</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="register-form" method="POST" action="{{url('student-register')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">FIRST NAME <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{old('firstName')}}" type="text" name="firstName" id="firstName">
                                @if($errors->any())
                                    @if($errors->has('firstName'))
                                        <p class="text-danger">{{ $errors->first('firstName') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">LAST NAME</label>
                                <input class="form-control" value="{{old('lastName')}}" type="text" name="lastName" id="lastName">
                                @if($errors->any())
                                    @if($errors->has('lastName'))
                                        <p class="text-danger">{{ $errors->first('lastName') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">PHONE NUMBER <span class="text-danger">*</span></label>
                                <input name="phoneNumber" value="{{old('phoneNumber')}}" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('phoneNumber'))
                                        <p class="text-danger">{{ $errors->first('phoneNumber') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">EMAIL <span class="text-danger">*</span></label>
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
                                <input  class="form-control" name="password" id="password" type="password">
                                @if($errors->any())
                                    @if($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">ADDRESS<span class="text-danger">*</span></label>
                                {{-- <input  class="form-control" type="text" name="address" id="address"> --}}
                                <textarea class="form-control" type="text" name="address" id="address"></textarea>
                                @if($errors->any())
                                    @if($errors->has('address'))
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">CITY<span class="text-danger">*</span></label>
                                <input  class="form-control" type="text" name="city" id="city">
                                @if($errors->any())
                                    @if($errors->has('city'))
                                        <p class="text-danger">{{ $errors->first('city') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div id="add">
                        <div class="col-sm-6" style="float: left;">
                            <div class="form-group">
                              <label class="control-label">Course Name</label>
                              <select class="select courseId" id="course_name" required name="courseId[]">
                                     <option value="">Select Course</option>
                                   @foreach($courseList as $course)
                                     <option value="{{ $course['_id'] }}"> {{ $course['courseName'] }}</option>
                                   @endforeach
                              </select>

                        @if($errors->any())
                            @if($errors->has('courseId'))
                                <p class="text-danger">{{ $errors->first('courseId') }}</p>
                            @endif
                        @endif
                            </div>
                        </div>

                        <div class="col-sm-6" style="float: right;" >
                            <div class="form-group">
                              <label class="control-label">Course Level</label>
                              <select class="select" id="l_course_name" required name="levelId[]">
                                     <option value="">Select Level</option>
                                   {{-- @foreach($courseList as $course)
                                     <option value="{{ $course['_id'] }}"> {{ $course['courseName'] }}</option>
                                   @endforeach --}}
                              </select>

                        @if($errors->any())
                            @if($errors->has('levelId'))
                                <p class="text-danger">{{ $errors->first('levelId') }}</p>
                            @endif
                        @endif
                             </div>
                        </div>
                    </div>


                    </div>

                    <button class="btn btn-primary" id="add_more" style="float: right;margin-top:15px">Add More Course</button>

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
    document.getElementById("register-form").submit();
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
       $('#add_more').click(function(){
        var html = '';

        //var count =1;
        // localStorage.setItem("count", "1");
        count = localStorage.getItem("count");
        html += '<div id="inputFormRow"><div class="col-sm-6"  style="float: left;">';
        html += '<div class="form-group"><label class="control-label">Course Name</label>';
        html += '<select  class="select courseId" id="'+count+'" required name="courseId[]"><option value="">Select Course</option>';

        html += '@foreach($courseList as $course)';
        html += '<option value="{{ $course['_id'] }}"> {{ $course['courseName'] }}</option>';
        html += ' @endforeach ';
        html += '</select>';
        html += '</div></div>';
        html += '<div class="col-sm-6"  style="float: right;">';
                html += '<div class="form-group">';
                html += '<label class="control-label">Course Level</label><br><select id="l_'+count+'" class="select" required name="levelId[]"><option value="">Select Level</option>';

                html += '</select><button id="removeRow" type="button" style="float:right"  class="btn btn-danger" >Remove</button></div></div></div>';

        console.log(html);
      $('#add').append(html);
      count=count+1;
      localStorage.setItem("count", count);
      selectRefresh();
                    });
     // End More
     $(document).on('click', '#removeRow', function () {
             // alert('Delete');
            //$(this).closest('#inputFormRow').remove();
            $(this).closest('#inputFormRow').html('');
        });
});
</script>
