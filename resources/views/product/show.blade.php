@extends('layouts.datatable')
@section('content')


<section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ URL::to('product') }}" class="btn btn-primary">Home</a></li>
                  
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
                  <h3 class="card-title">Show Product</h3>
                  
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
                            
                        </tr>
                    </thead>
                    <tbody>
                        

                        <tr>
                            <td>{{$input->id}}</td>
                            <td>{{$input->product_name}}</td>
                            <td>{{$input->product_price}}</td>
                            <td>{{$input->cat_name}}</td>
                            
                        </tr>
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
        @endsection