<section class="d-flex justify-content-center">
  <div class="register-box justify-content-center">
    <div class="register-logo">
      <a class="fw-bolder fs-1" href="#"><span class="text-warning">REGIS</span>TRATION</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register an account</p>

        <form>
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="text" name="unameadd" placeholder="User name" id="unameadd" class="form-control " required maxlength="16">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="tel"  name="contactadd" placeholder="Contact" id="contactadd" class="form-control " required maxlength="11">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="email" name="emailadd" class="form-control " id="emailadd" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="password"  name="passadd" class="form-control " id="passadd" placeholder="Password" required maxlength="16">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="password" name="repassadd" class="form-control " id="repassadd" placeholder="Retype Password" required maxlength="20">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <select class="form-control " id="roleidadd"  name="roleidadd" required>
              <option></option>
              <option value="admin">Admin</option>
              <option value="officer">Officer</option>
            </select>
          </div>
          
          <div class="row">
            <div class="col">
              <button type="button" id="BTNREGISTER" class="btn btn-warning btn-block ">Register</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
 <script src="./plugins/jquery/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
    $("#BTNREGISTER").click(function(e) {
        e.preventDefault();
        var unameadd = $("#unameadd").val();
        var contactadd = $("#contactadd").val();
        var emailadd = $("#emailadd").val();
        var passadd = $("#passadd").val();
        var repassadd = $("#repassadd").val();
        var roleidadd = $("#roleidadd").val();
        
        if (unameadd === '') {
            showAlert('Username Required');
        } else if (contactadd === '') {
            showAlert('Contact Required');
        } else if (emailadd === '') {
            showAlert('Email Required');
        } else if (!emailadd.endsWith('@gmail.com')) {
        showAlert('Email must be a valid Gmail address');
        } else if (passadd === '') {
            showAlert('Password Required');
        } else if (repassadd === '') {
            showAlert('Retype Password Required');
        } else if (repassadd !== passadd) {
            showAlert('Password mismatched');
        } else if (roleidadd === '') {
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
                    registerUser(unameadd, contactadd, emailadd, passadd, repassadd, roleidadd, password);
                }
            });
        }
    });
});



function registerUser(unameadd, contactadd, emailadd, passadd, repassadd, roleidadd, password) {
    if (password === '') {
        showAlert('Password Required');
    } else {
        $.ajax({
            url: 'signup-check.php',
            method: 'POST',
            dataType: 'json',
            data: {
                unameadd: unameadd,
                contactadd: contactadd,
                emailadd: emailadd,
                passadd: passadd,
                repassadd: repassadd,
                roleidadd: roleidadd,
                password: password,
                id: "<?php echo $id; ?>"
            },
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        text: 'Registered successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                         // Show success alert after password is correct
                        window.location.href = '?page=list-of-accounts'; // Redirect to desired page
                    });
                } else if (response.status === 'error') {
                    showAlert(response.message);
                }
            },
            error: function() {
                showAlert('Something went wrong. Please try again later.');
            }
        });
    }
}
</script>