@extends('layouts.app')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
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
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            
            <div class="card-body">
                <form action="{{route('product.update', $input->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group">
                        <label for="inputName">Product Name</label>
                        <input type="text" id="inputName" class="form-control" name="product_name" value="{{$input->product_name}}">
                      </div>
                      <div class="form-group">
                        <label for="inputprice">Product Price</label>
                        <input type="text" id="inputprice" class="form-control" name="product_price" value="{{$input->product_price}}">
                      </div>
                      <div class="form-group">
                        <label for="inputStatus">Category</label>
                        
                        <select class="form-control custom-select" name="cat_id">
                          
                           @foreach($category as $category)
                           <?php
                           $selected = ($input['cat_id']==$category['id'])?'selected':'';
                          echo '<option value="'.$category->id.'" '.$selected.'>'.$category->cat_name.'</option>';
                          ?>
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