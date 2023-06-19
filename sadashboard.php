<?php
include 'db_conn.php';
header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache");
header("Expires: 0");


session_start();


if (empty($_SESSION['gate'])) {
  header("location: index.php");
  exit;
}
$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
  header("location: index.php");
  exit;
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Cache-control" content="no-cache">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ADMIN | DASHBOARD</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel = "icon" href = "./logojcytf.png">
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
 <div class="preloader flex-column justify-content-center align-items-center">
        <!--<img class = "animation_shake" scr="./logojcytf.png" alt = "JCYTF" height ="60" width ="60">-->
        <img class="img-circle" src="./logojcytf.png" alt="JCYTF" height ="100" width ="100">
    </div>
  <div class="wrapper">
    
    <!-- Navbar -->
    <nav style="background-color: #242B3A;" class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./sadashboard.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside style="background-color: #242B3A;" class="main-sidebar elevation-4">
      <!-- Brand Logo -->
      <a href="./sadashboard.php" class="brand-link text-light mt-2">
        <img src="./logojcytf.png" alt="JCYTF" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><span class="text-warning">JCYTF</span> Dashboard</span>
      </a>

      <!-- Sidebar -->
      <div style="background-color: #242B3A;" class="sidebar">
        <hr style="background-color: orange;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex">
          <div class="image">
            <lord-icon src="https://cdn.lordicon.com/ljvjsnvh.json" trigger="hover"
              colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px">
            </lord-icon>
          </div>
          <div style="margin-left:20px; font-size: 20px;" class="info text-uppercase">
            <?php
            $select = mysqli_query($conn, "select * from users where id = '$id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
              $fetch = mysqli_fetch_assoc($select);
            }
            ?>
            <a href="#" class="d-block text-light">
              <?php echo $fetch['user_name'] ?>
            </a>
          </div>
        </div>
        <hr style="background-color: orange;">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="?page=dashboard" class="mnu nav-link 
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'dashboard') {
                echo 'active';
              }
            }
            ?>
            ">
                <lord-icon src="https://cdn.lordicon.com/tbfrtmlu.json" trigger="hover"
                  colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
                </lord-icon>
                <p style="margin-left:20px;">
                  Dashboard

                </p>
              </a>
            </li>
            <li class="nav-item">

              <a href="?page=request-of-events" class="mnu nav-link
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'request-of-events') {
                echo 'active';
              }
            }
            ?>
            ">
                <lord-icon src="https://cdn.lordicon.com/yrxnwkni.json" trigger="hover"
                  colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
                </lord-icon>
                <p style="margin-left:20px;">
                  Request of Events

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=list-of-event" class="mnu nav-link
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'list-of-event') {
                echo 'active';
              }
            }
            ?>
            ">
                <lord-icon src="https://cdn.lordicon.com/lbsajkny.json" trigger="hover"
                  colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
                </lord-icon>
                <p style="margin-left:20px;">
                  List of Event

                </p>
              </a>
            </li>
            <li class="nav-item">
            <a href="#" class="mnu nav-link listOfAccountsLink"
              <?php
              if (isset($_GET['page'])) {
                $p = $_GET['page'];
                if ($p == 'list-of-accounts') {
                  echo 'active';
                }
              }
              ?>
            ">
              <lord-icon src="https://cdn.lordicon.com/edxgdhxu.json" trigger="hover"
                colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
              </lord-icon>
              <p style="margin-left:20px;">
                List of Accounts
              </p>
            </a>
          </li>


                <li class="nav-item">
        <a href="#" class="mnu nav-link inactiveAccountsLink
          <?php
          if (isset($_GET['page'])) {
            $p = $_GET['page'];
            if ($p == 'inactive') {
              echo 'active';
            }
          }
          ?>
        ">
        <lord-icon
    src="https://cdn.lordicon.com/gclzwloa.json"
    trigger="hover"
    colors="primary:#4be1ec,secondary:#cb5eee"
    style="width:40px;height:40px; margin-bottom: -15px;">
