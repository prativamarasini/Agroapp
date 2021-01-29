@extends('website.backend.pages.main')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Show Product </h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>

                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-xs" href="{{route('product.index')}}">Back</a>
                    </div>
                </div>
                
            </div>

           
            <div class="x_content">


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <strong>Date Of upload:</strong>
                        {{$data->date_of_upload}}
                    </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <strong>Product Name:</strong>
                            {{$data->prod_name}}
                        </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <strong>Product Price:</strong>
                                {{$data->prod_price}}
                            </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <strong>Product Image:</strong>
                                <img src="{{URL::to($data->prod_photo)}}" height="120px;" width="150px;" >
                                </div>
                                </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <strong>Available Quantity:</strong>
                                    {{$data->available_quantity}}
                                </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <strong>Area of Production:</strong>
                                        {{$data->Area_of_production}}
                                    </div>
                                    </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" > 
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <strong>Product Details:</strong>
                        {{$data->details}}
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>


@endsection