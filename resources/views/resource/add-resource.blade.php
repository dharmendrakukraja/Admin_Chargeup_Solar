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


                                <div class="col-sm-12">
                                    <div class="form-group">
                                      <label class="control-label">Name</label><span class="text-danger">*</span>
                                      <input class="form-control" value="@if(isset($profileDetail['name'])){{old('name',$profileDetail['name'])}}@endif" type="text" name="name" id="name">
                                      @if($errors->any())
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                @endif
                                    </div>
                                </div>



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Resource Type <span class="text-danger">*</span></label>
                                <select id="File_type" class="select" required name="type">
                                    <option value="">Select Resource Type</option>
                                    <option value="Video">Video</option>
                                    <option value="Image">Image</option>
                                    <option value="Pdf">PDF</option>
                                    {{-- <option value="Document">Document</option> --}}
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
                                <label id="res" class="col-form-label">Resource</label>
                                <input class="form-control" value="" type="file" name="resourceImage" id="resourceImage">

                                <input class="form-control" value="" type="file" name="resourceVideo" id="resourceVideo">

                                <input class="form-control" value="" type="file" name="resourceDocument" id="resourceDocument">

                                <input class="form-control" value="" type="file" name="resourcePdf" id="resourcePdf">
                                <p id="file_error" class="text-danger"></p>
                                <p id="file_msg" class="text-success"></p>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control">@if(isset($assignmentDetail['description'])){{old('description',$assignmentDetail['description'])}}@endif</textarea>
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
    $('#res').hide();
    $('.add-submit').click(function(){
    //Some code
    //alert($("#File_type").find('option:selected').attr('value'));
    var value = $("#File_type").find('option:selected').attr('value');
    //alert(value);
    //$('#assignment'+value).hide();
    if(value!=''){

        if ($('#resource'+value).get(0).files.length === 0) {
        console.log("No files selected.");
        $('#file_error').html('Please select file !');
        $('#file_msg').html('');
        return false;
        }


    }
        // if ($('#file')[0].files.length === 0) {
    //                    down.innerHTML = "No files selected";
    //               }
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
        if($(this).val()!=''){
                         $('#file_label').show();
                       }else{
                        $('#file_label').hide();
                        $('#file_msg').html('');
                        $('#file_error').html('');
                            $('#resourceImage').hide();
                            $('#resourcePdf').hide();
                            $('#resourceVideo').hide();
                            $('#resourceDocument').hide();
                        $('#resourceVideo').prop('disabled', false);
                            $('#resourceImage').prop('disabled', true);
                            $('#resourcePdf').prop('disabled', false);
                            $('#resourceDocument').prop('disabled', false);
                       }
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

             //
             $('#File_type').on("change", function(){
                $('#res').show();
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
       $('#resource'+value).on("change", function(){

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
                    $('#resource'+value).val('');

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
                    $('#resource'+value).val('');
                    }
                }

                if(value=='Image'){
                    if(extension=='.png' || extension=='.gif' ||extension=='.jpeg' || extension=='.jpg' || extension=='.bmp'){
                        var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
                        $('#file_error').html('');
                    }else{
                    $('#file_error').html('Only jpg, png, jpeg, gif and bmp files are allowed !');
                    $('#file_msg').html('');
                    $('#resource'+value).val('');

                    }
                }

                if(value=='Video'){
                    var allowedExtensionsRegx = /(\.mp4)$/i;
                    if(extension=='.mp4'){
                        $('#file_error').html('');
                    }else{
                    $('#file_error').html('Only MP4 files are allowed !');
                    $('#file_msg').html('');
                    $('#resource'+value).val('');
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

                $('#resource'+value).val('');
                return false;
                }
                });
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