</lord-icon>
          <p style="margin-left:20px;">
            Inactive Accounts
          </p>
        </a>
      </li>


            <li class="nav-item">
              <a href="?page=add-event" class="mnu nav-link
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'add-event') {
                echo 'active';
              }
            }
            ?>
            ">
                <lord-icon src="https://cdn.lordicon.com/zgogqkqu.json" trigger="hover"
                  colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
                </lord-icon>
                <p style="margin-left:20px;">
                  Add Event

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=decline" class="mnu nav-link
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'decline') {
                echo 'active';
              }
            }
            ?>
            ">
                <lord-icon src="https://cdn.lordicon.com/lygrugee.json" trigger="hover"
                  colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
                </lord-icon>
                <p style="margin-left:20px;">
                  Decline Event

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=archive" class="mnu nav-link
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'archive') {
                echo 'active';
              }
            }
            ?>
            ">
                <lord-icon src="https://cdn.lordicon.com/tntmaygd.json" trigger="hover"
                  colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
                </lord-icon>
                <p style="margin-left:20px;">
                  Archive

                </p>
              </a>
            </li>

            <li class="nav-item mb-5">
              
              <a href="?page=register" class="mnu nav-link">
                <lord-icon src="https://cdn.lordicon.com/jryilvyz.json" trigger="hover"
                  colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
                </lord-icon>
                <p style="margin-left:20px;">
                  Register

                </p>
              </a>
            </li>
            
            <li style="margin-top: 160px;" class="nav-item">
            <hr style="background-color: orange;">
              <a href="./index.php" class="nav-link" id="btnLogout">
                <lord-icon src="https://cdn.lordicon.com/hcuxerst.json" trigger="hover"
                  colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
                </lord-icon>
                <p class="text-danger" style="margin-left:20px; font-size: 20px;">Logout</p>
              </a>
              <hr style="background-color: orange;">
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php

      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
          case 'dashboard':
            include 'dashstarter.php';
            break;
          case 'add-event':
            include 'addevent.php';
            break;
          case 'edit-event':
            include 'editevent.php';
            break;
          case 'list-of-accounts';
            include 'accountlist.php';
            break;
          case 'edit-account':
            include 'editaccount.php';
            break;
          case 'inactive';
            include 'inactive.php';
            break;
          case 'request-of-events';
            include 'eventreq.php';
            break;
          case 'list-of-event';
            include 'eventlist.php';
            break;
          case 'decline';
            include 'decline.php';
            break;
          case 'archive';
            include 'archive.php';
            break;
          case 'register':
            include 'signup.php';
            break;
          default:
            include 'dashstarter.php';
            break;
        }
      } else {
        include 'dashstarter.php';
      }
      ?>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer style="background-color: #242B3A; border: 2px solid #242B3A ;" class="text-center main-footer">
      <strong>Copyright &copy; 2022-2023 <a href="#">ALLSTAR</a></strong> GROUP.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- /.modal -->
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- DataTables  & Plugins -->
  <!-- DataTables  & Plugins -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
<script>
  //list account menu
 $(document).ready(function () {
  $(".inactiveAccountsLink").click(function (e) {
    e.preventDefault();
    localStorage.setItem("verify","");
    Swal.fire({
      title: 'Enter Password',
      html: '<input type="password" id="passwordInput" class="swal2-input" placeholder="Enter your password">',
      icon: 'info',
      showCancelButton: true,
      confirmButtonText: 'Proceed',
      cancelButtonText: 'Cancel',
      showLoaderOnConfirm: true,
      preConfirm: () => {
        const password = $('#passwordInput').val();
        return new Promise((resolve, reject) => {
          // Send an AJAX request to the backend for password validation
          $.ajax({
            url: 'validate-password.php',
            method: 'POST',
            data: {
              password: password,
              id: "<?php echo $id; ?>"
            },
            success: function (response) {
              if (response === 'success') {
              localStorage.setItem("verify","yes");
              console.log(localStorage.getItem("verify"));
                resolve();
              } else {
                reject('Incorrect password');
              }
            },
            error: function () {
              reject('Failed to validate password');
            }
          });
        });
      }
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Password is correct. Proceeding...', 'success').then(() => {
          window.location.href = "?page=inactive";
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire('Cancelled', 'You have cancelled the password verification', 'info');
      } else if (result.dismiss === Swal.DismissReason.timer || result.dismiss === Swal.DismissReason.esc) {
        Swal.fire('No Response', 'Please enter the correct password.', 'error');
      } else if (result.dismiss === Swal.DismissReason.backdrop || result.dismiss === Swal.DismissReason.close) {
        Swal.fire('Incorrect Password', 'Please enter the correct password.', 'error');
      }
    }).catch((error) => {
      Swal.fire('Error', error, 'error');
    });
  });
});



  //list of deact account verify
