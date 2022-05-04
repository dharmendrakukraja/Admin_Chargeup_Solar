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
                <form name="add-blog-post-form" enctype="multipart/form-data" id="employee-edit" method="POST" action="{{url('update-building',[$buildingDetail['_id']])}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Building Type <span class="text-danger">*</span></label>
                                <input class="form-control" value="@if(isset($buildingDetail['Type'])){{old('Type',$buildingDetail['Type'])}}@endif" type="text" name="Type" id="Type">
                                @if($errors->any())
                                    @if($errors->has('Type'))
                                        <p class="text-danger">{{ $errors->first('Type') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Description<span class="text-danger">*</span></label>

                                <textarea class="form-control" type="text" name="description" id="description">@if(isset($buildingDetail['description'])){{old('description',$buildingDetail['description'])}}@endif</textarea>
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
        // $('select[name="courseId"]').on('change',function()
        $(document).on("change",'input,  select', function(){
    //$('.courseId').on('click',function()
                  var id = $(this).attr('id');
                    //alert(id);
                       var categoryID = $(this).val();
                       //alert(categoryID);
                       if(categoryID)
                       {
                        $.ajax({
                             url : 'course_list/' +categoryID,
                             type : "GET",
                             dataType : "json",
                             success:function(data)
                             {
                                console.log(data);
                                $('#l_'+id).empty();
                                //$('select[name="levelId"]').empty();
                                $.each(data, function(key,value){
                                    $('#l_'+id)
         .append($("<option></option>")
                    .attr("value", value._id)
                    .text(value.Level));

                                //    $('select[name="levelId"]').append('<option value="'+ value._id +'">'+ value.Level +'</option>');
                                });
                             }
                          });
                       }
                       else
                       {
                          $('select[name="levelId"]').empty();
                       }
                    });
      // End Course Level Dropdown
     // Start Add More

     // End More
     $(document).on('click', '#removeRow', function () {
             // alert('Delete');
            //$(this).closest('#inputFormRow').remove();
            $(this).closest('#inputFormRow').html('');
        });
});
</script>
