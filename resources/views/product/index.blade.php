@extends('layouts.datatable')
@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>DataTables</h1>
              </div>
              <form class="form-inline" action="{{ route('product.index') }}" method="get">
                  
                  <div class="form-group">
                     
                      <input type="text" name="search" class="form-control" placeholder="search by name">
                     
  
                     
                  </div>
                  <div class="form-group">
                      <label for="inputStatus">Category</label>
                      
                      <select class="form-control custom-select" name="cat_id">
                        <option selected disabled>Select Category</option>
                         @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        
                        @endforeach
                      </select>
                    </div>
                  <div class="form-group">
                      <label>Price Range</label>
                      <input type="text" name="min" class="form-control" placeholder="minimum price">
                      <input type="text" name="max" class="form-control" placeholder="maximum price">
                      
                  </div>
  
  
  
                   <input type="submit" class="btn btn-primary" value="Search">
              </form>
              
              <div class="col-sm-6">
                  
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('product.create') }}" class="btn btn-primary">Create</a></li>
                  
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Product List</h3>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($input as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->product_name}}</td>
                            <td>{{$data->product_price}}</td>
                           
                            <td>{{$data->cat_name}}</td>
                            
                            <td>
                                <a href="{{ route('product.show',$data->id) }}" title='Show Record' data-toggle='tooltip' ><span class='glyphicon glyphicon-pencil'></span> View</a>
                                <a href="{{ route('product.edit',$data->id) }}" title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
                                <form action="{{ route('product.destroy',$data->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach()

                        
                    </tbody>
                  </table>

                  {{ $input->links() }}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
    
              
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      

@endsection