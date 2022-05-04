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
                            <h3 class="page-title">Edit Live Video</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Live Video</a></li>
                                <li class="breadcrumb-item active">Edit Live Video</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="edit-video-form" method="POST" action="{{url('update-video',[$videoDetail['_id']])}}">

                        @csrf
                        @method('PUT')
                        <input type="hidden" id="level_id" value="{{ $levelId }}"/>

                        <div class="row">


                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Course Name</label>
                                  <select class="select course" id="course_name" required name="courseId">
                                         <option>Select Course</option>
                                       @foreach($courseList as $course)
                                         <option                                           @if (isset($videoDetail['courseId']['_id']) && $videoDetail['courseId']['_id']==$course['_id'])
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
                            <label class="col-form-label">Video Name <span class="text-danger">*</span></label>
                            <input name="videoName" value="{{old('videoName',$videoDetail['videoName'])}}" class="form-control" type="text">
                            @if($errors->any())
                                @if($errors->has('videoName'))
                                    <p class="text-danger">{{ $errors->first('videoName') }}</p>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Live Code</label>

                            <input class="form-control" value="{{old('videoUrl',$videoDetail['videoUrl'])}}" type="text" name="videoUrl" id="videoUrl">
                            @if($errors->any())
                                @if($errors->has('videoUrl'))
                                    <p class="text-danger">{{ $errors->first('videoUrl') }}</p>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Video Description<span class="text-danger">*</span></label>
                            <textarea name="videoDescription" class="form-control">{{old('videoDescription',$videoDetail['videoDescription'])}}</textarea>
                            @if($errors->any())
                                @if($errors->has('videoDescription'))
                                    <p class="text-danger">{{ $errors->first('videoDescription') }}</p>
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
    document.getElementById("edit-video-form").submit();
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
