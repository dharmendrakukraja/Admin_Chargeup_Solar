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
                            <div class="row" style="float: right;">

                                <img  width="40px" height="40px" src="http://173.212.217.22:5050/{{$studentDetail['profileImage'] }}" style="border-radius:60%;width:auto;margin-left:auto" alt="">



                                {{-- <div style="margin-right:-50px">{{ $studentDetail['firstName'] }} </div> --}}
                            </div>
                            <h3 class="page-title">Assignment</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Assignment</a></li>
                                <li class="breadcrumb-item active">Assignment Details</li>
                            </ul>

                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="assign-form" method="POST" action="">

                        @csrf
                        {{-- <input type="hidden" name="assignment_id" id="assignment_id" value="{{ $assignmentDetail['_id'] }}"/>
                        <input type="hidden" name="levelId" id="level_id" value="{{ $assignmentDetail['levelId'] }}"/> --}}
                        <h3>Student Details</h3>
                        <div class="row" style="border:1px solid black;">
                            <div><b>Name :
                        @if(isset($studentDetail['firstName']))
                            {{ $studentDetail['firstName'] }}
                        @endif
                        @if(isset($studentDetail['lastName']))
                          {{ $studentDetail['lastName'] }}
                        @endif
                            </b></div>
                            <div><b>Email :
                    @if(isset($studentDetail['email']))
                          {{ $studentDetail['email'] }}
                    @endif
                            </b></div>
                            <div><b>Address :
                @if(isset($studentDetail['address']))
                                {{ $studentDetail['address'] }}
                @endif
                            </b></div>
                            <div><b>Contact Number :
            @if(isset($studentDetail['phoneNumber']))
                                {{ $studentDetail['phoneNumber'] }}
            @endif
                            </b></div>
                            <div><b>Date of Registration :
                                {{ date('d-m-Y', strtotime($studentDetail['registrationDate'])) }}
                            </b></div>

                        </div>
                         @if (count($assignmentDetail) > 0)
                         <h3>Admin Details of Assignment</h3>
                         @foreach ($assignmentDetail as $details)

                <div class="row" style="border:1px solid black;">
                    <h4>Details of Admin Assignment ==> "{{ $details['assignmentName'] }}"</h4>
                           <div class="col-sm-6">
                               <div class="form-group">
                                 <label class="control-label">Assignment Date</label>
                                 <input class="form-control" type="text" value="{{ date('d-m-Y', strtotime($details['assigned_date'])) }}" name="courseId" id="hdn_test" />
                              </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                 <label class="control-label">Assignment Name</label>
                                 <input class="form-control" type="text" value="{{ $details['assignmentName'] }}" name="courseId" id="hdn_test" />
                              </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                 <label class="control-label">Course Name</label>
                                 @if(isset($details['courseId']['courseName']))
                                 <input class="form-control" type="text" value="{{ $details['courseId']['courseName'] }}" name="courseId" id="hdn_test" />
                                 @endif
                              </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                 <label class="control-label">Course Level</label>
                                 @if(isset($details['levelId']['Level']))
                                 <input class="form-control" type="text" value="{{ $details['levelId']['Level'] }}" name="courseId" id="hdn_test" />
                                 @endif
                                 {{-- <input class="form-control" type="text" value="" name="courseId" id="hdn_test" /> --}}
                              </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                 <label class="control-label">Assignment Description</label>
                                 <textarea name="description" class="form-control">{{old('description',$details['description'])}}</textarea>
                              </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                 <label class="control-label">Submission Date</label>
                                 <input class="form-control" type="text" value="{{date('d-m-Y', strtotime($details['submission_date']))  }}" name="courseId" id="hdn_test" />
                              </div>
                           </div>

                   </div>
                   <br>
                      @endforeach
                    @else
                    <h3>Sorry , No assignment Found !</h3>
                    @endif


                        {{-- <h3>User response of Assignment</h3>
                        <div class="row" style="border:1px solid black;">

                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Assignment Date</label>
                                  <input class="form-control" type="text" value="{{ $assignmentDetail['courseId'] }}" name="courseId" id="hdn_test" />
                               </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Assignment Name</label>
                                  <input class="form-control" type="text" value="{{ $assignmentDetail['courseId'] }}" name="courseId" id="hdn_test" />
                               </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Course Name</label>
                                  <input class="form-control" type="text" value="{{ $assignmentDetail['courseId'] }}" name="courseId" id="hdn_test" />
                               </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Course Level</label>
                                  <input class="form-control" type="text" value="{{ $assignmentDetail['courseId'] }}" name="courseId" id="hdn_test" />
                               </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Assignment Description</label>
                                  <input class="form-control" type="text" value="{{ $assignmentDetail['courseId'] }}" name="courseId" id="hdn_test" />
                               </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Submission Date</label>
                                  <input class="form-control" type="text" value="{{ $assignmentDetail['courseId'] }}" name="courseId" id="hdn_test" />
                               </div>
                            </div>

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
