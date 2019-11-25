@extends('layouts.datatable')
@section('content')


        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>DataTables</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('category.create') }}" class="btn btn-primary">Create</a></li>
                  
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
                  <h3 class="card-title">Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                           
                            <th>Category Name</th>
                            <th>Product Name</th>
                            <th>Product ID</th>
                            <th>Product Link</th>
                            <th>Total Product in each cat</th>
                            <th>Action</th>
                            
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($input as $data)
                    <tr>
                             <td>{{$data->cat_name}}</td>
                             <td>{{$data->productNames}}</td>
                             <td>{{$data->productIds}}</td>
                             <td>
                               @php
                                $arrayId = explode(', ',$data->productIds);
                                $arrayName = explode(', ',$data->productNames);
                              @endphp
                              
                              @foreach ($arrayName as $key => $val)
                                <a href="{{ route('product.show', trim($arrayId[$key])) }}">{{ $val }}</a>
                              @endforeach
                             </td>
                             <td>{{$data->totalProducts}}</td>
                             <td>
                              <a href="{{ route('category.show',$data->id) }}" title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span>View</a>
                                <a href="{{ route('category.edit',$data->id) }}" title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
                                
                                  </td>
                    </tr>
                    @endforeach()
            
                    </tbody>
                   
                  </table>
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