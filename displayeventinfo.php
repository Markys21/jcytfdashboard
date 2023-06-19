<?php
if (isset($_POST['vieweventid'])) {
  $vieweventid = $_POST['vieweventid'];
  include 'connection.php';
  $sql = mysqli_query($con, "select * from tblevents where id='$vieweventid' order by id desc");
  $i = 1;
  while ($result = mysqli_fetch_array($sql)) {
    ?>



    <!-- featured image -->
    <div style="font-family: 'Times New Roman', Times, serif;" class="row">
      <div class="col-6">
        <img src="https://jcytfchurch.online/images/<?php
        echo $result['featuredimage'];
        ?>" class="product-image" alt="Product Image">
      </div>

      <div class="col-12 col-sm-6">
        <h3 class="my-3">Event Name: <span class="text-warning">
            <?php
            echo $result['EventName'];
            ?>
          </span></h3>

        <p>
          Date:<span class="text-warning">
            <?php
            echo $result['Date'];
            ?>
          </span>
        </p>
        <p>
          Time:<span class="text-warning">
            <?php
            echo $result['Time'];
            ?>
          </span>
        </p>
        <p>
          Attendees:<span class="text-warning">
            <?php
            echo $result['attendees'];
            ?>
          </span>
        </p>
        <p>
          Venue:<span class="text-warning">
            <?php
            echo $result['Venue'];
            ?>
          </span>
        </p>

        <hr>
        <h3 class="my-3">Speaker Name:<span class="text-warning">
            <?php
            echo $result['Speaker'];
            ?>
          </span></h3>
        <h4 class="my-3">Position:<span class="text-warning">
            <?php
            echo $result['position'];
            ?>
          </span>
        </h4>
        <p>Contact:<span class="text-warning">
            <?php
            echo $result['contact'];
            ?>
          </span>
        </p>
        <p>Email:<span class="text-warning">
            <?php
            echo $result['email'];
            ?>
          </span>
        </p>
        <hr>

        <h3 class="my-3">Organizer:<span class="text-warning">
            <?php
            $uid = $result['userid'];
            $search = mysqli_query($con, "select * from users where id='$uid'");
            $res = mysqli_fetch_array($search);
            echo $res['user_name'];
            ?>
          </span>
        </h3>
        <p>Day Created:<span class="text-warning">
            <?php
            echo $result['created_at'];
            ?>
          </span>
        </p>
        <p>Day Updated:<span class="text-warning">
            <?php
            echo $result['updated_at'];
            ?>
          </span>
        </p>


      </div>
    </div>
    <div class="row mt-1">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab"
            aria-controls="product-desc" aria-selected="true">Description</a>

        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        <div style="font-family: 'Times New Roman', Times, serif; font-size: 20px;" class="tab-pane fade show active"
          id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
          <?php
          echo $result['Description'];
 ?>
      </div>

    </div>
  </div>
  <h3 class="text-center">Gallery</h3>
  <div class="col-12 product-image-thumbs">
    <!-- Pictures -->

    
    <?php

    $arrimgs = array();
    if (empty($result['pictures'])) {
      
    } else {


      $imgs = $result['pictures'];
      $arrimgs = explode(",", $imgs);
      
      ?>
      <div style="width:100%">
        <?php
        for ($i = 0; $i <= count($arrimgs) - 1; $i++) {
          ?>


          <a href="https://jcytfchurch.online/images/<?php echo $arrimgs[$i]; ?>" target="_blank">

            <!-- imag -->
            <img src="https://jcytfchurch.online/images//<?php echo $arrimgs[$i]; ?>" width="100px" alt="" srcset="">

          </a>


          <?php
        }}
    }
    ?>
    </div>
  </div>
  </div>


  <?php
}
?>