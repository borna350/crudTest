@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::to('category') }}" class="btn btn-primary">Home</a></li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
   
            
            <div class="card-body">
              <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
              <div class="form-group">
                <label for="inputName">Category Name</label>
                <input type="text" id="inputName" class="form-control" name="cat_name" value="">
                
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
    </div>

@endsection