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
                            <h3 class="page-title">Edit Resource</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Resource</a></li>
                                <li class="breadcrumb-item active">Edit Resource</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="resource-form" method="POST" action="{{url('update-resource',[$resourceDetail['_id']])}}">

                        @csrf
                        @method('PUT')
                        <input type="hidden" id="level_id" value="{{ $resourceDetail['levelId'] }}"/>

                        <div class="row">


                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Course Name</label>
                                  <select class="select course" id="course_name" required name="courseId">
                                         <option>Select Course</option>
                                       @foreach($courseList as $course)
                                         <option                                           @if ($resourceDetail['courseId']==$course['_id'])
                                         {{ 'selected' }}
                                         @endif
                                         value="{{ $course['_id'] }}"> {{ $course['courseName'] }}</option>
                                       @endforeach
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
                          <label class="control-label">Course Level</label>
                          <select class="select" id="levelId" required name="levelId">

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
                            <label class="col-form-label">Resource Name <span class="text-danger">*</span></label>
                            <input name="resourceName" value="{{old('resourceName',$resourceDetail['resourceName'])}}" class="form-control" type="text">
                            @if($errors->any())
                                @if($errors->has('resourceName'))
                                    <p class="text-danger">{{ $errors->first('resourceName') }}</p>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group" id="add-type">
                            <label class="col-form-label">Resource </label>


                            @if(isset($resourceDetail['type']) && $resourceDetail['type']=='Video')
                              <video width="960" height="720" controls src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4" type="sample/mp4"/>
                            Your browser does not support the video tag.
                              </video>
                              <input class="form-control" type="file" name="resourceVideo" id="resourceVideo">
                            @endif

                            @if(isset($resourceDetail['type']) && $resourceDetail['type']=='Image')
                              <img src="http://173.212.217.22:5050/{{$resourceDetail['resourceImage'] }}" width="400px" height="400px" style="border-radius: 10%">
                              <input class="form-control" type="file" name="resourceImage" id="resourceImage">
                            @endif

                            @if(isset($resourceDetail['type']) && $resourceDetail['type']=='Pdf')
                              <iframe width="400px" height="400px" id="iframepdf" src="http://173.212.217.22:5050/{{$resourceDetail['resourcePdf'] }}"></iframe>
                              <input class="form-control" type="file" name="resourcePdf" id="resourcePdf">
                            @endif

                            @if(isset($resourceDetail['type']) && $resourceDetail['type']=='Document')
                            <iframe width="500px" height="600px" class="doc" src="https://docs.google.com/gview?url=http://173.212.217.22:5050/{{$resourceDetail['resourceDocument'] }}&embedded=true"></iframe>
                            <input class="form-control" type="file" name="resourceDocument" id="resourceDocument">
                            @endif



                            @if($errors->any())

                                @if($errors->has('Course_Image'))
                                    <p class="text-danger">{{ $errors->first('Course_Image') }}</p>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Resource Type<span class="text-danger">*</span></label>
                            <select  class="select" required name="type">
                                <option>Select Resource Type</option>
                                <option
                                @if(isset($resourceDetail['type']) && $resourceDetail['type']=="Video")
                                {{ 'selected' }}
                                @else
                                {{ 'disabled' }}
                                @endif
                                value="Video">Video</option>
                                <option
                                @if(isset($resourceDetail['type']) && $resourceDetail['type']=="Image")
                                {{ 'selected' }}
                                @else
                                {{ 'disabled' }}
                                @endif
                                value="Image">Image</option>
                                <option
                                @if(isset($resourceDetail['type']) && $resourceDetail['type']=="Document")
                                {{ 'selected' }}
                                @else
                                {{ 'disabled' }}
                                @endif
                                value="Document">Document</option>
                                <option
                                @if(isset($resourceDetail['type']) && $resourceDetail['type']=="Pdf")
                                {{ 'selected' }}
                                @else
                                {{ 'disabled' }}
                                @endif

                                value="Pdf">PDF</option>
                            </select>
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
    //console.log( "ready!" );
    //alert('hello world');
    //$(".course").trigger("click");
    //alert('IN');
    $('.course').trigger('change');
    //alert($(".course option:selected").val());
    // Selecting the Level ID
    //var langs = {{json_encode($resourceDetail['courseId'])}};
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
