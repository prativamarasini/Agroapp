@extends('website.backend.pages.main')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Order</h2>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                    <div class="clearfix">
                        <div class="pull-right">
                            <a class="btn btn-info btn-xs" href="{{ route('ordertable.index') }}">Back</a>
                        </div>
                    </div>
                </div>

                <div class="x_content">
                    <br>

                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""
                        method="POST" action="{{ route('ordertable.store') }}">
                        @csrf

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Product<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="product_id" name="product_id" class="form-control" required="required">
                                    <option value="" selected>Select</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"> Available Quantity<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="available_quantity" id="available_quantity" required
                                    class="form-control" readonly>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Quantity<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="quantity" id="quantity" required class="form-control ">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Price<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="price" id="price" required class="form-control" readonly>
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Amount<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="amount" id="amount" required class="form-control" readonly>
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

@push('custom-scripts')
    <script>
        $(function() {
            $('#product_id').change(function() {
                let productId = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: `{{ url('dashboard/product/getProductInfo/${productId}') }}`
                }).then(function(responseData) {
                    $('#price').val(responseData.price);
                });
            });
        });

        $(function() {
            $('#product_id').change(function() {
                let productId = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: `{{ url('dashboard/product/getAvailableInfo/${productId}') }}`
                }).then(function(responseData) {
                    $('#available_quantity').val(responseData.available_quantity);

                });
            });
        });

        $(function() {
            $('#quantity').keyup(function() {
                let quantity = $(this).val();
                let Price = $('#price').val();
                if (quantity === "1") {
                    $(this).val('');
                    $('#price').val('');
                    $('#price').focus();
                } else {
                    let amount = parseFloat(price) * parseFloat(quantity);
                    let actualAmount = amount.toFixed(2);
                    $('#amount').val(actualAmount);
                }
            });
        });

        // $('#profit_margin').keyup(function(){
        //     let profitMargin = $(this).val();
        //     let purchasePrice = $('#purchase_price').val();
        //     if(purchasePrice === "") {
        //         $(this).val('');
        //         $('#sales_price').val('');
        //         $('#price').focus();
        //     } else {
        //         let salesPrice = parseFloat(purchasePrice) +  parseFloat(profitMargin);
        //         let actualSalesPrice = salesPrice.toFixed(2);
        //         $('#sales_price').val(actualSalesPrice);
        //     }
        // });

        /*/
            function amount(){
          var amount = 0;
          $('#quantity').find('input.amount').each(function(){
            if(!isNaN($(this).val()))
            {
                amount = parseFloat(quantity)* price;
            //   amount += parseFloat($(this).val());
            }
          });
          $('#amount').text(amount.toFixed(2));
          $('#amount').val(amount.toFixed(2));
            amount();
        }

             
            //  $(function() {
            //     $('#product_id').change(function() {
            //         let productId = $(this).val();
            //         $.ajax({
            //             method: 'GET',
            //             url: `{{ url('dashboard/ordertable/getProductTotal/${productId}') }}`
            //         }).then(function(responseData) {
            //             $('#amount').val(responseData.amount);
                         
            //         });
            //     });
            // });

                

    </script>
@endpush
