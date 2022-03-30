@extends('layouts.default')

@section('title')
  Admin | Add Category
@endsection

@section('content')

<?php 
$page = Request::segment(2);
$pg = ucfirst($page);
?>

<style type="text/css">
  
</style>
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
            <form id="quickForm" method="post" action="{{route('save.design')}}" enctype="multipart/form-data" >
              @csrf
            @php
            $userId = Auth::id();
            @endphp
            <input type="hidden" name="userid" value="{{$userId}}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$pg}} Form</h3>
              </div>

              <br>

              <div class="form-group" style="padding: 20px;">
              <select class="custom-select" id="selectCategory" name="categoryid" style="width: 30%">
                <option selected>Choose Category</option>
              @foreach($category as $cat)
                <option value="<?=$cat['id']?>"><?=$cat['category_name']?></option>
              @endforeach
              </select>   
              </div>


              
    <div class="row showingSections">

    </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              

            </div>
            </form>
          

          </div>
          
        </div>

            
            
          </div>
          <!-- /.card -->
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 <script type="text/javascript">
    $(document).ready(function(){

      $(".showingSections").hide();
        $("#selectCategory").on('change',function(){
            $(".showingSections").fadeIn('slow');
            var categoryId = $(this).val();
            //alert(categoryId);
            $.ajax({
            url: "{{ route('get.sections') }}",

            dataType:'json',
            data: { "categoryId": categoryId,"_token": "<?php echo e(csrf_token()); ?>"},
            method:'post',
            success: function(response){
              var result = response.response.categorySectionData;
              $('.showingSections').html('');
              $.each(result, function (key, value) 
                  {
                    console.log(value.id);
                     $('.showingSections').append('<div class="col-md-4"><div class="card cardBoxes" style=""><div class="card-body"><h5 class="card-title">Upload Your Design</h5><br><button type="button" class="btn btn-info">'+value.category_sections_name+'<span class="badge badge-light"></span></button><br><br><input type="file" name="file[]" /></div></div></div>');
                  });

            }

        });
      });
      
    });
</script>

@endsection

