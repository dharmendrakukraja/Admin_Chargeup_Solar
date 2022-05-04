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
                            <h3 class="page-title">Assignment</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Assignment</a></li>
                                <li class="breadcrumb-item active">Add Assignment</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-assignment" method="POST" action="{{url('add-assignment')}}">
                    @csrf
                    <div class="row">


                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label class="control-label">Course Name</label>
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
                              <label class="control-label">Course Level</label>
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
                                <label class="col-form-label">File Type </label>
                                <select id="File_type" class="select" required name="type">
                                    <option value="">Select File Type</option>
                                    <option value="Video">Video</option>
                                    <option value="Image">Image</option>
                                    <option value="Pdf">PDF</option>
                                    <option value="Document">Document</option>
                                </select>
                                @if($errors->any())
                                    @if($errors->has('type'))
                                        <p class="text-danger">{{ $errors->first('type') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="file_label" id="file_label"  class="col-form-label">File</label>
                                <input class="form-control" value="" type="file" name="assignmentImage" id="assignmentImage">

                                <input class="form-control" value="" type="file" name="assignmentVideo" id="assignmentVideo">

                                <input class="form-control" value="" type="file" name="assignmentPdf" id="assignmentPdf">

                                <input class="form-control" value="" type="file" name="assignmentDocument" id="assignmentDocument">

                                <p id="file_error" class="text-danger"></p>
                                <p id="file_msg" class="text-success"></p>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Assignment Name <span class="text-danger">*</span></label>
                                <input name="assignmentName" value="{{old('assignmentName')}}" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('assignmentName'))
                                        <p class="text-danger">{{ $errors->first('assignmentName') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        {{-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Assignment Image</label>
                                <input class="form-control" value="{{old('Course_Image')}}" type="file" name="assignmentImage" id="Course_Image">
                                @if($errors->any())
                                    @if($errors->has('Course_Image'))
                                        <p class="text-danger">{{ $errors->first('Course_Image') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div> --}}

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Assignment Description<span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control">{{old('description')}}</textarea>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    $('label[for="file_label"]').hide();
        $('#assignmentImage').hide();
        $('#assignmentVideo').hide();
        $('#assignmentDocument').hide();
        $('#assignmentPdf').hide();
    //console.log( "ready!" );
    //alert('hello world');
    $('select[name="type"]').on('change',function(){
                       if($(this).val()!=''){
                         $('#file_label').show();
                       }else{
                        $('#file_label').hide();
                        $('#file_msg').html('');
                        $('#file_error').html('');
                            $('#assignmentImage').hide();
                            $('#assignmentPdf').hide();
                            $('#assignmentVideo').hide();
                            $('#assignmentDocument').hide();
                            $('#assignmentVideo').prop('disabled', false);
                            $('#assignmentImage').prop('disabled', true);
                            $('#assignmentPdf').prop('disabled', false);
                            $('#assignmentDocument').prop('disabled', false);
                       }
                       var categoryID = $(this).val();
                       //alert(categoryID);
                       if(categoryID=='Video'){
                            $('#assignmentImage').hide();
                            $('#assignmentPdf').hide();
                            $('#assignmentVideo').show();
                            $('#assignmentDocument').hide();
                            $('#assignmentVideo').prop('disabled', false);
                            $('#assignmentImage').prop('disabled', true);
                            $('#assignmentPdf').prop('disabled', true);
                            $('#assignmentDocument').prop('disabled', true);
                       }
                       if(categoryID=='Image'){
                            $('#assignmentImage').prop('disabled', false);
                            $('#assignmentVideo').prop('disabled', true);
                            $('#assignmentPdf').prop('disabled', true);
                            $('#assignmentDocument').prop('disabled', true);
                            $('#assignmentImage').show();
                            $('#assignmentVideo').hide();
                            $('#assignmentPdf').hide();
                            $('#assignmentDocument').hide();
                       }
                       if(categoryID=='Pdf'){
                            $('#assignmentPdf').prop('disabled', false);
                            $('#assignmentVideo').prop('disabled', true);
                            $('#assignmentImage').prop('disabled', true);
                            $('#assignmentDocument').prop('disabled', true);

                            $('#assignmentImage').hide();
                            $('#assignmentVideo').hide();
                            $('#assignmentDocument').hide();
                            $('#assignmentPdf').show();
                       }
                       if(categoryID=='Document'){
                        $('#assignmentDocument').prop('disabled', false);
                        $('#assignmentVideo').prop('disabled', true);
                        $('#assignmentPdf').prop('disabled', true);
                        $('#assignmentImage').prop('disabled', true);

                          $('#assignmentImage').hide();
                          $('#assignmentVideo').hide();
                          $('#assignmentDocument').show();
                          $('#assignmentPdf').hide();
                       }


                    });

       //

       $('#File_type').on("change", function(){
        var value = $("#File_type").find('option:selected').attr('value');
        if(value=='Document'){
                    $('#file_msg').html('Files with .docx Extensions are allowed !');
                    $('#file_error').html('');
                   var allowedExtensionsRegx = /(\.docx)$/i;
                }
        if(value=='Video'){
                    $('#file_msg').html('Files with .mp4 Extensions are allowed !');
                    $('#file_error').html('');
                   var allowedExtensionsRegx = /(\.mp4)$/i;
                }
        if(value=='Image'){
                    $('#file_msg').html('Files with .png, .jpg, .jpeg, .bmp, .gif  Extensions are allowed !');
                    $('#file_error').html('');
                   var  allowedExtensionsRegx = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
                }

        if(value=='Pdf'){
                    $('#file_msg').html('Files with .pdf  Extensions are allowed !');
                    $('#file_error').html('');
                   var  allowedExtensionsRegx =  /(\.pdf)$/i;
                }
        //alert(value);
           // File Validations
       $('#assignment'+value).on("change", function(){

                //alert(value);
                /* current this object refer to input element */
                var $input = $(this);

                /* collect list of files choosen */
                var files = $input[0].files;

                var filename = files[0].name;
                //alert(filename);
                /* getting file extenstion eg- .jpg,.png, etc */
                var extension = filename.substr(filename.lastIndexOf("."));

                /* define allowed file types */
                //var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                //alert(extension);
                if(value=='Document'){
                    var allowedExtensionsRegx = /(\.docx)$/i;
                    if(extension=='.docx'){
                        $('#file_error').html('');
                    }else{
                    $('#file_error').html('Only Docx files are allowed !');
                    $('#assignment'+value).val('');

                   //var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
                    }
                }

                if(value=='Pdf'){
                    if(extension=='.pdf'){
                        var allowedExtensionsRegx = /(\.pdf)$/i;
                        $('#file_error').html('');
                    }else{
                    $('#file_error').html('Only PDF files are allowed !');
                    $('#file_msg').html('');
                    $('#assignment'+value).val('');
                    }
                }

                if(value=='Image'){
                    if(extension=='.png' || extension=='.gif' ||extension=='.jpeg' || extension=='.jpg' || extension=='.bmp'){
                        var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
                        $('#file_error').html('');
                    }else{
                    $('#file_error').html('Only jpg, png, jpeg, gif and bmp files are allowed !');
                    $('#file_msg').html('');
                    $('#assignment'+value).val('');

                    }
                }

                if(value=='Video'){
                    var allowedExtensionsRegx = /(\.mp4)$/i;
                    if(extension=='.mp4'){
                        $('#file_error').html('');
                    }else{
                    $('#file_error').html('Only MP4 files are allowed !');
                    $('#file_msg').html('');
                    $('#assignment'+value).val('');
                    }
                }



                /* testing extension with regular expression */
                var isAllowed = allowedExtensionsRegx.test(extension);

                if(isAllowed){
                //alert("File type is valid for the upload");
                return true;
                /* file upload logic goes here... */
                }else{
                //alert("Invalid File Type.");
                if(value=='Document'){
                    $('#file_error').html('Invalid File Type. Only docx extensions are allowed !');
                    $('#file_msg').html('');
                }
                if(value=='Pdf'){
                    $('#file_error').html('Invalid File Type. Only pdf extensions are allowed !');
                    $('#file_msg').html('');
                }

                if(value=='Image'){
                    $('#file_error').html('Invalid File Type. Only png,jpg, jpeg, bmp and gif extensions are allowed !');
                    $('#file_msg').html('');
                }

                if(value=='Video'){
                    $('#file_error').html('Invalid File Type. Only MP4 extensions are allowed !');
                    $('#file_msg').html('');
                }

                $('#assignment'+value).val('');
                return false;
                }
                });
       });


      //
    $('.add-submit').click(function(){
    //Some code
    //alert($("#File_type").find('option:selected').attr('value'));
    var value = $("#File_type").find('option:selected').attr('value');
    //alert(value);
    //$('#assignment'+value).hide();
    if(value!=''){

        if ($('#assignment'+value).get(0).files.length === 0) {
        console.log("No files selected.");
        $('#file_error').html('Please select file !');
        $('#file_msg').html('');
        return false;
        }


    }
        // if ($('#file')[0].files.length === 0) {
    //                    down.innerHTML = "No files selected";
    //               }
    document.getElementById("add-assignment").submit();
    });
    //document.getElementById("my_form_id").submit();
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
