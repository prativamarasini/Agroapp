@extends('website.backend.pages.main')
@section('content')
    <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
        <div class="row">
            <div class="col-lg-12">
              
                <h1 class="page-header">Categories List</h1>
              
              
                <button type="submit" class="btn btn-outline btn-success btn-xs pull-right" data-toggle="modal" data-target="#createCategoryModal"><i class="fa fa-plus-circle" aria-hidden="true">Create Category</i>
                </button>
                <hr>
              
            </div>
            <!-- /.col-lg-12 -->
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                <div class="dataTables_length" id="datatable_length">
                    <label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> entries</label>
                </div>
            </div>
            <div class="col-md-6">
                <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search"
                            class="form-control input-sm" placeholder="" aria-controls="datatable"></label>
                </div>
                
            </div>
        </div>


        <div class="row">

            <div class="col-sm-12">
                <table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width:100%"
                    role="grid" aria-describedby="datatable_info">

                    <thead>
                        <tr role="row" style="font-size:1.2em;">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                style="width: 46px;">S.N</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Position: activate to sort column ascending" style="width: 139px;">Category type
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Office: activate to sort column ascending" style="width: 150px;">Category
                                details</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Age: activate to sort column ascending" style="width: 152px;">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($productcategory as $procat)

                            <tr role="row" class="even">
                                <td class="sorting_1">{{ $procat->id }}</td>
                                <td>{{ $procat->name }}</td>
                                <td>
                                    {{ str_limit($procat->details, $limit = 50) }}
                                </td>

                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('category.show', $procat->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    ||

                                    <a class="btn btn-primary btn-xs" href="{{ route('category.edit', $procat->id) }}">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>

                                    ||

                                    <form action="{{ route('category.destroy', $procat->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-xs"
                                            onclick="return confirm('Are you sure you want to delete?')"><i
                                                class="fa fa-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
    </div>
    <!-- /.col-lg-12 -->
    </div>

<!-- Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data"  data-parsley-validate="" id="demo-form2" class="form-horizontal form-label-left" novalidate="" >

        <div class="modal-body">
            @csrf
            
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category Name<span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="textarea">Details <span
                        class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
    </div>
  </div>
</div>
  </div>
@endsection
