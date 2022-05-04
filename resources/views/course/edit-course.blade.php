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
                            <h3 class="page-title">Edit Course</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Courses</a></li>
                                <li class="breadcrumb-item active">Edit Course</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="edit-course" method="POST" action="{{url('update-course',[$courseDetail['_id']])}}">

                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Course Name <span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{old('courseName',$courseDetail['courseName'])}}" type="text" name="courseName" id="courseName">
                                    @if($errors->any())
                                        @if($errors->has('courseName'))
                                            <p class="text-danger">{{ $errors->first('courseName') }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <textarea name="description" class="form-control">{{old('description',$courseDetail['description'])}}</textarea>


                                    @if($errors->any())
                                        @if($errors->has('description'))
                                            <p class="text-danger">{{ $errors->first('description') }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Image <span class="text-danger">*</span></label>
                                    @if($courseDetail['Course_Image']=='')
                                    {{-- <img src="http://173.212.217.22:5050/images/no-image.png" width="400px" height="400px" style="border-radius: 10%"> --}}
                                    <img src= "<?php $_SERVER['SERVER_NAME']?>/images/no-image.png" width="400px" height="400px" style="border-radius: 10%">
                                    @else
                                    <img src="http://173.212.217.22:5050/{{$courseDetail['Course_Image'] }}" width="400px" height="400px" style="border-radius: 10%">
                                    @endif

                                    <input class="form-control" value="" type="file" name="Course_Image" id="Course_Image">
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
    document.getElementById("edit-course").submit();
    });
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
});
</script>
