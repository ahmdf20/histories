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
            <h1 class="text-white">Your Histories!</h1>
            <p class="text-lead text-white">Checkout all your histories activities!</p>

            <?= $this->session->flashdata('message'); ?>

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
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <small>Sign in to start your session!</small>
            </div>
            <form action="<?= base_url('auth/credential') ?>" method="POST">
              <div class="form-group mb-3">
                <label for="email">Email</label>
                <input class="form-control" name="email" id="email" type="email" value="<?= set_value('email') ?>">
              </div>
              <div class="form-group">
                <label for="email">Password</label>
                <input class="form-control" name="password" id="password" type="password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Sign in</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <a href="#" class="text-light"><small>Forgot password?</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="<?= base_url('auth/register') ?>" class="text-light"><small>Create new account</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('templates/auth_footer') ?>