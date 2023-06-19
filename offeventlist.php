<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List of Events</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List of Events</li>
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
                      <table id="example1"  class="table table-bordered table-striped">
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
                          include 'connection.php';
                          $sql1 = mysqli_query($con, "select * from tblevents where status = 1 and userid='$currentuserid' order by id desc");
                          $i = 1;
                          while($result = mysqli_fetch_array($sql1)){
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
                            if(mysqli_num_rows($search)>0){
                              $res = mysqli_fetch_array($search);
                              echo $res['user_name'];
                            }else{
                              echo "Organizer does not exists";
                            }
                            
                          ?>
                          </td>

                    
                          <!-- //button for Approve 1 -->
                          <td>            
                          <button href="?page=edit-event&eventid=<?php echo md5($result['id']);?>" 
                      vieweventid="<?php echo $result['id'];?>" 
                      type="button" 
                      class="btn btn-primary btn-sm btnviewevent" 
                      data-toggle="modal" data-target="#modal-xl">
                      <i class="fas fa-folder">
                      </i> View Event Details</button>
                      
                      
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