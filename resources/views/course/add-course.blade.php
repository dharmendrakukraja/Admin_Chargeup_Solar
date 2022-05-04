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
                            <h3 class="page-title">Add Course</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Courses</a></li>
                                <li class="breadcrumb-item active">Add Course</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-course" method="POST" action="{{url('add-course')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Course Name<span class="text-danger">*</span></label>
                                <input class="form-control" value="{{old('courseName')}}" type="text" name="courseName" id="courseName">
                                @if($errors->any())
                                    @if($errors->has('courseName'))
                                        <p class="text-danger">{{ $errors->first('courseName') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">IMAGE</label>
                                <input class="form-control" value="{{old('Course_Image')}}" type="file" name="Course_Image" id="Course_Image">
                                @if($errors->any())
                                    @if($errors->has('Course_Image'))
                                        <p class="text-danger">{{ $errors->first('Course_Image') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Description<span class="text-danger">*</span></label>
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
    //console.log( "ready!" );
    //alert('hello world');
    $('.add-submit').click(function(){
    //Some code
    document.getElementById("add-course").submit();
    });
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
});
</script>
