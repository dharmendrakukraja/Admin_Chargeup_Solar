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
                            <h3 class="page-title">Resource</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Resource</a></li>
                                <li class="breadcrumb-item active">Add Resource</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-resource" method="POST" action="{{url('add-resource')}}">
                    @csrf
                    <div class="row">


                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label class="control-label">Course Name</label><span class="text-danger">*</span>
                                      <select class="select" id="course_name" required name="courseId">
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


                        <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Course Level</label><span class="text-danger">*</span>
                              <select class="select" required name="levelId">
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

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Resource Name <span class="text-danger">*</span></label>
                                <input name="resourceName" value="{{old('resourceName')}}" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('resourceName'))
                                        <p class="text-danger">{{ $errors->first('resourceName') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Resource Type </label>
                                <select id="File_type" class="select" required name="type">
                                    <option value="">Select Resource Type</option>
                                    <option value="Video">Video</option>
                                    <option value="Image">Image</option>
                                    <option value="Pdf">PDF</option>
                                    <option value="Document">Document</option>
                                </select>
                                <p id="file_error" class="text-danger"></p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label"></label>
                                <input class="form-control" value="" type="file" name="resourceImage" id="resourceImage">

                                <input class="form-control" value="" type="file" name="resourceVideo" id="resourceVideo">

                                <input class="form-control" value="" type="file" name="resourceDocument" id="resourceDocument">

                                <input class="form-control" value="" type="file" name="resourcePdf" id="resourcePdf">
                                @if($errors->any())
                                    @if($errors->has('Course_Image'))
                                        <p class="text-danger">{{ $errors->first('Course_Image') }}</p>
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
    //alert('hello world');
    $('.add-submit').click(function(){
    //Some code
    var value = $("#File_type").find('option:selected').attr('value');
     //alert(value);
    $('#resource'+value).hide();
    if(value!=''){

        if ($('#resource'+value).get(0).files.length === 0) {
        console.log("No files selected.");
        $('#file_error').html('Please select file !');
        return false;
        }

    }
    document.getElementById("add-resource").submit();
    });
    //document.getElementById("my_form_id").submit();
    $('#resourceImage').prop('disabled', true);
    $('#resourceVideo').prop('disabled', true);
    $('#resourceDocument').prop('disabled', true);
    $('#resourcePdf').prop('disabled', true);

        $('#resourceImage').hide();
        $('#resourceVideo').hide();
        $('#resourceDocument').hide();
        $('#resourcePdf').hide();
    $('select[name="type"]').on('change',function(){
                       var categoryID = $(this).val();
                       //alert(categoryID);
                       if(categoryID=='Video'){
                          $('#resourceImage').hide();
                          $('#resourceVideo').show();
                          $('#resourceVideo').prop('disabled', false);
                          $('#resourceDocument').hide();
                          $('#resourcePdf').hide();
                          $('#resourceImage').prop('disabled', true);
                          $('#resourcePdf').prop('disabled', true);
                          $('#resourceDocument').prop('disabled', true);
                       }
                       if(categoryID=='Image'){
                        $('#resourceImage').prop('disabled', false);
                        $('#resourceVideo').prop('disabled', true);
                        $('#resourceDocument').prop('disabled', true);
                        $('#resourcePdf').prop('disabled', true);
                          $('#resourceImage').show();
                          $('#resourceVideo').hide();
                          $('#resourceDocument').hide();
                          $('#resourcePdf').hide();
                       }
                       if(categoryID=='Pdf'){
                        $('#resourcePdf').prop('disabled', false);
                        $('#resourceVideo').prop('disabled', true);
                        $('#resourceDocument').prop('disabled', true);
                        $('#resourceImage').prop('disabled', true);
                        $('#resourceImage').hide();
                          $('#resourceVideo').hide();
                          $('#resourceDocument').hide();
                          $('#resourcePdf').show();
                       }
                       if(categoryID=='Document'){
                        $('#resourceDocument').prop('disabled', false);
                        $('#resourceVideo').prop('disabled', true);
                        $('#resourcePdf').prop('disabled', true);
                        $('#resourceImage').prop('disabled', true);
                          $('#resourceImage').hide();
                          $('#resourceVideo').hide();
                        $('#resourceDocument').show();
                          $('#resourcePdf').hide();
                       }

                    });


    $('select[name="courseId"]').on('change',function(){
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
