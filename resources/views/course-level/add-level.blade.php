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
                @if (Session::has('success'))

                <div class="successMsg alert alert-success mt-2">{{ Session::get('success') }}
                </div>

                @endif
                @if (Session::has('error'))

                <div class="successMsg alert alert-danger mt-2">{{ Session::get('error') }}
                </div>

                @endif

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Add Course Level</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Course </a></li>
                                <li class="breadcrumb-item active">Add Course Level</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-level" method="POST" action="{{url('add-level')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Course Name</label>
                              <select required class="select" id="courseId" required name="courseId">
                                     <option value="" >Select Course</option>
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
                                <label class="col-form-label">Course Level <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{old('Level')}}" type="text" name="Level" id="Level">
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    setTimeout(function () {
                 $('.successMsg').hide();
             }, 5500);
    //console.log( "ready!" );
    //alert('hello world');
    $('.add-submit').click(function(){
    //Some code
    document.getElementById("add-level").submit();
    });
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
});
</script>
