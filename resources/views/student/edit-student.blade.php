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
                            <h3 class="page-title">Edit Student</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Student</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-employee-form" method="POST" action="{{url('update-student',[$studentDetail['_id']])}}">

                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">FIRST NAME <span class="text-danger">*</span></label>
                                    @if(isset($studentDetail['firstName']))
                                    {{-- {{$studentDetail['firstName']}} --}}
                                    @else
                                    {{$studentDetail['firstName']=''}}
                                    @endif
                                    <input class="form-control" value="{{old('firstName',$studentDetail['firstName'])}}" type="text" name="firstName" id="firstName">
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
                                    @if(isset($studentDetail['lastName']))
                                    {{-- {{$studentDetail['lastName']}} --}}
                                    @else
                                    {{$studentDetail['lastName']=''}}
                                    @endif
                                    <input class="form-control" value="{{old('lastName',$studentDetail['lastName'])}}" type="text" name="lastName" id="lastName">
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
                                    @if(isset($studentDetail['phoneNumber']))
                                    {{-- {{$studentDetail['phoneNumber']}} --}}
                                    @else
                                    {{$studentDetail['phoneNumber']=''}}
                                    @endif
                                    <input name="phoneNumber" value="{{old('phoneNumber',$studentDetail['phoneNumber'])}}" class="form-control" type="text">
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
                                    <input value="{{old('email',$studentDetail['email'])}}" name="email" readonly id="email" type="text" class="form-control">
                                    @if($errors->any())
                                        @if($errors->has('email'))
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input value="{{old('password',$studentDetail['password'])}}" class="form-control" name="password" id="password" type="text">
                                    @if($errors->any())
                                        @if($errors->has('password'))
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">ADDRESS</label>
                                    @if(isset($studentDetail['address']))
                                    {{-- {{$studentDetail['address']}} --}}
                                    @else
                                    {{$studentDetail['address']=''}}
                                    @endif
                                    <textarea class="form-control" name="address" id="address">{{old('address',$studentDetail['address'])}}</textarea>
                                    {{-- <input  value="{{old('address',$studentDetail['address'])}}" class="form-control" type="text" name="address" id="address"> --}}
                                    @if($errors->any())
                                        @if($errors->has('address'))
                                            <p class="text-danger">{{ $errors->first('address') }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">CITY</label>

                                    <input value="{{old('city',$studentDetail['city'])}}"  class="form-control" type="text" name="city" id="city">
                                    @if($errors->any())
                                        @if($errors->has('city'))
                                            <p class="text-danger">{{ $errors->first('city') }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>

                          <div id="add">
                    @foreach($studentDetail['Courses'] as $courses)
                           <div  id="inputFormRow">
                            <div class="col-sm-6" style="float: left;">
                                <div class="form-group">
                                    @if(isset($courses['courseId']['courseName']))
                                  <label class="control-label">Course Name</label>
                                  {{-- <select class="select courseId" id="course_name" required name="courseId[]">
                                         <option value="">Select Course</option>
                                       @foreach($courseList as $course)
                                         <option

                                         @if(isset($courses['courseId']['_id']) && $courses['courseId']['_id']== $course['_id'])
                                            {{ 'selected' }}
                                          @else
                                            {{ 'disabled' }}
                                          @endif

                                          value="{{ $course['_id'] }}"> {{ $course['courseName'] }}</option>
                                       @endforeach
                                  </select> --}}

                                  <input style="width:300px" name="" type="text" readonly value="{{ $courses['courseId']['courseName'] }}" />
                                  @endif
                                  @if(isset($courses['courseId']['_id']))
                                  <input name="courseId[]" type="hidden" readonly value="{{ $courses['courseId']['_id'] }}" />
                                  @endif
                            @if($errors->any())
                                @if($errors->has('courseId'))
                                    <p class="text-danger">{{ $errors->first('courseId') }}</p>
                                @endif
                            @endif
                                </div>
                            </div>

                            <div class="col-sm-6" style="float: right;" >
                                <div class="form-group">
                                    @if(isset($courses['levelId']['Level']))
                                  <label class="control-label">Course Level</label>

                                  <input name="" type="text" readonly value="{{ $courses['levelId']['Level'] }}" />
                                  @endif
                                  @if(isset($courses['levelId']['Level']))
                                  <input name="levelId[]" type="hidden" readonly value="{{ $courses['levelId']['_id'] }}" />
                                  <button id="removeRow" type="button" style="float:right"  class="btn btn-danger" >Remove</button>
                                  @endif

                            @if($errors->any())
                                @if($errors->has('levelId'))
                                    <p class="text-danger">{{ $errors->first('levelId') }}</p>
                                @endif
                            @endif
                                 </div>
                            </div>
                        </div>
                   @endforeach
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

   //
   $(document).on("change",'input,  select', function(){
    //$('.courseId').on('click',function()
                  var id = $(this).attr('id');
                    //alert(id);
                       var categoryID = $(this).val();
                       //alert(categoryID);
                       if(categoryID)
                       {
                        $.ajax({
                             url : '../course_list/' +categoryID,
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


});
</script>
