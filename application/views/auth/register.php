<?php $this->load->view('templates/auth_header') ?>
<?php $this->load->view('templates/auth_navbar') ?>

<!-- Main content -->
<div class="main-content">
  <!-- Header -->
  <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
      <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 col-md-8 px-5">
            <h1 class="text-white">Create an account</h1>
            <p class="text-lead text-white">Let's start it with creating new account!</p>
          </div>
        </div>
      </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </div>
  <!-- Page content -->
  <div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card bg-secondary border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <small>Sign up</small>
            </div>
            <form action="<?= base_url('auth/register') ?>" method="POST">
              <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" id="name" type="text" value="<?= set_value('name') ?>">
                <small class="text-danger"><?= form_error('name') ?></small>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" name="email" id="email" type="email" value="<?= set_value('email') ?>">
                <small class="text-danger"><?= form_error('email') ?></small>
              </div>
              <div class="form-group">
                <label for="identity-code">Identity Code</label>
                <input class="form-control" name="identity-code" id="identity-code" type="text" value="<?= set_value('identity-code') ?>">
                <small class="text-danger"><?= form_error('identity-code') ?></small>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" name="password" id="password" type="password">
                <small class="text-danger"><?= form_error('password') ?></small>
              </div>
              <div class="form-group">
                <label for="password">Repeat Password</label>
                <input class="form-control" name="repeat-password" id="repeat-password" type="password">
                <small class="text-danger"><?= form_error('repeat-password') ?></small>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Create account</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('templates/auth_footer') ?>