$(document).ready(function () {
  $(".listOfAccountsLink").click(function (e) {
    e.preventDefault();
    localStorage.setItem("verify","");
    Swal.fire({
      title: 'Enter Password',
      html: '<input type="password" id="passwordInput" class="swal2-input" placeholder="Enter your password">',
      icon: 'info',
      showCancelButton: true,
      confirmButtonText: 'Proceed',
      cancelButtonText: 'Cancel',
      showLoaderOnConfirm: true,
      preConfirm: () => {
        const password = $('#passwordInput').val();
        return new Promise((resolve, reject) => {
          // Send an AJAX request to the backend for password validation
          $.ajax({
            url: 'validate-password.php',
            method: 'POST',
            data: {
              password: password,
              id: "<?php echo $id; ?>"
            },
            success: function (response) {
              if (response === 'success') {
              localStorage.setItem("verify","yes");
                resolve();
              } else {
                reject('Incorrect password');
              }
            },
            error: function () {
              reject('Failed to validate password');
            }
          });
        });
      }
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Password is correct. Proceeding...', 'success').then(() => {
          window.location.href = "?page=list-of-accounts";
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire('Cancelled', 'You have cancelled the password verification', 'info');
      } else if (result.dismiss === Swal.DismissReason.timer || result.dismiss === Swal.DismissReason.esc) {
        Swal.fire('No Response', 'Please enter the correct password.', 'error');
      } else if (result.dismiss === Swal.DismissReason.backdrop || result.dismiss === Swal.DismissReason.close) {
        Swal.fire('Incorrect Password', 'Please enter the correct password.', 'error');
      }
    }).catch((error) => {
      Swal.fire('Error', error, 'error');
    });
  });
});



//menu highlight "active"
$(".mnu").click(function (e) {
      e.preventDefault();

      $(this).addClass("active");
      window.location.href = $(this).attr('href');
    })




   
</script>
  <script>

//edit event function
    var editeventid = 0;
    //update event
    function updateevent(event) {
      // alert('hhh')
      event.preventDefault();
      var form = document.getElementById('frmeditevent');
      var formData = new FormData(form);

      // Get feature image file and append it to the form data
      var featureImage = document.getElementById('feature_image_edit').files[0];
      formData.append('feature_image', featureImage);

      // Get supporting images files and append them to the form data
      var supportingImages = document.getElementById('supporting_images_edit').files;

      for (var i = 0; i < supportingImages.length - 1; i++) {

        formData.append('supporting_images_edit[]', supportingImages[i]);
      }

      formData.append('editeventid', editeventid);
      // Send Ajax request to the server
      var xhr1 = new XMLHttpRequest();
      xhr1.open('POST', 'updateevent.php', true);
      xhr1.onload = function () {
        if (xhr1.status === 200) {
          // Request successful, do something with the response
          Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Update',
            denyButtonText: `Don't update`,
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                title: 'Updated!',
                icon: 'success',
                confirmButtonText: 'OK',
              }).then(() => {
                location.reload();
              });
            } else if (result.isDenied) {
              Swal.fire('Changes are not updated', '', 'info');
            }
          });
        } else {
          // Error occurred during the request
          // console.error(xhr.statusText);
          alert('Invalid');
        }
      };
      xhr1.send(formData);


    }
    // Attach form submission event listener
    // document.getElementById('frmeditevent').addEventListener('submit', updateevent);

    $("#btnupdateevent").click(function () {
      editeventid = $(this).attr('editeventid');

      updateevent(event);
    });
  </script>
  <script>
