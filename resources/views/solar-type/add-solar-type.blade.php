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
                            <h3 class="page-title">Add Solar Type</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Solar Type</a></li>
                                <li class="breadcrumb-item active">Add Solar Type</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="register-form" method="POST" action="{{url('solar-type-add')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Title <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{old('title')}}"  type="text" name="title" id="title">
                                @if($errors->any())
                                    @if($errors->has('title'))
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div id="add">
                            <label class="col-form-label">Description Item <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="item[]" id="item">
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
    document.getElementById("register-form").submit();
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
     // End More
     $(document).on('click', '#removeRow', function () {
             // alert('Delete');
            //$(this).closest('#inputFormRow').remove();
            $(this).closest('#inputFormRow').html('');
        });
});
</script>
