<?php $this->load->view('templates/main_header') ?>
<?php $this->load->view('templates/main_sidebar') ?>
<?php $this->load->view('templates/main_topbar') ?>

<!-- Header -->
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(<?= base_url() ?>assets/img/theme/img-1-1000x600.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-7 col-md-10">
        <h1 class="display-2 text-white">Hello <?= $user['name'] ?></h1>
        <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-4 order-xl-2">
      <div class="card card-profile">
        <img src="<?= base_url() ?>assets/img/theme/background-wp.jpg" alt="Image placeholder" class="card-img-top">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a href="#">
                <img src="<?= base_url() ?>assets/img/profiles/<?= $user['image'] ?>" class="rounded-circle" alt="Image of <?= $user['name'] ?>">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center">
              </div>
            </div>
          </div>
          <div class="text-center">
            <h5 class="h3">
              <?= $user['name'] ?><span class="font-weight-light"></span>
            </h5>
            <div class="h5 mt-4">
              <h5 class="text-primary"><?= $user['email'] ?></h5>
            </div>
            <div>
              <small class="text-muted">Joining from <?= $user['create_at'] ?></small>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Change Password</h3>
            </div>
          </div>
        </div>
        <div class="card-body">

          <?= $this->session->flashdata('message') ?>

          <form action="<?= base_url('profile/put_new_password') ?>" method="POST" id="form-change-password">
            <input type="hidden" name="id" id="id" value="<?= $user['id'] ?>">
            <h6 class="heading-small text-muted mb-4">Verification Old Password</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg">
                  <div class="form-group">
                    <label for="identity-code">Old Password</label>
                    <input type="password" name="old-password" id="old-password" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <h6 class="heading-small text-muted mb-4">New Password</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg">
                  <div class="form-group">
                    <label for="identity-code">New Password</label>
                    <input type="password" name="new-password" id="new-password" class="form-control" required minlength="3">
                  </div>
                  <div class="form-group">
                    <label for="identity-code">Repeat New Password</label>
                    <input type="password" name="repeat-new-password" id="repeat-new-password" class="form-control" required>
                    <small class="text-danger" id="error-repeat"></small>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="mt-4 btn btn-success">Change</button>
            <a href="<?= base_url('profile') ?>" class="btn btn-danger mt-4">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    const formChangePassword = document.getElementById('form-change-password')
    formChangePassword.addEventListener('submit', (e) => {
      e.preventDefault()
      const newPass = document.getElementById('new-password').value
      const repeatPass = document.getElementById('repeat-new-password').value
      if (repeatPass != newPass) {
        document.getElementById('error-repeat').innerText = "Password didnt match!"
      } else {
        formChangePassword.submit()
      }
    });
  </script>

  <?php $this->load->view('templates/main_footer') ?>