//function print, copy, download file
    $(function () {
      $("#example1").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


  //view modal event details    
      $(".btnviewevent").click(function () {
        var vieweventid = $(this).attr('vieweventid');
        //alert(vieweventid)
        $.ajax({
          url: 'displayeventinfo.php',
          method: 'POST',
          data: {
            vieweventid: vieweventid
          },
          success: function (data) {
            var eventinfobody = $("#eventinfobody");
            eventinfobody.html(data);
          }
        })
      })
    });

///btn approve
$(document).ready(function() {
  var eventid = "0";
 
  $('.btnapproveevent').click(function () {
    eventid = $(this).attr('eventid');  
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
        
        if (password === '') {
          showAlert('Password Required');
        } else {
          $.ajax({
            url: './approve.php',
            method: 'post',
            data: {
              eventid: eventid,
              password: password,
              id: "<?php echo $id; ?>"
            },
            success: function (response) {
              if (response === 'approved') {
                // Additional actions after successful approval
                Swal.fire({
                  title: 'Approved!',
                  text: 'Your file has been approved.',
                  icon: 'success'
                }).then(() => {
                  window.location.href = "?page=list-of-event";
                });
              } else {
                Swal.fire({
                  title: 'Error!',
                  text: 'Your file could not be approved.',
                  icon: 'error'
                });
              }
            }
          });
        }
      }
    });
  });
});


///btn archive
$('.btnarchive').click(function () {
  var eventarchive = $(this).attr('eventarchive');
  
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
      archiveEvent(eventarchive, password);
    } else {
      // User clicked "No," do nothing or perform any other action
    }
  });
});

