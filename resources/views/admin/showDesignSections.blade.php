@extends('layouts.default')

@section('title')
  Admin | Category Pages
@endsection

@section('content')


<style>

    label.btn.toggle-checkbox > i.fa:before { content:"\f096"; }
    label.btn.toggle-checkbox.active > i.fa:before { content:"\f046"; }

label.btn.active { box-shadow: none; }
label.btn.primary.active {
    background-color: #337ab7;
    border-color: #2e6da4;
    color: #ffffff;
    box-shadow: none;
}
label.btn.info.active {
    background-color: #5bc0de;
    border-color: #46b8da;
    color: #ffffff;
    box-shadow: none;
}
label.btn.success.active {
    background-color: #5cb85c;
    border-color: #4cae4c;
    color: #ffffff;
    box-shadow: none;
}
label.btn.warning.active {
    background-color: #f0ad4e;
    border-color: #eea236;
    color: #ffffff;
    box-shadow: none;
}
label.btn.danger.active {
    background-color: #d9534f;
    border-color: #d43f3a;
    color: #ffffff;
    box-shadow: none;
}
label.btn.inverse.active {
    background-color: #222222;
    border-color: #111111;
    color: #ffffff;
    box-shadow: none;
}

.one {
  background-color: #6610f2;
    color: white;
    border: none;
    padding: 6px 10px;
}

.two {
  background-color: #6c757d;
    color: white;
    border: none;
    padding: 6px 10px;
}

.three{
  background-color: #3d9970;
    color: white;
    border: none;
    padding: 6px 10px;
}

.four{
  background-color: #007bff;
    color: white;
    border: none;
    padding: 6px 10px;
}

/* .card-footer button:nth-child(1) {
  background-color: #6610f2;
    color: white;
    border: none;
    padding: 6px 10px;
}

.card-footer button:nth-child(2) {
  background-color: #6c757d;
    color: white;
    border: none;
    padding: 6px 10px;
}

.card-footer button:nth-child(3) {
  background-color: #3d9970;
    color: white;
    border: none;
    padding: 6px 10px;
}

.card-footer button:nth-child(4) {
  background-color: #007bff;
    color: white;
    border: none;
    padding: 6px 10px;
} */

.card-footer button:hover {
    background-color: #001f3f;
}

.card.card-info {
    /* border: 1px solid #17a2b8; */
}




</style>

