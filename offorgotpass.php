<?php
session_start();
$_SESSION['gate'] = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FORGOT PASSWORD | OFFICERS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body class="container hold-transition login-page bg-navy">
<div class="row">
  <div class="login-box">
    <div class="col-12 contaner-fluid mb-3 text-center">
      <a class="text-decoration-none display-4 " href="index.php"><span class="text-warning fw-bolder">JCYTF</span>Officers</a>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error text-danger fs-6">
          <?php echo $_GET['error']; ?>
        </p>
      <?php } ?>
    </div>
    <!-- /.login-logo -->
    <div class="card col-12 bg-gray-dark ">
      <div class="card-body login-card-body bg-gray-dark m-3">
        <p class="login-box-msg">Forgot Password</p>
        <p class="text-center">Enter your email address to reset your password.</p>
        <div class="input-group mb-3">
          <input id="email" type="email" name="email" class="form-control" placeholder="Email Address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <button type="submit" id="btnForgot" class="btn btn-warning btn-block">Recover Account</button>
        <p class="mt-3 text-center">
          <a href="offindex.php" id="backToLoginLink">Back to Login</a>
        </p>
      </div>
    </div>
  </div>
</div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- sweetalert -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {
      $("#btnForgot").click(function(e) {
        e.preventDefault();
        var email = $("#email").val();
        $.ajax({
          url: 'forgot-password.php',
          method: 'post',
          data: { email: email },
          success: function(response) {
            // Display success message
            Swal.fire({
              icon: 'success',
              title: 'Your forgotten Account sent to email',
              text: 'Your email address has received a forgotten account.',
              showConfirmButton: false,
              timer: 3000
            }).then(function() {
              // Redirect to the login page
              window.location.href = "offindex.php";
            });
          },
          error: function(xhr, status, error) {
            // Display error message
            Swal.fire({
              icon: 'error',
              title: 'Forgot Password',
              text: 'send to your email was unsuccessful.',
              showConfirmButton: false,
              timer: 3000
            });
          }
        });
      });
    });
  </script>
</body>
</html>
