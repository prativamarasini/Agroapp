@extends('website.backend.pages.main')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Create Farmer</h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-xs" href="{{route('farmer.index')}}">Back</a>
                    </div>
                </div>
            </div>

            <div class="x_content">
                <br>

                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('farmer.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="full_name" class="form-control" placeholder="Enter full name"  required >
                        </div>
                        @error('full_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Gender*</label>
                        <div class="col-md-6 col-sm-6 ">
                            
                            <input type="radio"  id="gender" name="gender" value="male"> Male &nbsp;
                    
                            <input type="radio" id="gender" name="gender" value="female"> Female &nbsp;
                   
                            <input type="radio"  id="gender" name="gender" value="other"> Other
                
                        </div>
                    </div>


                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Age<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="age" required  class="form-control ">
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="email" name="email" class="form-control"  required>
                        </div>
                    </div>

                   
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Phone<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="number" name="phone" class="form-control"  required>
                        </div>
                    </div>

                    {{-- <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="password" name="password" class="form-control"  required>
                        </div>
                    </div> --}}

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Address<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="address" class="form-control"  required>
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Province<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <select id="province" name="province" class="form-control" required="required">
                                <option value="select">Select your Province no.</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Photo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="photo" required >
                        </div>
                    </div>

                   
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Citizenship No. <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="citizenship_no" class="form-control"  required>
                        </div>
                    </div>

                                                        
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
