@extends('website.backend.pages.main')
@section('content')

<a href="{{route('transaction.create')}}" class="btn btn-primary btn-xs">Add Transaction</a>

@if ($message=Session::get('success'))
<div class="alert alert-success">
<p>{{$message}}</p>
</div>
@endif

<div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
    <div class="row">
        <div class="col-sm-6"><div class="dataTables_length" id="datatable_length">
        <label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
    </div></div>
    <div class="col-sm-6">
    <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label>
    </div>
    </div>
    </div>

    <div class="row">
    
<div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width:100%" role="grid" aria-describedby="datatable_info">
    <thead>
      <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 46px;">Transaction id</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 150px;">Transaction Date</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 150px;">Transaction Amount</th>
          
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 139px;">Bank Name</th>
           <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 152px;">Action</th>
          
    </thead>


    <tbody>

        @foreach($transaction as $trans)
    
        
        							


      <tr role="row" class="even">
        <td class="sorting_1">{{$trans->transaction_id}}</td>
        <td>{{$trans->transaction_date}}</td>
        <td>{{$trans->amount_of_transaction}}</td>
        <td>{{$trans->bank_name}}</td>
        
        

        <td>
            <a class="btn btn-info btn-xs" href="{{route('transaction.show',$trans->transaction_id)}}">
                <i class="fa fa-eye" ></i> 
            </a>
            ||
            
            <a class="btn btn-primary btn-xs" href="{{route('transaction.edit',$trans->transaction_id)}}">
                <i class="fa fa-pencil-square-o" ></i> 
            </a>
            
            || 

            <form action="{{route('transaction.destroy',$trans->transaction_id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> </button>
          </form>

            
        </td>
      </tr>
  
      @endforeach
    </tbody>
  </table>
  {!! $transaction->links()!!}

</div>
</div>
</div>
    
@endsection