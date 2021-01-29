@extends('website.backend.pages.main')
@section('content')

<a href="{{route('product.create')}}" class="btn btn-primary btn-xs">Add product</a>

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
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 139px;">Category</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 130px;">Product Name</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 90px;">Product price</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 139px;">Product Image </th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 90px;">Available Quantity</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 110px;">Area of Production </th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 139px;">Details </th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 152px;">Action</th>
          
    </thead>


    <tbody>

        @foreach($products as $pro)
    
        <tr role="row" class="even">
        <td class="sorting_1">{{$loop->iteration}}</td>
        <td>{{$pro->category->name}}</td>
        <td>{{$pro->name}}</td>
        <td>{{$pro->price}}</td>
        <td><img src="{{URL::to($pro->image)}}" height="70px;" width="80px;"></td>
        <td>{{$pro->available_quantity}}</td>
        <td>{{$pro->area_of_production}}</td>

        <td>
          {{str_limit($pro->details,$limit=80)}}
        </td>

        <td>
            <a class="btn btn-info btn-xs" href="{{route('product.show',$pro->id)}}">
                <i class="fa fa-eye" ></i> 
            </a>
            
            
            <a class="btn btn-primary btn-xs" href="{{route('product.edit',$pro->id)}}">
                <i class="fa fa-pencil-square-o" ></i> 
            </a>
            
                      
            <form action="{{route('product.destroy',$pro->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> </button>
          </form>

                
            
        </td>
      </tr>
  
      @endforeach
    </tbody>
  </table>
  {{-- {!! $products->links()!!} --}}

</div>
</div>
</div>
    
@endsection