<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");

session_start();
$_SESSION['gate'] = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="Cache-control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN | ADMIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel = "icon" href = "./logojcytf.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body class="container hold-transition login-page bg-navy">
<div class="row">
  <div class="login-box">
    <div class="col-12 contaner-fluid mb-3 text-center">
      <a class="text-decoration-none display-4 " href="#"><span class="text-warning fw-bolder">JCYTF</span>ADMIN</a>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error text-danger fs-6">
          <?php echo $_GET['error']; ?>
        </p>
      <?php } ?>
    </div>
    <!-- /.login-logo -->
    <div class="card col-12 bg-gray-dark ">
      <div class="card-body login-card-body bg-gray-dark m-3">
        <p class="login-box-msg">Login to start your session</p>
        <div class="input-group mb-3">
          <input id="uname" type="text" name="uname" class="form-control" placeholder="Username" required maxlength="16">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pass" type="password" name="password" class="form-control" placeholder="Password" required maxlength="16">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div style="display:none;" id="otp" class="input-group mb-3">
          <div class="row">
            <div class="col-12 input-group">
              <input id="txtotp" type="text" name="txtotp" class="form-control" placeholder="OTP Verify" required maxlength="8">
              <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
            </div>
           
            <div class="col-12">
                <div><p id="timer" class="text-center mt-4"></p></div>
              <button type="submit" id="btnotp" class="btn btn-warning btn-block mt-3">Confirm OTP</button>
            </div>
          </div>
        </div>
        <button type="submit" id="btnlogin" class="btn btn-warning btn-block">Confirm</button>
        <p class="mb-1 mt-3">
          <a href="forgotpass.php" id="forgotPasswordLink">Forgot Password?</a>
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

//login
$("#btnotp").click(function() {
  var uname = $("#uname").val();
  var pass = $("#pass").val();
  var txtotp = $('#txtotp').val();
  var specialChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
  if (uname === '') {
    Swal.fire({backdrop: false, text: 'Username Incorrect' });
  } else if (pass === '') {
    Swal.fire({backdrop: false, text: 'Password Incorrect' });
    }else if (specialChars.test(uname) || specialChars.test(pass)) {
    Swal.fire({ backdrop: false, text: 'Special characters are not allowed' });
  } else if (txtotp === '') {
    Swal.fire({backdrop: false, text: 'OTP Incorrect' });
  } else {
    $.ajax({
      url: "otplogin.php",
      method: "POST",
      data: {
        uname: uname,
        pass: pass,
        txtotp: txtotp
      },
      success: function(response) {
        if (response === "Welcome") {
          Swal.fire({
            backdrop: false,
            title: "Success",
            text: "Entering Dashboard",
            icon: "success",
            showConfirmButton: false,
            timer: 1500
          }).then(function() {
            $("#btnotp").prop("disabled", true);
            window.location.href = "sadashboard.php";
          });
        } else {
          Swal.fire({backdrop: false, text: "Invalid" });
        }
      }
    });
  }
});



$("#btnlogin").click(function () {
  $("#btnlogin").prop("disabled", true); // Disable the login button to prevent spamming
  var uname = $("#uname").val();
  var pass = $("#pass").val();
  var specialChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

  if (uname === '') {
    Swal.fire({ backdrop: false, text: 'Username Required' });
  } else if (pass === '') {
    Swal.fire({ backdrop: false, text: 'Password Required' });
  } else if (specialChars.test(uname) || specialChars.test(pass)) {
    Swal.fire({ backdrop: false, text: 'Special characters are not allowed' });
  } else if (txtotp === '') {
    Swal.fire({ backdrop: false, text: 'OTP Incorrect' });
  } else {
    $.ajax({
      url: 'login.php',
      method: 'POST',
      data: {
        uname: uname,
        pass: pass
      },
      success: function (response) {
        if (response === 'Correct') {
          Swal.fire({ backdrop: false, title: 'Success', text: 'Login with OTP!', icon: 'success', showConfirmButton: false,
            timer: 1500 })
            .then(() => {
              $("#otp").show();
              $("#btnlogin").hide();
              countdown();
            });
        } else {
          Swal.fire({ backdrop: false, title: 'Error', text: response, icon: 'error', showConfirmButton: false,
            timer: 1500 });
        }
      }
    });
  }
});


//login
    function countdown() {
      const countDownMinutes = 2; // Set the countdown duration to 5 minutes
      const countDownDuration = countDownMinutes * 60 * 1000; // Convert minutes to milliseconds

      const countDownDate = new Date().getTime() + countDownDuration;

      // Update the countdown every second
      const countdownInterval = setInterval(function () {
        // Get the current time
        const now = new Date().getTime();

        // Calculate the remaining time
        const distance = countDownDate - now;

        // Calculate minutes and seconds
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the countdown


        // If the countdown is finished, clear the interval and display a message
        if (distance <= 0) {
          clearInterval(countdownInterval);


          $.ajax({
            url: 'otpexpire.php',
            method: 'POST',
            data: {

            },
            success: function (response) {
              document.getElementById("timer").textContent = "Countdown Finished";
              setTimeout(function () {

                location.reload();
              }, 1000)

              // alert(response);
            }

          })

        
        } else {
          document.getElementById("timer").textContent = "OTP expires " + minutes + "m " + seconds + "s";
        }
      }, 1000); // Update the countdown every 1 second (1000 milliseconds)
  }
  </script>
</body>

</html>