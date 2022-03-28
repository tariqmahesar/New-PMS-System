@extends('layouts.default')

@section('title')
  Admin | logs Page
@endsection

@section('content')


<div class="card card-primary card-outline">
          <div class="card-header">
           <?php 
                 $page = Request::segment(2);
                 $pg = ucfirst($page);
           ?>
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              <?=$pg?> Add Details to <?=$pg?> Page
            </h3>
            <?php $pageLink = 'admin/'.Request::segment(2).'/add-content'; ?>
            
             <!-- <div style="text-align: right;">
             <button class="btn btn-dark btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Add Design</button>
              <a href="{{url('admin/add-category')}}">
                <button class="btn btn-dark btn-sm">Add <?=$pg?></button>
              </a>
              </div> -->
            

          </div>

          <div class="card-body">
             @if($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
              </div>
            @endif
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true"><?=$pg?> Page </a>
              </li>
             
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                <div class="container">
                  
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manager Notification</h3>
              </div>
              <!-- /.card-header -->
    
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>Design</th>
                    <!-- <th>Section</th> -->
                    <th>Notifications</th>
                    <!-- <th>Title</th>
                    <th>Content</th> -->
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($notifications as $key => $not)
                  @php

                      $designid = $not->designid;
                      
                  @endphp
                    <tr>
<td>{{$not->design_name}} </td>

                    <td>{{$not->notificatoin_comment}} </td>
                    <!-- <td><a href=""><i style="color: #bd0a0a;" class="fa fa-trash" aria-hidden="true"></i></a></td> -->
                    </tr>
                  @endforeach
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>




                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Designer Notifications</h3>
              </div> 
              <!-- /.card-header -->
    
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>Design</th>
                     <th>Section</th>
                     <th>Manager</th>
                    <th>Notifications</th>
                    <!-- <th>Title</th>
                    <th>Content</th> -->
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($notifications2 as $key2 => $not2)
                    <tr>
                    <td>{{$not2->design_name}} </td>
                    <td>{{$not2->sectionid}} </td>
                    <td>{{$not2->name}} </td>
                    <td>{{$not2->notificatoin_comment}} </td>
                    <!-- <td><a href=""><i style="color: #bd0a0a;" class="fa fa-trash" aria-hidden="true"></i></a></td> -->
                    </tr>
                  @endforeach
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>


       
                    
                  
         
                </div>
              </div>
             
            </div>
            
          </div>
          <!-- /.card -->
        </div>


@endsection
