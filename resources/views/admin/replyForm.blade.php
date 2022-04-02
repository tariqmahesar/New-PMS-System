@extends('layouts.default')

@section('title')
Admin | Edit Category
@endsection

@section('content')

<?php 
$page = Request::segment(2);
$pg = ucfirst($page);
?>

<div class="content">
<div class="">
<!-- <a href="">
  <button type="button" class="btn btn-primary">Compose</button>
</a> -->
  <br><br>
    
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

   <section class="content">
    <form action="{{route('storereply.message')}}" method="post">
      @csrf
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Reply Message to {{$userData['recieverInfo'][0]->name}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="senderid" value="{{$userData['senderInfo'][0]->id}}">
                  <input type="hidden" name="recieverid" value="{{$userData['recieverInfo'][0]->id}}">
                      </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="3" required="" placeholder="Enter ..."></textarea>
                </div>
                </div><output class="note-status-output" role="status" aria-live="polite"></output>
               
              </div>
                </div>
                <div class="form-group">
                  <!-- <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                  </div> -->
                  <!-- <p class="help-block">Max. 32MB</p> -->
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                 
                </div>
                 <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
               
              </div>
              <!-- /.card-footer -->
            </div>
            </form>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>


      <!-- /.container-fluid -->
    </div>


@endsection