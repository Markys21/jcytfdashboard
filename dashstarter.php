<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-12">
        <!-- small box -->

        <div class="small-box bg-navy p-5 mb-3">
          <div class="inner">
            <h1 class="" style="font-family: &quot;Arial Black&quot;;">
                <?php

                include 'connection.php';
                $sql = mysqli_query($con, "select * from tblevents");
                echo mysqli_num_rows($sql);
                ?>
              </h1>

            <p class="">Overall Events</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add text-secondary">Overall Events</i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info ">
          <div class="inner">
            <h3>
              <?php

              include 'connection.php';
              $sql = mysqli_query($con, "select * from tblevents where status = 3");
              // $sql = mysqli_query($con, "select * from tblevents where status = 3 and userid='$currentuserid'");
              echo mysqli_num_rows($sql);
              ?>
            </h3>

            <p>Requested Events</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"><lord-icon
    src="https://cdn.lordicon.com/kjkiqtxg.json"
    trigger="hover"
    colors="outline:#121331,primary:#646e78,secondary:#4bb3fd,tertiary:#ebe6ef"
    style="width:100px;height:100px">
</lord-icon></i>
          </div>
          <a href="?page=request-of-events" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
     
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>
              <?php

              include 'connection.php';
              $sql = mysqli_query($con, "select * from tblevents where status = 4");
              echo mysqli_num_rows($sql);
              ?>
            </h3>

            <p>Declined Events</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"><lord-icon
    src="https://cdn.lordicon.com/rjvcsvct.json"
    trigger="hover"
    colors="outline:#121331,primary:#ebe6ef"
    style="width:100px;height:100px">
</lord-icon></i>
          </div>
          <a href="?page=decline" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>
              <?php

              include 'connection.php';
              $sql = mysqli_query($con, "select * from tblevents where status = 2");
              echo mysqli_num_rows($sql);
              ?>
            </h3>

            <p>Archived Events</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"><lord-icon
    src="https://cdn.lordicon.com/exkbusmy.json"
    trigger="hover"
    colors="outline:#121331,primary:#646e78,secondary:#4bb3fd,tertiary:#ebe6ef"
    style="width:100px;height:100px">
</lord-icon></i>
          </div>
          <a href="?page=archive" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h1 class="p-3">
              <?php
              // if(isset($_SESSION['id'])){
              //   $currentuserid = $_SESSION['id'];
              // }
              include 'connection.php';
              $sql = mysqli_query($con, "select * from tblevents where status = 1");
              // $sql = mysqli_query($con, "select * from tblevents where status = 1 and userid='$currentuserid'");
              echo mysqli_num_rows($sql);
              ?>
            </h1>

            <p>Approved Events</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars p-3">Approved Events</i>
          </div>
          <a href="?page=list-of-event" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>
              <?php

              include 'db_conn.php';
              $sql = mysqli_query($conn, "select * from users");
              echo mysqli_num_rows($sql);
              ?>
            </h3>

            <p>Registered users</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"><lord-icon
    src="https://cdn.lordicon.com/alzqexpi.json"
    trigger="hover"
    colors="primary:#121331,secondary:#646e78,tertiary:#ffc738,quaternary:#f9c9c0,quinary:#ebe6ef"
    style="width:100px;height:100px">
</lord-icon></i>
          </div>
          <a href="#" class="small-box-footer listOfAccountsLink">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>
              <?php

              include 'db_conn.php';
              $sql = mysqli_query($conn, "select * from users where status = 2");
              echo mysqli_num_rows($sql);
              ?>
            </h3>

            <p>Inactive Accounts</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"><lord-icon
    src="https://cdn.lordicon.com/qxjdtzah.json"
    trigger="hover"
    colors="outline:#121331,primary:#3a3347,secondary:#f9c9c0"
    style="width:100px;height:100px">
</lord-icon></i>
          </div>
          <a href="#" class="small-box-footer inactiveAccountsLink">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>

  </div>

  </div>

  <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>