@extends('website.backend.pages.main')
@section('content')
    
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Create Payment</h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-xs" href="{{route('payment.index')}}">Back</a>
                    </div>
                </div>
            </div>

            <div class="x_content">
                <br>

                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('payment.store')}}">
                    @csrf
                    

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Payment type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="type" name="type" class="form-control" required>
                            <option value="select">Select your Payment type</option>
                            <option >E-sewa</option>
                            <option>Khalti</option>
                            <option>Cash on Delivery</option>
                            </select>
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