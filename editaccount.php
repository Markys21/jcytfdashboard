<?php 
include('db_conn.php');
if(!isset($_SESSION['id'])){
    header("location: editaccount.php");
    exit;
  }
  if(isset($_SESSION['successMsg'])){
    echo "<p style = 'color:green; font-weight:bold'>".$_SESSION['successMsg']."</p>";
}
$id=$_SESSION['id'];
$id = $_GET['id'];
$getData=mysqli_query($conn, "select * from users where md5(id) ='$id'");
$row=mysqli_fetch_assoc($getData);

?>

    

<section class="d-flex justify-content-center">
  <div class="register-box justify-content-center">
    <div class="register-logo">
      <a class="fw-bolder fs-1" href="./sadashboard.php"><span class="text-warning">EDIT</span>ACCOUNT</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Edit an account</p>

        <!-- <form action="signup-check.php" method="post"> -->
        <div class="input-group mb-3">


          <input type="text" value="<?php echo $row['user_name']?>" id="unameedit" name="unameedit" placeholder="User name" class="form-control" required maxlength="16">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">


          <input type="text" value="<?php echo $row['contact']?>" id="contactedit" name="contactedit" placeholder="Contact" class="form-control" required maxlength="11">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" value="<?php echo $row['email']?>" id="emailedit" name="emailedit" class="form-control" placeholder="Email" required maxlength="50">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" value="<?php echo $row['password']?>" id="passedit" name="passedit" class="form-control" placeholder="Password" required maxlength="16"><br>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="repassedit" name="repassedit" class="form-control" placeholder="Retype Password"
            required required maxlength="16">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <select class="form-control"  id="roleidedit" name="roleidedit" required>
          <option></option>
            <option value="admin"
            <?php
            if($row['roleid']=='admin'){
                echo 'selected';
            }
            ?>>Admin</option>
            <option value="officer"
            <?php
            if($row['roleid']=='officer'){
                echo 'selected';
            }
            ?>
            >Officer</option>
          </select>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="button" id="btnregupdate" updateaccountid ="<?php echo $id; ?>"   class="btn btn-warning btn-block">Update</button>
          </div>
          <!-- /.col -->
        </div>
        <!-- </form> -->

        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</section>
 
     <script src="./plugins/jquery/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
  $(document).ready(function () {
      $(".btneditacc").click(function (e) {
        var editaccountid = $(this).attr('editaccountid');
      });
    });
     $(document).ready(function () {
  $("#btnregupdate").click(function (e) {
    var updateaccountid = $(this).attr('updateaccountid');

    e.preventDefault();
    var unameedit = $("#unameedit").val();
    var contactedit = $("#contactedit").val();
    var emailedit = $("#emailedit").val();
    var passedit = $("#passedit").val();
    var repassedit = $("#repassedit").val();
    var roleidedit = $("#roleidedit").val();

    if (unameedit === '') {
      showAlert('Username Required');
    } else if (contactedit === '') {
      showAlert('Contact Required');
    } else if (emailedit === '') {
      showAlert('Email Required');
    } else if (!emailedit.endsWith('@gmail.com')) {
        showAlert('Email must be a valid Gmail address');
    } else if (passedit === '') {
      showAlert('Password Required');
    } else if (repassedit === '') {
      showAlert('Retype Password Required');
    } else if (repassedit !== passedit) {
      showAlert('Password mismatched');
    } else if (roleidedit === '') {
      showAlert('Role Required');
    } else {
      Swal.fire({
        title: 'Confirmation',
        html: '<input type="password" id="passwordInput" class="swal2-input" placeholder="Enter your password">',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
          var password = $('#passwordInput').val();
          updateAccount(unameedit, contactedit, emailedit, passedit, repassedit, roleidedit, updateaccountid, password);
        } else {
          // User clicked "No," do nothing or perform any other action
        }
      });
    }
  });
});

function updateAccount(unameedit, contactedit, emailedit, passedit, repassedit, roleidedit, updateaccountid, password) {
  if (password === '') {
    showAlert('Password Required');
  } else {
    $.ajax({
      url: 'edit-accprocess.php',
      method: 'POST',
      data: {
        unameedit: unameedit,
        contactedit: contactedit,
        emailedit: emailedit,
        passedit: passedit,
        repassedit: repassedit,
        roleidedit: roleidedit,
        updateaccountid: updateaccountid,
        password: password
      },
      success: function (response) {
        var parsedResponse = JSON.parse(response);
        if (parsedResponse.status === 'success') {
          Swal.fire({
            title: 'Success!',
            text: 'Account updated successfully.',
            icon: 'success',
          }).then(() => {
            window.location.href = "?page=list-of-accounts"; // Redirect to the desired page
          });
        } else {
          Swal.fire({
            title: 'Error!',
            text: parsedResponse.message,
            icon: 'error'
          });
        }
      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Something went wrong. Please try again.',
          icon: 'error'
        });
      }
    });
  }
}

function showAlert(message) {
  Swal.fire({
    title: 'Alert',
    text: message,
    icon: 'warning'
  });
}
 </script>
