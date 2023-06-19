<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Your Request Events</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Your Request Events</li>
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
                    <th>Event Name</th>
    
                    <th>Attendees</th>
                    <th>Venue</th>
                    <th>Date of Event</th>
                    <th>Time of Event</th>
                    <th>Organizer</th>
                   
                    <th>Action</th>
                

                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php

                    if(isset($_SESSION['offid'])){
                      $currentuserid = $_SESSION['offid'];
                    }
                    
                    include '../connection.php';
                    $sql = mysqli_query($con, 
                    "select * from tblevents where status = 3 and userid='$currentuserid' order by id desc");                    
                    
                    // include '../connection.php';
                    // $sql = mysqli_query($con, "select * from tblevents where status = 3 order by id desc");
                    $i = 1;
                    while($result = mysqli_fetch_array($sql)){
                      ?>
                    <tr>
                    <td>
                      <?php
                    echo $i .'.'; $i++;
                    ?>
                    </td>

                    <td>
                      <?php
                    echo $result['EventName'];
                    ?>
                    </td>

                  
                    <td>
                            <?php
                          echo $result['attendees'];
                          ?>
                          </td>

                    <td>
                      <?php
                    echo $result['Venue'];
                    ?>
                    </td>
                    
                    <td>
                    <?php
                    echo $result['Date'];
                    ?>
                    </td>
                    <td>
                    <?php
                    echo $result['Time'];
                    ?>
                    </td>
                   
                    <td>
                    <?php
                     $uid = $result['userid'];
                      $search = mysqli_query($con, "select * from users where id='$uid'");
                      $res = mysqli_fetch_array($search);
                      echo $res['user_name'];
                    ?>
                    </td>
                    <td>
                    
                    <button href="?page=edit-event&eventid=<?php echo md5($result['id']);?>" 
                      vieweventid="<?php echo $result['id'];?>" 
                      type="button" 
                      class="btn btn-primary btn-sm btnviewevent" 
                      data-toggle="modal" data-target="#modal-xl">
                      <i class="fas fa-folder">
                      </i> View Event Details</button>
                
                    <a href="?page=off-edit-event&eventid=<?php echo md5($result['id']);?>" 
                      editeventid="<?php echo $result['id'];?>" 
                      class="btn btn-info btneditrequestevent btn-sm">
                      <i class="fas fa-pencil-alt">
                                    </i>
                                     Edit Event</a>

                   

             <!-- modal -->
             
                <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reasons</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
              <p>Description<span style="font-family: &quot;Courier New&quot;;">﻿</span></p>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                <p>laman</p>
                </div>
                <!--/.direct-chat-messages-->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form id="imageUploadForm" enctype="multipart/form-data">
                  <div class="input-group">
                  <input type="text" id="reason" name="reason" class="form-control" placeholder="Type Message ..." required>
                  
                    <span class="input-group-append">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                <!-- modal -->             
                                    <?php
                                    }?>     
                            
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
                
        <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Event Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="eventinfobody">
            
            
            <section class="content">

              <div class="card card-solid">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-sm-6">
                 
                  </div>
                  </div>
                </div>
             
              </div>
            

            </section>
    <!-- /.content -->
            <div class="modal-footer justify-content-between">
           
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 