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
                            <h3 class="page-title">Edit Building</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Building</a></li>
                                <li class="breadcrumb-item active">Edit Building</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="employee-edit" method="POST" action="{{url('update-solar',[$solarDetail['_id']])}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Solar Type <span class="text-danger">*</span></label>
                                <input class="form-control" value="@if(isset($solarDetail['title'])){{old('title',$solarDetail['title'])}}@endif" type="text" name="title" id="title">
                                @if($errors->any())
                                    @if($errors->has('title'))
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div id="add">
                            <label class="control-label">Description</label>
                            <div  id="">
                                <div class="col-sm-6" style="float: left;">
                                    <div class="form-group">
                                    <ul>
                            @foreach($solarDetail['subDetails'] as $details)
<li id="inputFormRow">
    <div>
        {{ $details['description'] }}
     <input type="hidden" value="{{ $details['description'] }}" name="item[]" />
    <button id="removeRow" type="button" style="float:initial"  class="btn btn-danger" >X</button></div>
</li>





                           @endforeach
                        </ul>
                        </div>
                    </div>


                </div>
                        </div>




                    </div>
                    <button type="button"  class="btn btn-primary" id="add_more" style="float: right;margin-top:15px">Add More Details</button>


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
    function selectRefresh() {
        $('.select').select2({
            //-^^^^^^^^--- update here
            tags: true,
            placeholder: "Select an Option",
            allowClear: true,
            width: '100%'
        });
    }
    //alert('hello world');
    $('.add-submit').click(function(){
    //Some code
    document.getElementById("employee-edit").submit();
    });
    // Course Level Dropdown
             // Start Add More
       $('#add_more').click(function(){
        var html = '';

        //var count =1;
        // localStorage.setItem("count", "1");
        count = localStorage.getItem("count");
        html += '<div id="inputFormRow"><div class="col-sm-8"  style="float: left;">';
        html += '<div class="form-group"><label class="control-label">Desrciption Item</label>';
        html += '<input class="form-control" value="" type="text" name="item[]" id="item">';
        //html += '</div></div>';
        html += '<button id="removeRow" type="button" style="float:right"  class="btn btn-danger" >Remove</button></div></div></div>';

        console.log(html);
      $('#add').append(html);
      count=count+1;
      localStorage.setItem("count", count);
      selectRefresh();
                    });
      // End Course Level Dropdown
     // Start Add More

     // End More
     $(document).on('click', '#removeRow', function () {
             // alert('Delete');
            //$(this).closest('#inputFormRow').remove();
            //$(this).closest('#inputFormRow').html('');
            $(this).closest('#inputFormRow').remove();
        });
});
</script>
