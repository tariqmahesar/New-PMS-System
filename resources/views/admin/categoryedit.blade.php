@extends('layouts.default')

@section('title')
Admin | Edit Category
@endsection

@section('content')

<?php 
$page = Request::segment(2);
$pg = ucfirst($page);
?>
<div class="card card-primary card-outline">
          <div class="card-header">
           
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              {{$pg}} Add Details to {{$pg}} Page
            </h3>
            <!-- <a href="{{url('admin/add-content')}}">
             <div style="text-align: right;"><button class="btn btn-primary">Add Content</button></div>
            </a> -->

          </div>

          <div class="card-body">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

          @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
          @endif

          @if($message = Session::get('error'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
          @endif


            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">{{$pg}} Page </a>
              </li>
             
            </ul>

           <br>

            <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$pg}} Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post" action="{{route('category.update',['id' => $category->id])}}" >
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="FirstName">Category Name</label>
                    <input type="text" required  name="category_name" value="{{$category->category_name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
                  </div>

                                    <!-- Default checkbox -->

<div class="form-group">
<select class="form-select form-group" name="section_count" required aria-label="Default select example">
<option selected>Select Section</option>
<option value="1">One</option>
<option value="2">Two</option>
<option value="3">Three</option>
<option value="4">Four</option>
<option value="5">Five</option>
<option value="6">Six</option>
</select>

<!-- <select class="form-control" name="category_package_type" id="exampleFormControlSelect1" style="width: 25%;">
<option>Select Package Type</option>
<option <?php //if($category->category_package_type=='Type 1'){ ?> selected <?php //} ?> value="Type 1">Type 1</option>
<option <?php //if($category->category_package_type=='Type 2'){ ?> selected <?php //} ?> value="Type 2">Type 2</option>
<option <?php //if($category->category_package_type=='Type 3'){ ?> selected <?php //} ?> value="Type 3">Type 3</option>
<option <?php //if($category->category_package_type=='Type 4'){ ?> selected <?php //} ?> value="Type 4">Type 4</option>
<option <?php //if($category->category_package_type=='Type 5'){ ?> selected <?php //} ?> value="Type 5">Type 5</option>
</select> -->
</div>


<!-- <div class="form-check">
  <input class="form-check-input" name="section[]" type="checkbox" value="Sect 1" id="flexCheckDefault" />
  <label class="form-check-label" for="flexCheckDefault">Sect 1</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input class="form-check-input" name="section[]" type="checkbox" value="Sect 2" id="flexCheckChecked"/>
  <label class="form-check-label" for="flexCheckChecked">Sect 2</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="form-check-input" name="section[]" type="checkbox" value="Sect 3" id="flexCheckChecked"/>
<label class="form-check-label" for="flexCheckChecked">Sect 3</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="form-check-input" name="section[]" type="checkbox" value="Sect 4" id="flexCheckChecked"/>
<label class="form-check-label" for="flexCheckChecked">Sect 4</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="form-check-input" name="section[]" type="checkbox" value="Sect 5" id="flexCheckChecked"/>
<label class="form-check-label" for="flexCheckChecked">Sect 5</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="form-check-input" name="section[]" type="checkbox" value="Sect 6" id="flexCheckChecked"/>
<label class="form-check-label" for="flexCheckChecked">Sect 6</label>
</div> -->



                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          

          </div>
          
        </div>

            
            
          </div>
          <!-- /.card -->
        </div>


@endsection