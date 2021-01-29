@extends('website.backend.pages.main')
@section('content')

<a href="{{route('customer.create')}}" class="btn btn-primary btn-xs">Add Customer</a>

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
                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 46px;">S.N</th>
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 139px;">Full name</th>
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 130px;">Age</th>
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 90px;">Gender</th>
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 139px;">Email </th>
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 90px;">Phone</th>
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 110px;">Address </th>
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 139px;">Province No.</th>
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 110px;">Bank Name</th>
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 110px;">Account no.</th>

                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 110px;">Photo </th>
                
                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 152px;">Action</th>
                
          </thead>

          <tbody>

            @foreach ($customer as $cust)

            
            <tr role="row" class="even">
             
              <td class="sorting_1">{{$loop->iteration}}</td>
              <td>{{$cust->full_name}}</td>
              <td>{{$cust->age}}</td>
              <td>{{$cust->gender}}</td>
              <td>{{$cust->email}}</td>
              <td>{{$cust->phone}}</td>
              <td>{{$cust->address}}</td>
              <td>{{$cust->province}}</td>
              <td>{{$cust->bank_name}}</td>
              <td>{{$cust->account_no}}</td>
              <td><img src="{{URL::to($cust->photo)}}" height="70px;" width="80px;"></td>
             
              
          
          <td>
              <a class="btn btn-info btn-xs" href="{{route('customer.show',$cust->customer_id)}}">
                  <i class="fa fa-eye" ></i> 
              </a>
              
              
              <a class="btn btn-primary btn-xs" href="{{route('customer.edit',$cust->customer_id)}}">
                  <i class="fa fa-pencil-square-o" ></i> 
              </a>
              
                        
              <form action="{{route('customer.destroy',$cust->customer_id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> </button>
            </form>
  
                  
              
          </td>
        </tr>

            @endforeach

          </tbody>
      </table>

      {{-- {!! $customer->links()!!} --}}

      </div>
    </div>
</div>

@endsection