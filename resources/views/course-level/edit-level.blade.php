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
                            <h3 class="page-title">Edit Course Level</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Courses</a></li>
                                <li class="breadcrumb-item active">Edit Course Level</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="edit-course-level" method="POST" action="{{url('update-level',[$levelDetail['_id']])}}">
                    {{-- <input type="hidden" id="level_id" value="{{ $levelDetail['_id'] }}"/> --}}

                    @csrf
                    @method('PUT')
                        <div class="row">



                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Course Name</label>
                                  <select class="select course" id="course_name" required name="courseId">
                                         <option>Select Course</option>
                                       @foreach($courseList as $course)
                                         <option                                           @if ($levelDetail['courseId']==$course['_id'])
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
                          <input class="form-control" value="{{old('Level',$levelDetail['Level'])}}" type="text" name="Level" id="Level">
                                @if($errors->any())
                                    @if($errors->has('Level'))
                                        <p class="text-danger">{{ $errors->first('Level') }}</p>
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
    $('.add-submit').click(function(){
    //Some code
    document.getElementById("edit-course-level").submit();
    });
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
});
</script>
