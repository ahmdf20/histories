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
      <div class="text-center">
        <a href="<?= base_url('profile/change_password') ?>" class="btn btn-lg btn-warning"><i class="ni ni-key-25 mr-3"></i>Change Password</a>
      </div>

    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Edit profile </h3>
            </div>
          </div>
        </div>
        <div class="card-body">

          <?= $this->session->flashdata('message') ?>

          <?= form_open_multipart('profile') ?>
          <h6 class="heading-small text-muted mb-4">User information</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">Full Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="<?= $user['name'] ?>">
                  <small class="text-danger"><?= form_error('name') ?></small>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" class="form-control" value="<?= $user['email'] ?>" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg">
                <div class="form-group">
                  <label for="identity-code">Identity Code</label>
                  <input type="text" name="identity-code" id="identity-code" class="form-control" value="<?= $user['nik'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" id="image" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="mt-4 btn btn-success">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('templates/main_footer') ?>