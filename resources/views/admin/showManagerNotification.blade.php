@extends('layouts.default')

@section('title')
Printout Management | Dashboard
@endsection
@section('content')

<style>
  #heading1{
    background-color: black;
    color: white;
    text-align: center;
    padding: 25px;
    font-family: unset;
  }

  .row{
  margin:auto;
  padding: 30px;
  width: 80%;
  display: flex;
  flex-flow: column;
  .card{
    width: 100%;
    margin-bottom: 5px;
    display: block;
    transition: opacity 0.3s;
  }
}


.card-body{
  padding: 0.5rem;
  table{
    width: 100%;
    tr{
      display:flex;
      td{
        a.btn{
          font-size: 0.8rem;
          padding: 3px;
        }
      }
      td:nth-child(2){
        text-align:right;
        justify-content: space-around;
      }
    }
  }
  
}

.card-title:before{
  display:inline-block;
  font-family: 'Font Awesome\ 5 Free';
  font-weight:900;
  font-size: 1.1rem;
  text-align: center;
  border: 2px solid grey;
  border-radius: 100px;
  width: 30px;
  height: 30px;
  padding-bottom: 3px;
  margin-right: 10px;
}

.notification-invitation {
  .card-body {
    .card-title:before {
      color: #90CAF9;
      border-color: #90CAF9;
      content: "\f007";
    }
  }
}

.notification-warning {
  .card-body {
    .card-title:before {
      color: #FFE082;
      border-color: #FFE082;
      content: "\f071";
    }
  }
}

.notification-danger {
  .card-body {
    .card-title:before {
      color: #FFAB91;
      border-color: #FFAB91;
      content: "\f00d";
    }
  }
}

.notification-reminder {
  .card-body {
    .card-title:before {
      color: #CE93D8;
      border-color: #CE93D8;
      content: "\f017";
    }
  }
}

.card.display-none{
  display: none;
  transition: opacity 2s;
}


</style>


<div class="container-fluid">

  <div class="row">
<div class="col-md-12">
  <h1 id="heading1">My Notifications</h1>
</div>
           
<div class="row notification-container">
  <!-- <h2 class="text-center">My Notifications</h2> -->
  <p class="dismiss text-right"><a id="dismiss-all" href="#">Dimiss All</a></p>
  <div class="card notification-card notification-invitation">
    <div class="card-body">
      <table>
        <tr>
          <td style="width:70%"><div class="card-title">
        {{$notificationData[0]->notificatoin_comment}}.
        <?php
            $designid = $notificationData[0]->designid;

            //$pageLink = 'admin/upload/'.$designid.' '; 
        ?>
        </div></td>
          <td style="width:30%">
            <a href="{{url('admin/design')}}" class="btn btn-primary">View</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  
  
</div>
          



          <!-- <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="{{url('admin/order')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div> -->
         
          <!-- <div class="col-lg-3 col-6">
            
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>33</h3>

                <p>New Inquiries</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="{{url('admin/show-inquiries')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div> -->
          
        </div>
 
        <!-- <div class="row" style="text-align: center;">
    <div class="col-md-12">
      <img style="width: 200px;padding: 19px;" src="{{asset('adminTheme/dist/img/logo1.png')}}">
    </div>
  </div> -->

        <!-- <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
               

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
           

            
           
          </div>
          
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
               

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
           

            
          </div>
         
        </div> -->
       
      </div>
@endsection