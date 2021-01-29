@extends('website.backend.pages.main')
@section('content')
    
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Product category</h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-xs" href="{{route('category.index')}}">Back</a>
                    </div>
                </div>
            </div>

            <div class="x_content">
                <br>

                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('category.update',$category->categoryid)}}">
                    @csrf
                    @method('PUT')

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="categoryname">Category name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <select  name="name" value="{{$category->name}}" class="form-control" required="required">
                            <option selected >{{$category->name}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="textarea" >Details <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <textarea class="form-control" id="details" name="details" rows="3"> {{$category->details}} </textarea>
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