@extends('website.backend.pages.main')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Show Order</h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>

                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-xs" href="{{route('ordertable.index')}}">Back</a>
                    </div>
                </div>
                
            </div>

           
            <div class="x_content">

                
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <strong>Quantity:</strong>
                        {{$data->quantity}}
                    </div>
                    </div>
    
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" > 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <strong>Price:</strong>
                            {{$data->price}}
                        </div>
                    </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" > 
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <strong>Order Date:</strong>
                        {{$data->date_of_order}}
                    </div>
                </div>


                
            </div>
        </div>
    </div>
</div>


@endsection