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
                            <h3 class="page-title">Admin Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Admin Profile</a></li>
                                <li class="breadcrumb-item active">Edit Profile</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="edit-profile" method="POST" action="{{url('update-profile',[$profileDetail['_id']])}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">First Name<span class="text-danger">*</span></label>
                                <input class="form-control" value="@if(isset($profileDetail['firstName'])){{old('firstName',$profileDetail['firstName'])}}@endif" type="text" name="firstName" id="firstName">
                                @if($errors->any())
                                    @if($errors->has('firstName'))
                                        <p class="text-danger">{{ $errors->first('firstName') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Last Name<span class="text-danger">*</span></label>
                                <input class="form-control" value="@if(isset($profileDetail['lastName'])){{old('lastName',$profileDetail['lastName'])}}@endif" type="text" name="lastName" id="lastName">
                                @if($errors->any())
                                    @if($errors->has('lastName'))
                                        <p class="text-danger">{{ $errors->first('lastName') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone No<span class="text-danger">*</span></label>
                                <input class="form-control" value="@if(isset($profileDetail['lastName'])){{old('phoneNumber',$profileDetail['phoneNumber'])}}@endif" type="text" name="phoneNumber" id="phoneNumber">
                                @if($errors->any())
                                    @if($errors->has('phoneNumber'))
                                        <p class="text-danger">{{ $errors->first('phoneNumber') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email<span class="text-danger">*</span></label>
                                <input disabled
                                 class="form-control" value="{{old('email',$profileDetail['email'])}}" type="text" name="email" id="email">
                                @if($errors->any())
                                    @if($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div><br><br>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Profile Image</label>
                                <img src="<?php echo config("app.server_url") ?>/{{$profileDetail['profileImage'] }}" width="100px" height="100px" style="border-radius: 50%"><br><br>
                                <input class="form-control" value="{{old('profileImage')}}" type="file" name="profileImage" id="profileImage">
                                @if($errors->any())
                                    @if($errors->has('profileImage'))
                                        <p class="text-danger">{{ $errors->first('profileImage') }}</p>
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
    document.getElementById("edit-profile").submit();
    });
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
});
</script>
