@extends('website.backend.pages.main')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Show Customer </h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>

                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-xs" href="{{route('customer.index')}}">Back</a>
                    </div>
                </div>
                
            </div>

           
            <div class="x_content">


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <strong>Full Name:</strong>
                        {{$data->full_name}}
                    </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <strong>Age:</strong>
                            {{$data->age}}
                        </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <strong>Gender:</strong>
                                {{$data->gender}}
                            </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <strong>Email:</strong>
                                    {{$data->email}}
                                </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <strong>Phone:</strong>
                                        {{$data->phone}}
                                    </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <strong>Address:</strong>
                                            {{$data->address}}
                                        </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <strong>Province:</strong>
                                                {{$data->province}}
                                            </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <strong>Bank Name:</strong>
                                                    {{$data->bank_name}}
                                                </div>
                                                </div>

                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <strong>Account No:</strong>
                                                        {{$data->account_no}}
                                                    </div>
                                                    </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <strong>Photo:</strong>
                                <img src="{{URL::to($data->photo)}}" height="120px;" width="150px;" >
                                </div>
                                </div>               
                
            </div>
        </div>
    </div>
</div>


@endsection