@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Form</h1>
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
        <div class="col-md-6">
          <div class="card card-primary">
           

            
            <div class="card-body">
              <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
              <div class="form-group">
                <label for="inputName">Product Name</label>
                <input type="text" id="inputName" class="form-control" name="product_name" value="">
              </div>
              <div class="form-group">
                <label for="inputprice">Product Price</label>
                <input type="text" id="inputprice" class="form-control" name="product_price" value="">
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
              <a href="#" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="Save" class="btn btn-success float-right">
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
       
    </section>
    <!-- /.content -->

  </div>

@endsection