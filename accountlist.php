<script>
  var dog = localStorage.getItem("verify");
  if(dog==""){
     window.location.href="sadashboard.php";
    // alert("Session has been Expired" );
  }else{
    //   alert('Entering to List of accounts');
  }
  localStorage.setItem("verify","");
</script>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List of Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List of Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <div class="container-fluid">
        <div class="row">
        
          <div class="col-lg-12">
          <div class="card">
              <div style="background-color: #242B3A;" class="card-body">
                <div style="overflow:auto;" class="table-scrollable">
          <table id="example1" width="100%" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Contact</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Action</th>
  

                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    include 'db_conn.php';
                    $sql1 = mysqli_query($conn, "select * from users where status = 1 order by id desc");
                    $j = 1;
                    while($result1 = mysqli_fetch_array($sql1)){
                      ?>
                    <tr>
                    <td>
                      <?php
                    echo $j .'.'; $j++;
                    ?>
                    </td>
                    <td>
                      <?php
                    echo $result1['user_name'];
                    ?>
                    </td>
                    <td>
                      <?php
                    echo $result1['password'];
                    ?>
                    </td>
                    <td>
                      <?php
                    echo $result1['contact'];
                    ?>
                    </td>
                    </td>
                    <td>
                      <?php
                    echo $result1['roleid'];
                    ?>
                    </td>
                    <td>
                    <?php
                    echo $result1['email'];
                    ?>
                    </td>
                    
                    <td>
                    <a inactiveacc="<?php echo $result1['id'];?>" class="btn btn-danger btninactive btn-sm"><i class="fas fa-user">
                      </i> Inactive</a>
                      <a class="btn btn-info btn-sm btn btn-primary btneditacc" href="?page=edit-account&id=<?php echo md5($result1['id']);?>" 
                      editaccountid="<?php echo $result1['id'];?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                     Edit Account
                                </a>
                    </td>
                  </tr>
                      <?php
                    }
                    ?>          
                    </tbody>
                </table>
                </div>
          </div>
              </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
