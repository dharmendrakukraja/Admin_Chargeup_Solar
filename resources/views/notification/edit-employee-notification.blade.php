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
                            <h3 class="page-title">Announcement Details</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Announcement</a></li>
                                <li class="breadcrumb-item active">Announcement Details</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="announcement-form" method="POST" action="{{url('update-announcement',[$announcementDetail['_id']])}}">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Subject</label>
                                  <input readonly name="subject" value="{{old('subject',$announcementDetail['subject'])}}" class="form-control" type="text">

                                    @if($errors->any())
                                        @if($errors->has('subject'))
                                            <p class="text-danger">{{ $errors->first('subject') }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>



                    <div class="col-sm-12">
                        <div class="form-group">
                            <label style="margin-top: -12px" class="col-form-label">Message <span class="text-danger">*</span></label>
                            <textarea readonly rows="6" name="message" class="form-control">{{old('message',$announcementDetail['message'])}}</textarea>
                            @if($errors->any())
                                @if($errors->has('message'))
                                    <p class="text-danger">{{ $errors->first('message') }}</p>
                                @endif
                            @endif
                        </div>
                    </div>



                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Resource Type<span class="text-danger">*</span></label>
                            <select class="select type" required name="type">
                                <option>Select Resource Type</option>
                    @if(isset($announcementDetail['type']))
                                <option
                                @if($announcementDetail['type']=="Video")
                                {{ 'selected' }}
                                @endif
                                value="Video">Video</option>
                                <option
                                @if($announcementDetail['type']=="Image")
                                {{ 'selected' }}
                                @endif
                                value="Image">Image</option>

                                <option
                                @if($announcementDetail['type']=="Pdf")
                                {{ 'selected' }}
                                @endif
                                value="Pdf">PDF</option>
                    @endif
                            </select>
                            @if($errors->any())
                                @if($errors->has('description'))
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">File</label>

                @if(isset($announcementDetail['type']))
                            @if($announcementDetail['type']=='Video')
                              <video width="960" height="720" controls src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4" type="sample/mp4"/>
                            Your browser does not support the video tag.
                              </video>
                              {{-- <input class="form-control" value="" type="file" name="announcementVideo" id="announcementVideo"> --}}
                            @endif

                            @if($announcementDetail['type']=='Image')
                              <img src="http://173.212.217.22:5050/{{$announcementDetail['announcementImage'] }}" width="400px" height="400px" style="border-radius: 10%">
                              {{-- <input class="form-control" value="" type="file" name="announcementImage" id="announcementImage"> --}}
                            @endif

                            @if($announcementDetail['type']=='Pdf')
                              <iframe width="400px" height="400px" id="iframepdf" src="http://173.212.217.22:5050/{{$announcementDetail['announcementPdf'] }}"></iframe>
                              {{-- <input class="form-control" value="" type="file" name="announcementPdf" id="announcementPdf"> --}}
                            @endif

                            @if($announcementDetail['type']=='Document')
                            <iframe width="500px" height="600px" class="doc" src="https://docs.google.com/gview?url=http://173.212.217.22:5050/{{$announcementDetail['announcementDocument'] }}&embedded=true"></iframe>

                            @endif
            @endif

                            {{-- <input class="form-control" value="" type="file" name="announcementImage" id="announcementImage">

                            <input class="form-control" value="" type="file" name="announcementVideo" id="announcementVideo">

                            <input class="form-control" value="" type="file" name="announcementPdf" id="announcementPdf"> --}}

                            @if($errors->any())

                                @if($errors->has('Course_Image'))
                                    <p class="text-danger">{{ $errors->first('Course_Image') }}</p>
                                @endif
                            @endif
                        </div>
                    </div>




                </div>

                        {{-- <div class="submit-section">
                            <button type="button" class="btn btn-primary submit-btn add-submit">Submit</button>
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
    $('.type').trigger('change');
    $('#announcementImage').hide();
        $('#announcementVideo').hide();
        $('#announcementDocument').hide();
        $('#announcementPdf').hide();
    categoryID = $(".type option:selected").val();
    //alert(categoryID);
    if(categoryID=='Video'){
                            $('#announcementImage').hide();
                            $('#announcementPdf').hide();
                            $('#announcementVideo').show();
                            $('#announcementVideo').prop('disabled', false);
                            $('#announcementImage').prop('disabled', true);
                            $('#announcementPdf').prop('disabled', true);
                       }
                       if(categoryID=='Image'){
                            $('#announcementImage').prop('disabled', false);
                            $('#announcementVideo').prop('disabled', true);
                            $('#announcementPdf').prop('disabled', true);
                            $('#announcementImage').show();
                            $('#announcementVideo').hide();
                            $('#announcementPdf').hide();
                       }
                       if(categoryID=='Pdf'){
                            $('#announcementPdf').prop('disabled', false);
                            $('#announcementVideo').prop('disabled', true);
                            $('#announcementImage').prop('disabled', true);
                            $('#announcementImage').hide();
                            $('#announcementVideo').hide();
                            $('#announcementPdf').show();
                       }


        $('select[name="type"]').on('change',function(){
                       var categoryID = $(this).val();
                       //alert(categoryID);
                       if(categoryID=='Video'){
                            $('#announcementImage').hide();
                            $('#announcementPdf').hide();
                            $('#announcementVideo').show();
                            $('#announcementVideo').prop('disabled', false);
                            $('#announcementImage').prop('disabled', true);
                            $('#announcementPdf').prop('disabled', true);
                       }
                       if(categoryID=='Image'){
                            $('#announcementImage').prop('disabled', false);
                            $('#announcementVideo').prop('disabled', true);
                            $('#announcementPdf').prop('disabled', true);
                            $('#announcementImage').show();
                            $('#announcementVideo').hide();
                            $('#announcementPdf').hide();
                       }
                       if(categoryID=='Pdf'){
                            $('#announcementPdf').prop('disabled', false);
                            $('#announcementVideo').prop('disabled', true);
                            $('#announcementImage').prop('disabled', true);
                            $('#announcementImage').hide();
                            $('#announcementVideo').hide();
                            $('#announcementPdf').show();
                       }


                    });
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
       // alert(val);
        //$('#levelId').val(val);
       // $('#levelId').val(val).change();
        $('select[name="levelId"]').val($('#level_id').val()).change();
    }, 1000);
    //$('#levelId').val($('#level_id').val()).change();
    $('select[name="levelId"]').val($('#level_id').val()).change();
    //$('select[name="courseId"]').trigger("change");
    //$('select[name="courseId"]').change();
    $('.add-submit').click(function(){
    //Some code
    document.getElementById("announcement-form").submit();
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
