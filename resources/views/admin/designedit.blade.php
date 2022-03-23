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


.card-footer button:nth-child(1) {
    background-color: #6c757d;
    color: white;
    border: none;
    padding: 6px 10px;
}

.card-footer button:nth-child(2) {
    background-color: #3d9970;
    color: white;
    border: none;
    padding: 6px 10px;
}

.card-footer button:nth-child(3) {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 6px 10px;
}

.form-group button:hover {
    background-color: #001f3f;
}

.card.card-info {
    border: 1px solid #17a2b8;
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
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Upload Design </a>
              </li>
             
            </ul>

            
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
        @endphp

                <div class="card">
                <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <h3 id="dname">Design Name : <?=$designname?> </h3>

        <form id="quickForm" method="post" action="{{route('section.update',['id'=>$designid])}}" enctype="multipart/form-data">
          @csrf
        <div class="row">
        <?php 
        $j = 0;
        for($i=1; $i<=$totalsections; $i++){ ?>
        <div class="col-md-4">
           
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Section <?=$i?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  
                <div class="form-group">
                  <?php if(isset($categorySectionData[$j]->image)){ 

                    $imageName = $categorySectionData[$j]->image;
                    
                    ?>
                    <a href="{{asset('/adminTheme/uploads/sectionFiles')}}/{{$imageName}}" data-toggle="lightbox" data-title="Image {{$i}}">
                        <img src="{{asset('/adminTheme/uploads/sectionFiles')}}/{{$imageName}}" class="img-fluid mb-2" style="width:200px; height:200px; ">
                  </a>
                  <?php }else{ ?>
                    <img src="https://www.uhy-ae.com/assets/images/image_upload_placeholder.jpg" style="width:200px; height:200px;object-fit: cover; ">
                  <?php } ?>
                   
                  </div>

                  <div class="form-group">
                    
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
                 
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <div class="form-group" data-toggle="buttons">
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
                <input type="submit" id="savebtn" value="Update Design">
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
            
          </div>
          <!-- /.card -->
        </div>


@endsection
