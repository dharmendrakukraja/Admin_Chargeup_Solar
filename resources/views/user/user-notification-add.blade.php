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
                            <h3 class="page-title">Announcement</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">User Announcement</a></li>
                                <li class="breadcrumb-item active">Add Announcement</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-announcement" method="POST" action="{{url('add-announcement')}}">
                    @csrf
                    <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                      <label class="control-label">Subject</label>
                                      <input name="subject" value="{{old('subject')}}" class="form-control" type="text">

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
                                <textarea rows="6" name="message" class="form-control">{{old('message')}}</textarea>
                                @if($errors->any())
                                    @if($errors->has('message'))
                                        <p class="text-danger">{{ $errors->first('message') }}</p>
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

    $('.add-submit').click(function(){
        document.getElementById("add-announcement").submit();
    });


});
</script>
