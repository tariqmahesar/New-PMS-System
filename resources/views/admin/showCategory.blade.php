@extends('layouts.default')

@section('title')
  Admin | Category Pages
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
            
             <div style="text-align: right;">
            <a href="{{url('design/upload/0')}}">
              <button class="btn btn-dark btn-sm">Add Design</button>
             <!-- <button class="btn btn-dark btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Add Design</button> -->
            </a>
              <a href="{{url('admin/add-category')}}">
                <button class="btn btn-dark btn-sm">Add <?=$pg?></button>
              </a>
              </div>
            

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
              <!-- <div class="card-header">
                <h3 class="card-title">Home Page Data</h3>
              </div> -->
              <!-- /.card-header -->
    
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Section</th>
                    <!-- <th>Title</th>
                    <th>Content</th> -->
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($category as $cat)
                    <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->category_name}}</td>
                    <td>{{$cat->section_count}}</td>
                    <td>
                      
                        <a href="{{route('category.edit',['id' => $cat->id])}}"><i style="color: #c49f47;" class="fas fa-pen-square"></i></a> |
                        <a href="{{route('category.delete' , ['id' => $cat->id])}}"><i style="color: #bd0a0a;" class="fa fa-trash" aria-hidden="true"></i></a> 

                    </td>
                    </tr>
                  	@endforeach
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>


            <div class="card">
               <div class="card-header">
                <h3 class="card-title"> Design Listing</h3>
              </div> 
              <!-- /.card-header -->
            @php
            
            $userType = Auth::user()->user_type;

            @endphp
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Design Name</th>
                    <th>Sections</th>
                    <th>Designer Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($designsData as $design)
                  <?php
                  //dd($catSec);
                  ?>
                    <tr>
                    
                    <td>{{$design->design_name}}</td>

                    <td>{{$design->section_count}}</td>
                    <td>{{$design->name}}</td>

                    <!-- <td><span id="approve"><i class="fa fa-check-square" aria-hidden="true"></i> Approved 0</span> 
                    &nbsp; / &nbsp; <span id="waiting">Waiting  &nbsp;&nbsp;<i class="fa fa-hourglass-half" aria-hidden="true"></i></td> -->
                    <!-- <td>{{$design->section_count}}</td> -->
                    <td>
                      
                  <a href="{{route('design.edit',['id' => $design->id])}}" title="Edit Design"><i style="color: #c49f47;" class="fas fa-pen-square"></i></a>  &nbsp;| &nbsp;

                  <a href="{{route('design.delete',['id' => $design->id])}}"><i style="color: #bd0a0a;" title="Delete Design" class="fa fa-trash" aria-hidden="true"></i></a>

                @if($userType == 'Manager' || $userType == 'Admin')

                &nbsp; |  &nbsp;<a href="{{route('design.view',['id' => $design->id])}}" title="View Design">
                     <i style="color: #17a2b8;" class="fa fa-eye" aria-hidden="true"></i></a> 

                @else

                &nbsp; |  &nbsp;<a href="{{route('design.upload',['id' => $design->id])}}" title="View Design">
                     <i style="color: #17a2b8;" class="fa fa-eye" aria-hidden="true"></i></a> 

                @endif
                 

                    </td>
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

<!-- Showing Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->

            
            <form id="quickForm" method="post" action="{{route('save.design')}}" enctype="multipart/form-data" >
              @csrf
            @php
            $userId = Auth::id();
            @endphp
            <input type="hidden" name="userid" value="{{$userId}}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Design</h3>
              </div>

              <!-- <br> -->

              <div class="form-group" style="padding:10px;">
              <label>Choose Category</label><br>
              <select class="custom-select" id="selectCategory" name="categoryid" style="width: 30%">
                <option selected>Choose Category</option>
              @foreach($category as $cat)
                <option value="<?=$cat['id']?>"><?=$cat['category_name']?></option>
              @endforeach
              </select>   
              </div>


              <div class="form-group" style="padding:10px;">
              <label>Design Name</label><br>
              <input type="text" class="form-control" name="design_name" placeholder="Design Name" name="design_name" value="">
              </div>


              
    <div class="row showingSections">

    </div>

    
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Design</button>
                </div>
              

            </div>
            </form>
          

          </div>
          
        </div>
</div>
</div>
</div>

@endsection
