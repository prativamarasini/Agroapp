@extends('website.backend.pages.main')
@section('content')

<a href="{{route('farmer.create')}}" class="btn btn-primary btn-xs">Add Farmer</a>

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
          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >S.N</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Full name</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Gender</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Age</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Email</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Phone</th>

          {{-- <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Password</th> --}}
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Address</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Province</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Photo</th>
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Citizenship No.</th>
          
          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Action</th>
          
    </thead>


    <tbody>

        @foreach($farmer as $farm)
    
        <tr role="row" class="even">
        <td class="sorting_1">{{$loop->iteration}}</td>
        <td>{{$farm->full_name}}</td>
        <td>{{$farm->gender}}</td>
        <td>{{$farm->age}}</td>
        <td>{{$farm->email}}</td>
        <td>{{$farm->phone}}</td>
        {{-- <td>{{$farm->password}}</td> --}}
        <td>{{$farm->address}}</td>
        <td>{{$farm->province}}</td>
        <td><img src="{{URL::to($farm->photo)}}" height="70px;" width="80px;"></td>
        <td>{{$farm->citizenship_no}}</td>
        


      
        <td>
            <a class="btn btn-info btn-xs" href="{{route('farmer.show',$farm->farmer_id)}}">
                <i class="fa fa-eye" ></i> 
            </a>
            
            
            <a class="btn btn-primary btn-xs" href="{{route('farmer.edit',$farm->farmer_id)}}">
                <i class="fa fa-pencil-square-o" ></i> 
            </a>
            
                      
            <form action="{{route('farmer.destroy',$farm->farmer_id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> </button>
          </form>

                
            
        </td>
      </tr>
  
      @endforeach
    </tbody>
  </table>
  
  {!! $farmer->links()!!}
</div>
</div>
</div>
    
@endsection