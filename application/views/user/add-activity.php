<?php $this->load->view('templates/main_header') ?>
<?php $this->load->view('templates/main_sidebar') ?>
<?php $this->load->view('templates/main_topbar') ?>

<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0"><?= $title ?></h6>
        </div>
      </div>
      <!-- Card stats -->
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid">
  <div class="row mt--6">
    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-xl">
                <form action="<?= base_url('user/add_activity') ?>" method="post">
                  <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" class="form-control" name="destination" id="destination">
                    <small class="text-danger"><?= form_error('destination') ?></small>
                  </div>
                  <div class="form-group">
                    <label for="location">Location</label>
                    <textarea name="location" id="location" class="form-control" cols="30" rows="10"></textarea>
                    <small class="text-danger"><?= form_error('location') ?></small>
                  </div>
                  <div class="form-group">
                    <label for="temperature">Temperature</label>
                    <input type="number" name="temperature" id="temperature" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-md btn-success">Add</button>
                  <a href="<?= base_url('user/see_activity') ?>" class="btn btn-md btn-danger">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('templates/main_footer') ?>