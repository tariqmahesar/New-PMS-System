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
              <form id="quickForm" method="post" action="{{route('user.update',['id' => $user->id])}}" >
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" required  name="name" value="{{$user->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
                  </div>

                  <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" required  name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
                  </div>


                  <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" required  name="password" value="{{$user->password}}" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
                  </div>


                  <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" required  name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputEmail1" placeholder="Enter User phone">
                  </div>

                  <div class="form-group">
                    <label for="user_type">User Role</label>
                    <select name="user_type" id="user_type" class="form-control">
                    <option value="Admin" {{ ($user->user_type) == 'Admin' ? 'selected' : '' }} >Admin</option>
                    <option value="Designer" {{ ($user->user_type) == 'Designer' ? 'selected' : '' }} >Designer</option>
                    <option value="Manager" {{ ($user->user_type) == 'Manager' ? 'selected' : '' }} >Manager</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="status">User Status</label>
                    <select name="status" id="status" class="form-control">
                    <option value="0" {{ ($user->status) == '0' ? 'selected' : '' }} >Inactive</option>
                    <option value="1" {{ ($user->status) == '1' ? 'selected' : '' }} >Active</option>
                   
                    </select>
                  </div>

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          

          </div>
          
        </div>

            
            
          </div>
          <!-- /.card -->
        </div>


@endsection