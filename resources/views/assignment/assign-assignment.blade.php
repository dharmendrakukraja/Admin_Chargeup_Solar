@extends('layout.mainlayout')
@section('content')
<style>
    .text-danger {
        font-color:red !important;
    }
    </style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="row align-items-center">

                <!-- Page Content -->

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Assignment</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Assignment</a></li>
                                <li class="breadcrumb-item active">Assign Assignment</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="assign-form" method="POST" action="{{url('add-assign',[$assignmentDetail['_id']])}}">

                        @csrf
                        <input type="hidden" name="assignment_id" id="assignment_id" value="{{ $assignmentDetail['_id'] }}"/>
                        <input type="hidden" name="levelId" id="level_id" value="{{ $assignmentDetail['levelId'] }}"/>

                        <div class="row">


                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Course Name</label>
                                  <select disabled class="select course" id="course_name" required name="courseId">
                                         <option>Select Course</option>
                                       @foreach($courseList as $course)
                                         <option                                           @if ($assignmentDetail['courseId']==$course['_id'])
                                         {{ 'selected' }}
                                         @endif
                                         value="{{ $course['_id'] }}"> {{ $course['courseName'] }}</option>
                                       @endforeach
                                  </select>
                                  <input type="hidden" value="{{ $assignmentDetail['courseId'] }}" name="courseId" id="hdn_test" />

                            {{-- @if($errors->any())
                                @if($errors->has('firstName'))
                                    <p class="text-danger">{{ $errors->first('firstName') }}</p>
                                @endif
                            @endif --}}
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">Course Level</label>
                          <select disabled class="select" id="levelId" required name="levelId">

                          </select>

                    {{-- @if($errors->any())
                        @if($errors->has('firstName'))
                            <p class="text-danger">{{ $errors->first('firstName') }}</p>
                        @endif
                    @endif --}}
                </div>
            </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Assignment Name <span class="text-danger">*</span></label>
                            <input readonly  name="assignmentName" value="{{old('assignmentName',$assignmentDetail['assignmentName'])}}" class="form-control" type="text">
                            @if($errors->any())
                                @if($errors->has('assignmentName'))
                                    <p class="text-danger">{{ $errors->first('assignmentName') }}</p>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Assignee Student</label>
                            <select multiple placeholder="Select Student"  class="select student" id="student_name" required name="student[]">
                                {{-- <option >Select Student</option> --}}
                              @foreach($studentList as $student)
                                <option
                                value="{{ $student['_id'] }}">{{ $student['firstName']  }} {{ $student['lastName'] }}</option>
                              @endforeach
                         </select>


                            @if($errors->any())
                                @if($errors->has('Course_Image'))
                                    <p class="text-danger">{{ $errors->first('Course_Image') }}</p>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Submission Date <span class="text-danger">*</span></label>
                            <div class='input-group date'   id='datetimepicker'>
                            <input type='text' name="submission_date" class="form-control" />
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Assignment Description<span class="text-danger">*</span></label>
                            <textarea readonly name="description" class="form-control">{{old('description',$assignmentDetail['description'])}}</textarea>
                            @if($errors->any())
                                @if($errors->has('description'))
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    $("#MySelect").css("pointer-events","none");
    $("#MySelect").css("pointer-events","none");
    $('#datetimepicker').datetimepicker();
    //console.log( "ready!" );
    //alert('hello world');
    //$(".course").trigger("click");
    //alert('IN');
    $('.course').trigger('change');
    //alert($(".course option:selected").val());
    // Selecting the Level ID
    //var langs = {{json_encode($assignmentDetail['courseId'])}};
    //console.log(langs);
    //alert($('#level_id').val());
    categoryID = $(".course option:selected").val()
    $.ajax({
                             url : '../course_list/' +categoryID,
                             type : "GET",
                             dataType : "json",
                             success:function(data)
                             {
                                console.log(data);
                                $('select[name="levelId"]').empty();
                                $.each(data, function(key,value){
                                   $('select[name="levelId"]').append('<option value="'+ value._id +'">'+ value.Level +'</option>');
                                });
                             }
                          });
    var val = $('#level_id').val();

    //$('#levelId option[value="val"]').prop('selected', true);
    $('#levelId').val(val).change();
    $('#levelId').val(val);
    //alert(val);
    setTimeout(function(){
        var val = $('#level_id').val();
        //alert(val);
        //$('#levelId').val(val);
        //$('#levelId').val(val).change();
        $('select[name="levelId"]').val($('#level_id').val()).change();
    }, 1000);
    //$('#levelId').val($('#level_id').val()).change();
    $('select[name="levelId"]').val($('#level_id').val()).change();
    //$('select[name="courseId"]').trigger("change");
    //$('select[name="courseId"]').change();
    $('.add-submit').click(function(){
    //Some code
    document.getElementById("assign-form").submit();
    });
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
    $('select[name="courseId"]').on('change',function(){
                       var categoryID = $(this).val();
                       alert(categoryID);
                       if(categoryID)
                       {
                        $.ajax({
                             url : '../course_list/' +categoryID,
                             type : "GET",
                             dataType : "json",
                             success:function(data)
                             {
                                console.log(data);
                                $('select[name="levelId"]').empty();
                                $.each(data, function(key,value){
                                   $('select[name="levelId"]').append('<option value="'+ value._id +'">'+ value.Level +'</option>');
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function() {
       $('#datetimepicker').datetimepicker();
    });
</script>
