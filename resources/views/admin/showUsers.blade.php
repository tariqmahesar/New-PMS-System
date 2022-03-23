@extends('layouts.default')

@section('title')
Admin | Edit Category
@endsection

@section('content')
<style>
    span.badge.badge-success {
    padding: 12px;
}

#ddd{
    text-align: center;
    padding: 23px;
    font-family: unset;
    background-color: #dee2e6;
}
</style>
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
                <h3 class="card-title">View Designers Listing</h3>
              </div>
              <!-- /.card-header -->
        

            <!-- Card code start -->

            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">List of designers who added designs </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                @if(empty($usersAddedDesigns))
                <h2 id="ddd">Designers not uploaded designs in this category yet</h2>
                @else
                  <table class="table table-bordered m-0">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Sections</th>
                      <th>Show Design</th>
                    </tr>
                    </thead>
                    <tbody>
               
                @foreach($usersAddedDesigns as $key => $value)
                <?php

                    $designerid = $value->id;
                    $designid = $value->designid;
                    $sectionCount = $value->section_count;

                    $getApprovedDesugns = DB::select("SELECT COUNT(*) AS total_approved FROM `approved_designs` ad
                    WHERE ad.designerid = '".$designerid."' AND ad.designid = '".$designid."' AND ad.approved_status = 1");
                    
                    $totalApproved = $getApprovedDesugns[0]->total_approved;
                
                ?>
                    <tr>
                      <td>{{$value->name}}</td>
                      <td>{{$value->user_type}}</td>
                      <td><span id="approve"><i class="fa fa-check-square" aria-hidden="true"></i> Approved {{$totalApproved}}</span> 
                    &nbsp; / &nbsp; <span id="waiting">Waiting {{$sectionCount-$totalApproved}} &nbsp;&nbsp;<i class="fa fa-hourglass-half" aria-hidden="true"></i></td>
                      <td><a href="{{route('design.upload',['id' => $value->designid,'userid'=>$value->id])}}"><span class="badge badge-success">View Design</span></a></td>
                    </tr>
                @endforeach
                    </tbody>
                  </table>
                @endif
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
              </div>
              <!-- /.card-footer -->
            </div>

            <!-- Card code ends -->
             
            </div>
          

          </div>
          
        </div>

            
            
          </div>
          <!-- /.card -->
        </div>


@endsection