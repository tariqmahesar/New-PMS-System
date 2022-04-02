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
              <h3 class="card-title">Read Message</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-message">
                <p>Sender: {{$messagesData['senderInfo'][0]['name']}}</p>

                <p>{{$messagesData['messageInfo'][0]['message']}}</p>

              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            
            <!-- /.card-footer -->
            <div class="card-footer">
              <div class="float-left">
              <a href="{{url('admin/compose-message/'.$messagesData['senderInfo'][0]['id'])}}">
                <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
              </a>
              <a href="{{url('admin/inbox')}}">
                <button type="button" class="btn btn-info">
                  <i class="fas fa-reply"></i> Go to inbox
                </button>
              </a>
                
              </div>
              
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