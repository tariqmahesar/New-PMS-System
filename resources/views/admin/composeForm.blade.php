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
    
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="senderid" value="{{$usersData['senderid']}}">
                        <select class="form-control mngdsnr" name="recieverid">
                          <option>Select {{$usersData['userType']}}</option>
                          @foreach($usersData['users'] as $key=>$user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                          @endforeach
                        </select>
                      </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
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