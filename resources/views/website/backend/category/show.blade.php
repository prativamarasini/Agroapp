@extends('website.backend.pages.main')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Show Product category</h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>

                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-xs" href="{{route('category.index')}}">Back</a>
                    </div>
                </div>
                
            </div>

           
            <div class="x_content">


                <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="categorytype"> 
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <strong>Category Type:</strong>
                    {{$data->category_type}}
                </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="categorydetails"> 
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <strong>Category Details:</strong>
                        {{$data->details}}
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>


@endsection