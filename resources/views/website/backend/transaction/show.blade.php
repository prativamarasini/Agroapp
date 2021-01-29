@extends('website.backend.pages.main')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Show Transaction</h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>

                <div class="clearfix">
                    <div class="pull-right">
                        <a class="btn btn-info btn-xs" href="{{route('transaction.index')}}">Back</a>
                    </div>
                </div>
                
            </div>

           
            <div class="x_content">

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" > 
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <strong>Transaction Date:</strong>
                        {{$data->transaction_date}}
                    </div>
                </div>

                <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"> 
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <strong>Transaction Amount:</strong>
                    {{$data->amount_of_transaction}}
                </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" > 
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <strong>Bank Name</strong>
                        {{$data->bank_name}}
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>


@endsection