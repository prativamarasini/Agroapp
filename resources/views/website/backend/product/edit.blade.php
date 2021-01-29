@extends('website.backend.pages.main')
@section('content')
    
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Product</h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-xs" href="{{route('product.index')}}">Back</a>
                    </div>
                </div>
            </div>

            <div class="x_content">
                <br>

            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('product.update',$product->prod_id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of upload <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="date" name="date_of_upload" value="{{$product->date_of_upload}}" class="date-picker form-control" placeholder="dd-mm-yyyy"  required >
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="prod_name" value="{{$product->prod_name}}" required  class="form-control ">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Product price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="prod_price" value="{{$product->prod_price}}" required  class="form-control ">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Product Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="prod_photo"  required >
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Product Old Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <img src="{{URL::to($product->prod_photo)}}" height="70px;" width="80px;">
                        <input type="hidden" name="old_image" value="{{$product->prod_photo}}">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Available Quantity <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="available_quantity" value="{{$product->available_quantity}}" required  class="form-control ">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Area of Production <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="Area_of_production" value="{{$product->Area_of_production}}" required  class="form-control ">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" > Details<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" id="details" name="details"  rows="3">{{$product->details}}</textarea>
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