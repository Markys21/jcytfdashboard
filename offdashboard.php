<?php
include 'db_conn.php';
session_start();
if (empty($_SESSION['gate1'])) {
  header("location: offlogin.php");
  exit;
}
$offid = $_SESSION['offid'];

if (!isset($_SESSION['offid'])) {
  header("location: offlogin.php");
  exit;
}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>OFFICER | DASHBOARD</title>
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
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">

    <!-- Navbar -->
    <nav style="background-color: #242B3A;" class="main-header navbar navbar-expand navbar-dark ">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./offdashboard.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside style="background-color: #242B3A;" class="main-sidebar elevation-4">
      <!-- Brand Logo -->
      <a href="?page=offdashboard" class="brand-link text-light mt-2">
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

          <div style="margin-left:20px; font-size: 20px;" class="info text-uppercase ">
            <?php
            $select = mysqli_query($conn, "select * from users where id = '$offid'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
              $fetch = mysqli_fetch_assoc($select);
            }
            ?>
            <a href="?page=offdashboard" class="d-block text-light">
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
              <a href="?page=offdashboard" class="mnu nav-link
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'offdashboard') {
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
              <a href="?page=off-events" class="mnu nav-link
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'off-events') {
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
              <a href="?page=officer-request" class="mnu nav-link
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'officer-request') {
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
              <a href="?page=off-add-event" class="mnu nav-link
            <?php
            if (isset($_GET['page'])) {
              $p = $_GET['page'];
              if ($p == 'off-add-event') {
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
              <a href="?page=off-decline" class="mnu nav-link
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

            <li style="margin-top: 410px;" class="nav-item">
            <hr style="background-color: orange;">
              <a href="./offindex.php" class="nav-link" id="btnLogout">
                <lord-icon src="https://cdn.lordicon.com/hcuxerst.json" trigger="hover"
                  colors="primary:#4be1ec,secondary:#cb5eee" style="width:40px;height:40px; margin-bottom: -15px;">
                </lord-icon>
                <p class="text-danger" style="margin-left:20px; font-size: 20px;">Logout</p>
              </a>
              <hr style="background-color: orange;">
            </li>

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
          case 'offdashboard':
            include 'offdashstarter.php';
            break;
          case 'off-add-event':
            include 'offaddevent.php';
            break;
          case 'off-edit-event':
            include 'offeditevent.php';
            break;
          case 'officer-request';
            include 'offrequest.php';
            break;
          case 'off-events';
            include 'offeventlist.php';
            break;
          case 'off-decline';
            include 'offdecline.php';
            break;
          case 'archive';
            include 'archive.php';
            break;
          case 'register':
            include 'signup.php';
            break;
          default:
            include 'offdashstarter.php';
            break;
        }
      } else {
        include 'offdashstarter.php';
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

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
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
    $(".mnu").click(function (e) {
      e.preventDefault();

      $(this).addClass("active");
      window.location.href = $(this).attr('href');
    })

var editeventid = 0;
    //update event
    function updateevent(event) {
      // alert('hhh')
      event.preventDefault();
      var form = document.getElementById('frmeditevent1');
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
xhr1.open('POST', 'offupdateevent.php', true);
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
          window.location.href = "?page=officer-request";
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
    $("#btnupdateeventoff").click(function () {
      editeventid = $(this).attr('editeventid');

      updateevent(event);

    });


  </script>
  <script>

    $(function () {
      $("#example1").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      $(".btnviewevent").click(function () {
        var vieweventid = $(this).attr('vieweventid');
        // alert(vieweventid)
        $.ajax({
          url: './displayeventinfo.php',
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
    // Function to handle form submission
    //save event
  function uploadImages(event) {
  event.preventDefault();
  var form = document.getElementById('imageUploadForm1');
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
          const formInputs = document.getElementById('imageUploadForm1').querySelectorAll('input');
          formInputs.forEach(input => input.value = "");

          window.location.href = "?page=officer-request";
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
document.getElementById('imageUploadForm1').addEventListener('submit', uploadImages);


// Attach event listener to the form submit event
  
 

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
      window.location.href = "./offindex.php"; // Redirect to the logout page
    }
  });
});


// Set the timeout duration in milliseconds (15 minutes in this example)
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
    window.location.href = 'offindex.php';
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