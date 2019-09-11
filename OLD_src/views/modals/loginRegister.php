<!-- MODAL: LOGIN/REGISTER FORM -->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-1" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
              Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
              Register
            </a>
          </li>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
            <!--LOGIN FORM -->
            <div class="modal-body mb-1">
              <form id="login-form" method="POST">
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-envelope prefix"></i>
                  <input id="login-email" class="form-control form-control-sm validate" name="login-email" type="text" placeholder="Email" required>
                  <?php echo $account->getError(Constants::$loginFailed); ?>
                </div>
                <div class="md-form form-sm mb-4">
                  <i class="fas fa-lock prefix"></i>
                  <input class="form-control form-control-sm validate" name="login-password" type="password" placeholder="Password" required>
                </div>
                <div class="text-center mt-2">
                  <button id="login-button" name="login-button" class="btn btn-info" type="submit">Log in
                    <i class="fas fa-sign-in ml-1"></i>
                  </button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <div class="options text-center text-md-right mt-1">
                <p><a href="#" class="blue-text">Forgot Password?</a></p>
              </div>
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>
            <!-- \.LOGIN FORM -->
          </div>
          <!--/.Panel 7-->
          <!--Panel 8-->
          <div class="tab-pane fade" id="panel8" role="tabpanel">
            <!-- REGISTER FORM -->
            <div class="modal-body">
              <form id="register-form" method="POST">
                <!-- role -->
                <div class="md-form form-sm mb-5">
                  <div class="form-check form-check-inline">
                    Student<input type="radio" class="form-check-input" name="role" value="student" />
                    Teacher<input type="radio" class="form-check-input" name="role" value="teacher" />
                  </div>
                </div>
                <!-- \.role -->
                <!-- email -->
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-envelope prefix"></i>
                  <input class="form-control form-control-sm validate" name="email" type="text" placeholder="Email" required>
                  <?php echo $account->getError(Constants::$emailInvalid); ?>
                  <?php echo $account->getError(Constants::$emailTaken); ?>
                </div>
                <!-- \.email -->
                <!-- first name -->
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-user prefix"></i>
                  <input class="form-control form-control-sm validate" name="first-name" type="text" placeholder="First name" required>
                  <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                </div>
                <!-- \.first name -->
                <!-- last name -->
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-user prefix"></i>
                  <input class="form-control form-control-sm validate" name="last-name" type="text" placeholder="Last name" required>
                  <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                </div>
                <!-- \.last name -->
                <!-- password -->
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-lock prefix"></i>
                  <input class="form-control form-control-sm validate" name="password" type="password" placeholder="Password" required>
                  <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                  <?php echo $account->getError(Constants::$passwordCharacters); ?>
                </div>
                <!-- \.password -->
                <!-- confirm password -->
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-lock prefix"></i>
                  <input class="form-control form-control-sm validate" name="confirm-password" type="password" placeholder="Confirm password" required>
                  <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                </div>
                <!-- \.confirm password -->
                <div class="text-center form-sm mt-2">
                  <button name="register-button" class="btn btn-info" type="submit">Sign up
                    <i class="fas fa-sign-in ml-1"></i>
                  </button>
                </div>
              </form>
            </div>
            <!-- \.REGISTER FORM -->
            <!--Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!--/.Panel 8-->
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- \.MODAL: LOGIN/REGISTER FORM -->