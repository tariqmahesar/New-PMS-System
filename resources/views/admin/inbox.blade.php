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
<a href="{{url('admin/compose-message')}}">
  <button type="button" class="btn btn-primary">Compose</button>
</a>
<br><br>

  <br><br>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">

         @if($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
              </div>
            @endif
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Messages</h3>
              <span id="ttmsg"><?=count($totalUnreadMessages)?> unread messages</span>



              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <!-- <input type="text" class="form-control" placeholder="Search Mail"> -->
                 <!--  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div> -->
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
               
               <!--  <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button> -->
                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div> -->
               
                <!-- <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button> -->
                <div class="float-right">
                 <!--  1-50/200 -->
                  <!-- <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div> -->
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                @foreach($messages as $msg)
                @php

                $curenttime=$msg->created_at;
                $time_ago = strtotime($curenttime);
                
                $msgId = $msg->id;
                @endphp
                  <tr <?php if($msg->readstatus==1){ ?> style="background-color: antiquewhite;" <?php } ?>>
                    <td class="mailbox-name">
                      <a href="{{url('admin/view-message/'.$msgId)}}">{{$msg->name}}</a></td>
                    <td class="mailbox-subject"><b>{{Str::limit($msg->message, 20)}}</b>
                    </td>
                    <td class="mailbox-attachment">{{$msg->user_type}}</td>
                    <td class="mailbox-date">{{App\Http\Controllers\MessagesController::timeAgo($time_ago);}}</td>
                    <td>
                        <div class="btn-group">
                      <a href="{{route('message.delete' , ['id' => $msg->id])}}">
                        <button type="button" class="btn btn-default btn-sm">
                          <i class="far fa-trash-alt"></i>
                        </button>
                      </a>
                        
                      </div>
                  </td>
                  </tr>
                @endforeach
                  
                  
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
               
                <!-- <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                  <i class="far fa-square"></i>
                </button> -->
                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div> -->
               
                <!-- <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button> -->
                <div class="float-right">
                  <!-- 1-50/200 -->
                  <!-- <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div> -->
                  
                </div>
                
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


      <!-- /.container-fluid -->
    </div>


@endsection