function archiveEvent(eventarchive, password) {
  if (password === '') {
    showAlert('Password Required');
    return;
  }
  
  $.ajax({
    url: 'archiveprocess.php',
    method: 'post',
    data: {
      eventarchive: eventarchive,
      password: password,
      id: "<?php echo $id; ?>"
    },
    success: function (response) {
      if (response === 'approved') {
        Swal.fire({
          title: 'Archived!',
          text: 'Your file has been archived.',
          icon: 'success'
        }).then(() => {
          window.location.href = "?page=archive";
        });
      } else if (response === 'error') {
        Swal.fire({
          title: 'Error!',
          text: 'Your file could not be archived.',
          icon: 'error'
        });
      } else if (response === 'invalid') {
        Swal.fire({
          title: 'Invalid!',
          text: 'Invalid password.',
          icon: 'error'
        });
      } else {
        Swal.fire({
          title: 'Error!',
          text: 'Something went wrong. Please try again.',
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

function showAlert(message) {
  Swal.fire({
    title: 'Alert',
    text: message,
    icon: 'warning'
  });
}






//btn decline
var eventdecline = 0;

$('.btndecline').click(function () {
  eventdecline = $(this).attr('eventdecline');
});

$('#btndeclined').click(function () {
  var reason = $('#reason').val();

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
      if (password === '') {
        showAlert('Password Required');
      } else {
        declineEvent(eventdecline, reason, password);
      }
    } else {
      // User clicked "No," do nothing or perform any other action
    }
  });
});

function declineEvent(eventdecline, reason, password) {
  if (reason === '') {
    showAlert('Reason Required');
    return;
  }

  $.ajax({
    url: 'declineprocess.php',
    method: 'post',
    data: {
      eventdecline: eventdecline,
      reason: reason,
      password: password,
      id: "<?php echo $id; ?>"
    },
    success: function (response) {
      if (response === 'Incorrect password') {
        Swal.fire('Error', response, 'error');
      } else if (response === 'Successfully Declined') {
        Swal.fire('Declined!', response, 'success').then(() => {
          window.location.href = "?page=decline";
        });
      } else {
        Swal.fire('Declined!', response, 'error').then(() => {
          // Additional actions if needed
        });
      }
    }
  });
}

function showAlert(message) {
  Swal.fire({
    title: 'Alert',
    text: message,
    icon: 'warning'
  });
}







    //btn inactive accounts status
    $('.btninactive').click(function () {
  var inactiveacc = $(this).attr('inactiveacc');
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
      inactivateAccount(inactiveacc, password);
    } else {
      // User clicked "No," do nothing or perform any other action
    }
  });
});

function inactivateAccount(inactiveacc, password) {
  if (password === '') {
    showAlert('Password Required');
  } else {
    $.ajax({
      url: 'inactiveprocess.php',
      method: 'post',
      data: {
        inactiveacc: inactiveacc,
        password: password,
        id: "<?php echo $id; ?>"
      },
      success: function (response) {
        if (response === 'inactive') {
          Swal.fire({
            title: 'Approved!',
            text: 'Your account has been inactivated.',
            icon: 'success'
          }).then(() => {
            window.location.href = "?page=inactive";
          });
        } else if (response === 'error') {
          Swal.fire({
            title: 'Error!',
            text: 'Your account could not be inactivated.',
            icon: 'error'
          });
        } else if (response === 'Invalid Password') {
          Swal.fire({
            title: 'Invalid Password!',
            text: 'Please enter a valid password.',
            icon: 'error'
          });
        } else {
          Swal.fire({
            title: 'Error!',
            text: 'Something went wrong. Please try again.',
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


//btn active 
$('.btnactiveuser').click(function () {
  var activeuser = $(this).attr('activeuser');
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
      activateUser(activeuser, password);
    } else {
      // User clicked "No," do nothing or perform any other action
    }
  });
});

function activateUser(activeuser, password) {
  if (password === '') {
    showAlert('Password Required');
  } else {
    $.ajax({
      url: 'activeprocess.php',
      method: 'post',
      data: {
        activeuser: activeuser,
        password: password,
        id: "<?php echo $id; ?>"
      },
      success: function (response) {
        if (response === 'activated') {
          Swal.fire({
            title: 'Approved!',
            text: 'Your account has been activated.',
            icon: 'success'
          }).then(() => {
            window.location.href = "?page=list-of-accounts"
          });
        } else if (response === 'error') {
          Swal.fire({
            title: 'Error!',
            text: 'Your account could not be activated.',
            icon: 'error'
          });
        } else if (response === 'Invalid Password') {
          Swal.fire({
            title: 'Invalid Password!',
            text: 'Please enter a valid password.',
            icon: 'error'
          });
        } else {
          Swal.fire({
            title: 'Error!',
            text: 'Something went wrong. Please try again.',
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



   // Function to handle form submission
// Save event
// add event
function uploadImages(event) {
  event.preventDefault();
  var form = document.getElementById('imageUploadForm');
  var formData = new FormData(form);

  // Get feature image file and append it to the form data
  var featureImage = document.getElementById('feature_image').files[0];
  formData.append('feature_image', featureImage);

  // Get supporting images files and append them to the form data
  var supportingImages = document.getElementById('supporting_images').files;
  for (var i = 0; i < supportingImages.length; i++) {
    formData.append('supporting_images[]', supportingImages[i]);
  }

  // Send Ajax request to the server
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'upload.php', true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      // Request successful, do something with the response
      Swal.fire({
        icon: 'success',
        title: 'Saved!',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          const formInputs = document.getElementById('imageUploadForm').querySelectorAll('input');
          formInputs.forEach(input => input.value = "");

          window.location.href = "?page=request-of-events";
        }
      });
    } else {
      // Error occurred during the request
      console.error(xhr.statusText);
    }
  };
  xhr.send(formData);
}

// Attach event listener to the form submit event
document.getElementById('imageUploadForm').addEventListener('submit', uploadImages);



  </script>
  <script>
    $("#btnLogout").click(function (e) {

      e.preventDefault(); // Prevent the default navigation behavior

      Swal.fire({
        title: 'Logout',
        text: 'Are you sure you want to logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, logout',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          // Perform logout actions here
          window.location.href = "index.php"; // Redirect to the logout page
        }
      });
    });

  </script>
  <script>

    //for register account
 //for register account
<!--$(document).ready(function() {-->
<!--    $("#BTNREGISTER").click(function(e) {-->
<!--        e.preventDefault();-->
<!--        var unameadd = $("#unameadd").val();-->
<!--        var contactadd = $("#contactadd").val();-->
<!--        var emailadd = $("#emailadd").val();-->
<!--        var passadd = $("#passadd").val();-->
<!--        var repassadd = $("#repassadd").val();-->
<!--        var roleidadd = $("#roleidadd").val();-->

<!--        if (unameadd === '') {-->
<!--            showAlert('Username Required');-->
<!--        } else if (contactadd === '') {-->
<!--            showAlert('Contact Required');-->
<!--        } else if (emailadd === '') {-->
<!--            showAlert('Email Required');-->
<!--        } else if (passadd === '') {-->
<!--            showAlert('Password Required');-->
<!--        } else if (repassadd === '') {-->
<!--            showAlert('Retype Password Required');-->
<!--        } else if (repassadd !== passadd) {-->
<!--            showAlert('Password mismatched');-->
<!--        } else if (roleidadd === '') {-->
<!--            showAlert('Roleid Required');-->
<!--        } else {-->
<!--            Swal.fire({-->
<!--                title: 'Confirmation',-->
<!--                html: '<input type="password" id="passwordInput" class="swal2-input" placeholder="Enter your password">',-->
<!--                icon: 'warning',-->
<!--                showCancelButton: true,-->
<!--                confirmButtonColor: '#3085d6',-->
<!--                cancelButtonColor: '#d33',-->
<!--                confirmButtonText: 'Yes',-->
<!--                cancelButtonText: 'No'-->
<!--            }).then((result) => {-->
<!--                if (result.isConfirmed) {-->
<!--                    var password = $('#passwordInput').val();-->
<!--                    registerUser(unameadd, contactadd, emailadd, passadd, repassadd, roleidadd, password);-->
<!--                }-->
<!--            });-->
<!--        }-->
<!--    });-->
<!--});-->



<!--function registerUser(unameadd, contactadd, emailadd, passadd, repassadd, roleidadd, password) {-->
<!--    if (password === '') {-->
<!--        showAlert('Password Required');-->
<!--    } else {-->
<!--        $.ajax({-->
<!--            url: 'signup-check.php',-->
<!--            method: 'POST',-->
<!--            dataType: 'json',-->
<!--            data: {-->
<!--                unameadd: unameadd,-->
<!--                contactadd: contactadd,-->
<!--                emailadd: emailadd,-->
<!--                passadd: passadd,-->
<!--                repassadd: repassadd,-->
<!--                roleidadd: roleidadd,-->
<!--                password: password,-->
<!--                id: "<?php echo $id; ?>"-->
<!--            },-->
<!--            success: function(response) {-->
<!--                if (response.status === 'success') {-->
<!--                    Swal.fire({-->
<!--                        icon: 'success',-->
<!--                        text: 'Registered successfully!',-->
<!--                        showConfirmButton: false,-->
<!--                        timer: 1500-->
<!--                    }).then(function() {-->
<!--                        showAlert('Correct Password!', 'success'); // Show success alert after password is correct-->
<!--                        window.location.href = '?page=list-of-accounts'; // Redirect to desired page-->
<!--                    });-->
<!--                } else if (response.status === 'error') {-->
<!--                    showAlert(response.message);-->
<!--                }-->
<!--            },-->
<!--            error: function() {-->
<!--                showAlert('Something went wrong. Please try again later.');-->
<!--            }-->
<!--        });-->
<!--    }-->
<!--}-->





   
//for edit account
    <!--$(document).ready(function () {-->
    <!--  $(".btneditacc").click(function (e) {-->
    <!--    var editaccountid = $(this).attr('editaccountid');-->
    <!--  });-->
    <!--});-->

<!--    $(document).ready(function () {-->
<!--  $("#btnregupdate").click(function (e) {-->
<!--    var updateaccountid = $(this).attr('updateaccountid');-->

<!--    e.preventDefault();-->
<!--    var unameedit = $("#unameedit").val();-->
<!--    var contactedit = $("#contactedit").val();-->
<!--    var emailedit = $("#emailedit").val();-->
<!--    var passedit = $("#passedit").val();-->
<!--    var repassedit = $("#repassedit").val();-->
<!--    var roleidedit = $("#roleidedit").val();-->

<!--    if (unameedit === '') {-->
<!--      showAlert('Username Required');-->
<!--    } else if (contactedit === '') {-->
<!--      showAlert('Contact Required');-->
<!--    } else if (emailedit === '') {-->
<!--      showAlert('Email Required');-->
<!--    } else if (passedit === '') {-->
<!--      showAlert('Password Required');-->
<!--    } else if (repassedit === '') {-->
<!--      showAlert('Retype Password Required');-->
<!--    } else if (repassedit !== passedit) {-->
<!--      showAlert('Password mismatched');-->
<!--    } else if (roleidedit === '') {-->
<!--      showAlert('Roleid Required');-->
<!--    } else {-->
<!--      Swal.fire({-->
<!--        title: 'Confirmation',-->
<!--        html: '<input type="password" id="passwordInput" class="swal2-input" placeholder="Enter your password">',-->
<!--        icon: 'warning',-->
<!--        showCancelButton: true,-->
<!--        confirmButtonColor: '#3085d6',-->
<!--        cancelButtonColor: '#d33',-->
<!--        confirmButtonText: 'Yes',-->
<!--        cancelButtonText: 'No'-->
<!--      }).then((result) => {-->
<!--        if (result.isConfirmed) {-->
<!--          var password = $('#passwordInput').val();-->
<!--          updateAccount(unameedit, contactedit, emailedit, passedit, repassedit, roleidedit, updateaccountid, password);-->
<!--        } else {-->
<!--          // User clicked "No," do nothing or perform any other action-->
<!--        }-->
<!--      });-->
<!--    }-->
<!--  });-->
<!--});-->

<!--function updateAccount(unameedit, contactedit, emailedit, passedit, repassedit, roleidedit, updateaccountid, password) {-->
<!--  if (password === '') {-->
<!--    showAlert('Password Required');-->
<!--  } else {-->
<!--    $.ajax({-->
<!--      url: 'edit-accprocess.php',-->
<!--      method: 'POST',-->
<!--      data: {-->
<!--        unameedit: unameedit,-->
<!--        contactedit: contactedit,-->
<!--        emailedit: emailedit,-->
<!--        passedit: passedit,-->
<!--        repassedit: repassedit,-->
<!--        roleidedit: roleidedit,-->
<!--        updateaccountid: updateaccountid,-->
<!--        password: password-->
<!--      },-->
<!--      success: function (response) {-->
<!--        var parsedResponse = JSON.parse(response);-->
<!--        if (parsedResponse.status === 'success') {-->
<!--          Swal.fire({-->
<!--            title: 'Success!',-->
<!--            text: 'Account updated successfully.',-->
<!--            icon: 'success'-->
<!--          }).then(() => {-->
<!--            window.location.href = "?page=list-of-accounts"; // Redirect to the desired page-->
<!--          });-->
<!--        } else {-->
<!--          Swal.fire({-->
<!--            title: 'Error!',-->
<!--            text: parsedResponse.message,-->
<!--            icon: 'error'-->
<!--          });-->
<!--        }-->
<!--      },-->
<!--      error: function () {-->
<!--        Swal.fire({-->
<!--          title: 'Error!',-->
<!--          text: 'Something went wrong. Please try again.',-->
<!--          icon: 'error'-->
<!--        });-->
<!--      }-->
<!--    });-->
<!--  }-->
<!--}-->

<!--function showAlert(message) {-->
<!--  Swal.fire({-->
<!--    title: 'Alert',-->
<!--    text: message,-->
<!--    icon: 'warning'-->
<!--  });-->
<!--}-->





//Set the timeout duration in milliseconds (15 minutes in this example)
var timeoutDuration = 15 * 60 * 1000; // 15 minutes

 // Initialize the timer variable
var timeoutTimer;

 // Start the timer when the user is active
function startTimer() {
     clearTimeout(timeoutTimer);
     timeoutTimer = setTimeout(logout, timeoutDuration);
 }

 // Reset the timer on user activity
 function resetTimer() {
     clearTimeout(timeoutTimer);
     startTimer();
 }

 // Perform the logout action
 function logout() {
     // Redirect the user to the logout page or perform any other necessary actions
     window.location.href = 'index.php';
 }

 // Attach event listeners to detect user activity
 document.addEventListener('mousemove', resetTimer);
 document.addEventListener('keydown', resetTimer);
 document.addEventListener('click', resetTimer);

 // Start the timer initially
 startTimer();

  </script>

  <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
</body>

</html>