<div class="card card-primary card-outline">
          <div class="card-header">
          
           <?php 
                 $page = Request::segment(2);
                 $pg = ucfirst($page);
           ?>
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              <?=$pg?> Upload Design Page
            </h3>
            <?php $pageLink = 'admin/'.Request::segment(2).'/add-content'; ?>
            
            <a href="{{url('admin/add-design')}}">
             <!-- <div style="text-align: right;"><button class="btn btn-dark btn-sm">Add </button></div> -->
            </a>

          </div>

          <div class="card-body">
            @if($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
              </div>
            @endif

            @if($message = Session::get('info'))
              <div class="alert alert-info alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
              </div>
            @endif
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Upload Design </a>
              </li>
             
            </ul>

            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                <div class="container">
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

            @php

            $segment = Request::segment(3);

            @endphp

            <?php if(isset($segment) && $segment>0){ ?>

              <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                <div class="container">
        @php
            $totalsections = $designsData[0]->total_sections;
            $designid = $designsData[0]->id;
            $designname = $designsData[0]->design_name;
        @endphp

        @php
            $userId = Auth::id();
            $userType = Auth::user()->user_type;
            
        @endphp

                <div class="card">
                <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <h3 id="dname">Design Name: <?=$designname?> </h3>
                <br>

    <form id="quickForm" method="post" action="{{route('design.update',['id' =>$designid])}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <?php 
        $j = 0;
        for($i=1; $i<=$totalsections; $i++){ ?>
        <div class="col-md-6">
           
            <!-- general form elements -->
            <!-- <div class="card card-info box2"> -->
            <div class="card card-info">
              <!-- <div class="ribbon2">
                <span>Not Approved</span>
              </div> -->
              <div class="card-header">
                <h3 class="card-title">Section <?=$i?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body" style="text-align: center;">
                  
                <div class="form-group" >
                  <?php 

                  if(isset($categorySectionData[$j]->image)){ 
                    
                    //dd($categorySectionData[$j]);
                    $imageName = $categorySectionData[$j]->image;

                    $sectionStatus = $categorySectionData[$j]->category_sections_status;
                    $sectionid = $categorySectionData[$j]->id;
                    $designerid = $categorySectionData[$j]->userid;

                    $checkApprovedDesign = DB::SELECT("SELECT * FROM `approved_designs` ap
                                                        WHERE ap.designerid = $designerid
                                                        AND ap.sectionid  = $sectionid
                                                        AND ap.approved_status = 1");

                    //dd($checkApprovedDesign);
                    
                    
                    ?>
                  <a href="{{asset('/adminTheme/uploads/sectionFiles')}}/{{$imageName}}" data-toggle="lightbox" data-title="Image {{$i}}">
                        <img src="{{asset('/adminTheme/uploads/sectionFiles')}}/{{$imageName}}" class="img-fluid mb-2" style="width:200px; height:200px; ">
                  </a>

                    
                  <?php }else{ ?>
                    <img src="https://www.uhy-ae.com/assets/images/image_upload_placeholder.jpg" style="width:200px; height:200px; ">
                  <?php } ?>
                   
                  </div>

                  @if($userType == 'Designer')
                  <div class="form-group ">
                    <label for="exampleInputFile">Change Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" required name="designImages[]" id="exampleInputFile">
                        <input type="hidden" name="designid" value="{{$designid}}">
                        <input type="hidden" name="userid" value="{{$userId}}">
                        <input type="hidden" name="section[]" value="{{$i}}">
                        <input type="hidden" name="sections_name[]" value="Section {{$i}}">

                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <!-- <span class="input-group-text">Upload</span> -->
                      </div>
                    </div>
                  </div>
                @endif



<div class="card-footer">

@if(isset($userType) && $userType == "Manager")
<button type="button" did="{{$designid}}" sid="{{$sectionid}}" uid="{{$userId}}" udid = {{$designerid}} aps="1" class="one statusbtn">
  <i class="fa-solid fa-square-pen">
</i>Change Design Status</button>
@endif
  
@if(empty($checkApprovedDesign))
<a href="#">
<button class="two"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Not Approved</button>
                  </a>
@else
<a href="javascript:void(0);">
<button class="three"><i class="fa fa-check-square" aria-hidden="true"></i> Approved</button>
                  </a>
@endif


<!-- <button class="four"><i class="fa fa-comments" aria-hidden="true"></i> Comment</button>  -->
                  </div>
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer">
                  <div class="form-group" data-toggle="buttons" style="text-align: center;">
                    <button><i class="fa fa-hourglass-start" aria-hidden="true"></i> Not Approved</button>
                    <button><i class="fa fa-check-square" aria-hidden="true"></i> Approved</button>
                    <button><i class="fa fa-comments" aria-hidden="true"></i> Comment</button>
                    </div>
                </div> -->
            </div>
          </div>
          <?php 
$j++;
} 

?>

</div>
        <!-- row closed -->
        <div class="row" style="padding: 15px;background-color: currentColor;">
            <div class="col-md-12">
                <!-- <button type="submit" class="btn btn-danger" >Save</button> -->
                <input type="submit" id="savebtn" value="Save Design">
            </div>
        </div>
        </form>
        </div>
        </div>
        </div>
        <!-- /.card-body -->          
                </div>
              </div>
             
            </div>
            <?php } ?>
            
          </div>
          <!-- /.card -->
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
$(".statusbtn").click(function(){

  var designid = $(this).attr('did');
  var sectionid = $(this).attr('sid');
  var uid = $(this).attr("uid");
  var udid = $(this).attr("udid");
  

var fruit;
  Swal.fire({
  title: 'Select Design Status',
  input: 'select',
  inputOptions: {
    'Options': {
      approved: 'Approved',
      notapproved: 'Not Approved'
    },
    
  },
  inputPlaceholder: 'Select Design Status',
  showCancelButton: true,
  inputValidator: (value) => {
    return new Promise((resolve) => {
      if (value === 'approved') {

        var aps = 1;

        $.ajax({
            url: "{{ route('update.designstatus') }}",
            dataType:'json',
            data: { "designid": designid,"sectionid": sectionid,"userid": uid,"designerid":udid,"approved_status": aps,"_token": "<?php echo e(csrf_token()); ?>"},
            method:'post',
            success: function(response){
              if(response.success){
                Swal.fire(response.response)
                resolve()
                setTimeout(function(){
                  location.reload();
                },2000)

              }else{
                Swal.fire(response.response)
                resolve()

              }
            }

        });
       // Swal.fire(`Design has been approved`)
        //resolve()
      } else {

        var aps = 0;
        $.ajax({
            url: "{{ route('unapproved.designstatus') }}",
            dataType:'json',
            data: { "designid": designid,"sectionid": sectionid,"userid": uid,"approved_status": aps,"_token": "<?php echo e(csrf_token()); ?>"},
            method:'post',
            success: function(response){
              if(response.success){
                Swal.fire(response.response)
                resolve()
                setTimeout(function(){
                  location.reload();
                },2000)

              }else{
                Swal.fire(response.response)
                resolve()

              }
            }

        });
      }
    })
  }
})

if (fruit) {
  Swal.fire(`You selected: ${fruit}`)
}

  });

});

</script>

@endsection
