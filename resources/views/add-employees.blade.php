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
                            <h3 class="page-title">Add Employee</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Employee</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-employee-form" method="POST" action="{{url('store-employee')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{old('first_name')}}" type="text" name="first_name" id="first_name">
                                @if($errors->any())
                                    @if($errors->has('first_name'))
                                        <p class="text-danger">{{ $errors->first('first_name') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Last Name</label>
                                <input class="form-control" value="{{old('last_name')}}" type="text" name="last_name" id="last_name">
                                @if($errors->any())
                                    @if($errors->has('last_name'))
                                        <p class="text-danger">{{ $errors->first('last_name') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                <input name="email" value="{{old('email')}}" class="form-control" type="email">
                                @if($errors->any())
                                    @if($errors->has('email'))
                                        <p class="danger">{{ $errors->first('email') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                <input value="{{old('empId')}}" name="empId" id="empId" type="text" class="form-control">
                                @if($errors->any())
                                    @if($errors->has('empId'))
                                        <p class="text-danger">{{ $errors->first('empId') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input  class="form-control" name="password" id="password" type="password">
                                @if($errors->any())
                                    @if($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Confirm Password</label>
                                <input  class="form-control" type="password" name="confirm_password" id="confirm_password">
                                @if($errors->any())
                                    @if($errors->has('confirm_password'))
                                        <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                <div class="cal-icon"><input class="form-control datetimepicker" type="text" value="{{old('date_of_birth')}}" name="date_of_birth" id="date_of_birth"></div>
                                @if($errors->any())
                                    @if($errors->has('date_of_birth'))
                                        <p class="text-danger">{{ $errors->first('date_of_birth') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                <div class="cal-icon"><input class="form-control datetimepicker" value="{{old('date_of_join')}}" type="text" name="date_of_join" id="date_of_join"></div>
                                @if($errors->any())
                                    @if($errors->has('date_of_join'))
                                        <p class="text-danger">{{ $errors->first('date_of_join') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Father's Name </label>
                                <input value="{{old('father_name')}}" name="father_name" id="father_name" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('father_name'))
                                        <p class="text-danger">{{ $errors->first('father_name') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Mother's Name </label>
                                <input value="{{old('mother_name')}}" name="mother_name" id="mother_name" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('mother_name'))
                                        <p class="text-danger">{{ $errors->first('mother_name') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Technologies Known </label>
                                <input value="{{old('technologies')}}" name="technologies" id="technologies" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('technologies'))
                                        <p class="text-danger">{{ $errors->first('technologies') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Current Project</label>
                                <input value="{{old('current_project')}}" name="current_project" id="current_project" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('current_project'))
                                        <p class="text-danger">{{ $errors->first('current_project') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone </label>
                                <input value="{{old('phone')}}" name="phone" id="phone" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Emergency Contact No </label>
                                <input value="{{old('emergency_phone')}}" name="emergency_phone" id="emergency_phone" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('emergency_phone'))
                                        <p class="text-danger">{{ $errors->first('emergency_phone') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Relation with Contact</label>
                                <input value="{{old('relation')}}" name="relation" id="relation" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('relation'))
                                        <p class="text-danger">{{ $errors->first('relation') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">PAN</label>
                                <input value="{{old('pan')}}" name="pan" id="pan" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('pan'))
                                        <p class="text-danger">{{ $errors->first('pan') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Aadhar No</label>
                                <input value="{{old('aadhar_no')}}" name="aadhar_no" id="aadhar_no" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('aadhar_no'))
                                        <p class="text-danger">{{ $errors->first('aadhar_no') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Passport No</label>
                                <input value="{{old('passport_no')}}" name="passport_no" id="passport_no" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('passport_no'))
                                        <p class="text-danger">{{ $errors->first('passport_no') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Highest Education</label>
                                <input value="{{old('education')}}" name="education" id="education" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('education'))
                                        <p class="text-danger">{{ $errors->first('education') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Experience in Years</label>
                                <input value="{{old('experience')}}" name="experience" id="experience" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('experience'))
                                        <p class="text-danger">{{ $errors->first('experience') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Profile Image</label>
                                <input name="image" id="image" value="" class="form-control" type="file">
                                @if($errors->any())
                                    @if($errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('file') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Reporting To</label>
                                <input name="report_to" value="{{old('report_to')}}" id="report_to" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('report_to'))
                                        <p class="text-danger">{{ $errors->first('report_to') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department <span class="text-danger">*</span></label>
                                <select name="department" class="select">
                                    <option value="">Select Department</option>
                                    <option value="web_development">Web Development</option>
                                    <option value="it_management">IT Management</option>
                                    <option value="marketing">Marketing</option>
                                </select>
                            </div>
                            @if($errors->any())
                            @if($errors->has('department'))
                                <p class="text-danger">{{ $errors->first('department') }}</p>
                            @endif
                        @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Designation <span class="text-danger">*</span></label>
                                <select name="designation" class="select">
                                    <option value="">Select Designation</option>
                                    <option value="web_designer">Web Designer</option>
                                    <option value="web_developer">Web Developer</option>
                                    <option value="android_developer">Android Developer</option>
                                </select>
                            </div>
                            @if($errors->any())
                            @if($errors->has('designation'))
                                <p class="text-danger">{{ $errors->first('designation') }}</p>
                            @endif
                        @endif
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Blood Group</label>
                                <input name="blood_group" value="{{old('blood_group')}}" id="blood_group" class="form-control" type="text">
                                @if($errors->any())
                                    @if($errors->has('blood_group'))
                                        <p class="text-danger">{{ $errors->first('blood_group') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Address <span class="text-danger">*</span></label>
                                <textarea value="{{old('address')}}" name="address" id="address" rows="5" cols="5" class="form-control" placeholder="Enter message"></textarea>
                            </div>
                            @if($errors->any())
                                    @if($errors->has('address'))
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    @endif
                                @endif
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
    document.getElementById("add-employee-form").submit();
    });
    //document.getElementById("my_form_id").submit();
    //document.getElementsByTagName('form')[0].submit()
});
</script>
