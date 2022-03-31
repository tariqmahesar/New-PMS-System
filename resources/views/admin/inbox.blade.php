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
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Messages</h3>



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
                  <tr>
                    
            
                    <td class="mailbox-name">
                      <a href="{{url('admin/view-message')}}">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">5 mins ago</td>
                    <td>
                        <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm">
                          <i class="far fa-trash-alt"></i>
                        </button>
                        
                      </div>
                  </td>
                  </tr>
                  
                  
                  
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