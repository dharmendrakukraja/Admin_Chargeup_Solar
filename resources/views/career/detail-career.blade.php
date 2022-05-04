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
                            <h3 class="page-title">Career Details</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Career</a></li>
                                <li class="breadcrumb-item active">Career Details</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="resource-form" method="POST" action="{{url('update-resource',[$careerDetail['_id']])}}">

                        @csrf
                        @method('PUT')


                        <div class="row">







                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Name <span class="text-danger">*</span></label>
                            <input value="{{ $careerDetail['fullName'] }}" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Contact Number <span class="text-danger">*</span></label>
                            <input value="{{ $careerDetail['mobileNumber'] }}" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                            <input value="{{ $careerDetail['email'] }}" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Field Work <span class="text-danger">*</span></label>
                            <input value="{{ $careerDetail['Fieldofwork'] }}" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Education <span class="text-danger">*</span></label>
                            <input value="{{ $careerDetail['LevelofEducation'] }}" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">availabilty <span class="text-danger">*</span></label>
                            <input value="{{ $careerDetail['availabilty'] }}" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Describes <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control">{{old('description',$careerDetail['bestdescribes'])}}</textarea>
                            {{-- <input value="{{ $careerDetail['bestdescribes'] }}" class="form-control" type="text"> --}}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Start Date <span class="text-danger">*</span></label>
                            <input value="{{ $careerDetail['potentialstartdate'] }}" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">incomegoal <span class="text-danger">*</span></label>
                            <input value="{{ $careerDetail['incomegoal'] }}" class="form-control" type="text">
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">tellusaboutyourself <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control">{{old('description',$careerDetail['tellusaboutyourself'])}}</textarea>

                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group" id="add-type">
                            <label style="float:left" class="col-form-label">PDF </label>
                            <br><br>
                            @if(isset($careerDetail['uploadResume']))
                              <iframe width="400px" height="400px" id="iframepdf" src="<?php echo config('app.server_url') ?>/{{$careerDetail['uploadResume'] }}"></iframe>
                            @endif

                            {{-- @if(isset($resourceDetail['type']) && $resourceDetail['type']=='Document')
                            <iframe width="500px" height="600px" class="doc" src="https://docs.google.com/gview?url=http://173.212.217.22:5050/{{$resourceDetail['resourceDocument'] }}&embedded=true"></iframe>
                            <input class="form-control" type="file" name="resourceDocument" id="resourceDocument">
                            @endif --}}


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
    document.getElementById("resource-form").submit();
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
                    $('select[name="type"]').on('change',function(){
                        var typeID = $(this).val();
                          //alert(typeID);
                          if(typeID=='Video'){
                            $('#add-type').html(' <label class="col-form-label">Resource Video</label><input class="form-control" type="file" name="resourceVideo" id="resourceVideo">');
                          }
                          if(typeID=='Pdf'){
                            $('#add-type').html(' <label class="col-form-label">Resource Pdf</label><input class="form-control" type="file" name="resourcePdf" id="resourcePdf">');
                          }
                          if(typeID=='Image'){
                            $('#add-type').html(' <label class="col-form-label">Resource Image</label><input class="form-control" type="file" name="resourceImage" id="resourceImage">');
                          }
                          if(typeID=='Document'){
                            $('#add-type').html(' <label class="col-form-label">Resource Document</label><input class="form-control" type="file" name="resourceDocument" id="resourceDocument">');
                          }


                    });
});
</script>
