<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Events</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Add Events</li>
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

            <form id="imageUploadForm" onsubmit="uploadImages()" enctype="multipart/form-data">
              <div class="m-5 card-body">
                <div class="form-group">
                  <label for="inputName">Event Name</label>
                  <input type="text" id="eventname" name="eventname" class="form-control" placeholder="Event Name" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="inputName">Speaker</label>
                  <input type="text" id="speaker" name="speaker" class="form-control" placeholder="Speaker Name" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="inputName">Position</label>
                  <input type="text" id="position" name="position" class="form-control" placeholder="Position" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Event Date</label>
                  <input type="date" id="eventdate" name="eventdate" min="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" class="form-control" id="exampleInputPassword1" placeholder="Event Date" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Event Time</label>
                  <input type="text" id="eventtime" name="eventtime" class="form-control" id="exampleInputPassword1" placeholder="Event Time" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="inputName">Attendees</label>
                  <input type="text" id="attendees" name="attendees" class="form-control" placeholder="Expected No. of Attendees" required minlength="1" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="inputName">Venue</label>
                  <input type="text" id="venue" name="venue" class="form-control" placeholder="Venue" required minlength="3" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Speakers Contact</label>
                  <input type="tel" id="speakercontact" name="speakercontact" class="form-control" placeholder="Speakers Contact" required minlength="11" maxlength="15">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Speakers Email</label>
                  <input type="email" id="speakeremail" name="speakeremail" class="form-control" placeholder="Speakers Email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group row ">
                    <div class="col-md-6 col-sm-6 mt-4 mb-5 custom-file ">
                      <div class="flex-column">
                        <div class="mb-4">
                          <h4>Featured Image</h4>
                        </div>
                        <input type="file" name="feature_image" id="feature_image" accept="image/*">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="flex-column">
                        <div class="mb-4">
                          <h4>Gallery</h4>
                        </div>
                        <input type="file" name="supporting_images[]" id="supporting_images" multiple accept="image/*">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group mt-5">
                  <label for="inputDescription">Event Description</label>
                  <textarea id="eventdesc" name="eventdesc" class="form-control" rows="3" placeholder="Message" required minlength="10" maxlength="200"></textarea>
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" class="btn btn-primary " value="Submit">
              </div>
            </form>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
<!-- /.content -->
