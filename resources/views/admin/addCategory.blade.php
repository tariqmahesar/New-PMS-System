@extends('layouts.default')

@section('title')
  Admin | Add Category
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
              <form id="quickFormCategory" method="post" action="{{route('create.category')}}" >
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="FirstName">Category Name</label>
                    <input type="text" required  name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
                  </div>

                  <div class="form-group">
                    <label for="FirstName">Section Count</label>
                    <br>
                    <select class="form-select form-group" name="section_count" aria-label="Default select example">
                      <option selected>Select Section</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                      <option value="5">Five</option>
                      <option value="6">Six</option>
                    </select>
                  </div>

                  
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

        <script src="http://127.0.0.1:8000/adminTheme/plugins/jquery/jquery.min.js "></script>
        <script>
          $(document).ready(function(){
            $(".btnCat").click(function(){
              alert("hi");
            });
          });
        </script>

@endsection