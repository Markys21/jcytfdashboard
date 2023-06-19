<?php 
include('connection.php');
if(!isset($_SESSION['id'])){
    header("location: editevent.php");
    exit;
  }
  if(isset($_SESSION['successMsg'])){
    echo "<p style = 'color:green; font-weight:bold'>".$_SESSION['successMsg']."</p>";
}
$id=$_SESSION['id'];
$eventid = $_GET['eventid'];
$getData=mysqli_query($con, "select * from tblevents where md5(id) ='$eventid'");
$row=mysqli_fetch_assoc($getData);
// $eventname = $row['eventname'];
?>

<!-- Content Header (Page header) -->

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Events</h1>
            <?php
            if(isset($_SESSION['successMsg'])){
                ?>
                <p style="color:green"><?php echo $_SESSION['successMsg'];?></p>
                <?php unset($_SESSION['successMsg']);
            }
            if(isset($_SESSION['errorMsg'])){
                ?>
                <p style="color:red"><?php echo $_SESSION['errorMsg'];?></p>
                <?php
                unset($_SESSION['errorMsg']);
            }
            ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Events</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div style="background-color: #242B3A;" class="m-5 card card-primary">
            <form id="frmeditevent" enctype="multipart/form-data">
              <div class="m-5 card-body">
                <div class="form-group">
                  <label for="inputName">Event Name</label>
                  <input type="text" value="<?php echo $row['EventName']?>" id="eventname" name="eventname" class="form-control" placeholder="Event Name" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="inputName">Speaker</label>
                  <input type="text" value="<?php echo $row['Speaker']?>" id="speaker" name="speaker" class="form-control" placeholder="Speaker Name" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="inputName">Position</label>
                  <input type="text" value="<?php echo $row['position']?>" id="position" name="position" class="form-control" placeholder="Position" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Event Date</label>
                  <input type="date" value="<?php echo $row['Date']?>" id="eventdate" min="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" name="eventdate" class="form-control" placeholder="Event Date" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Event Time</label>
                  <input type="text" value="<?php echo $row['Time']?>" id="eventtime" name="eventtime" class="form-control" placeholder="Event Time" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="inputName">Attendees</label>
                  <input type="text" value="<?php echo $row['attendees']?>" id="attendees" name="attendees" class="form-control" placeholder="Expected No. of Attendees" required minlength="1" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="inputName">Venue</label>
                  <input type="text" value="<?php echo $row['Venue']?>" id="venue" name="venue" class="form-control" placeholder="Venue" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Speakers Contact</label>
                  <input type="tel" value="<?php echo $row['contact']?>" id="speakercontact" name="speakercontact" class="form-control" placeholder="Speakers Contact" required minlength="11" maxlength="15">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Speakers Email</label>
                  <input type="email" value="<?php echo $row['email']?>" id="speakeremail" name="speakeremail" class="form-control" placeholder="Speakers Email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">To Change Images and Upload</label>
                  <div class="row">
                    <div class="col-4 form-group">
                      <label for="exampleInputEmail1">Featured Image File</label>
                      <p>
                        <a href="../images/<?php echo $row['featuredimage']?>" target="_blank">
                          <img src="../images/<?php echo $row['featuredimage']?>" width="100px" alt="" srcset="">
                        </a>
                      </p>
                    </div>
                    <div class="col-8 form-group">
                      <label for="exampleInputEmail1">Gallery</label>
                      <?php 
                      $arrimgs = array();
                      $imgs = $row['pictures'];
                      $arrimgs = explode(",", $imgs);
                      ?>
                      <div style="width:100%">
                        <?php
                        for($i=0; $i <= count($arrimgs)-1; $i++){
                          ?>
                          <a href="../images/<?php echo $arrimgs[$i]; ?>" target="_blank">
                            <img src="../images/<?php echo $arrimgs[$i]; ?>" width="100px" alt="" srcset="">
                          </a>
                          <?php
                        }                      
                        ?> 
                      </div>
                    </div>
                  </div> 
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="feature_image_edit" id="feature_image_edit" accept="image/*">
                      <input type="file" name="supporting_images_edit[]" id="supporting_images_edit" multiple accept="image/*">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Event Description</label>
                  <textarea id="eventdesc" name="eventdesc" class="form-control" rows="3" placeholder="Message" required minlength="10" maxlength="200"><?php echo $row['Description']?></textarea>
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" class="btn btn-primary" editeventid="<?php echo $eventid; ?> " id="btnupdateevent" value="Update">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
   
     
    <!-- /.content -->
