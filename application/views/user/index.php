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
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col p-3">
                  <h5 class="card-title text-uppercase text-muted mb-0">My Activity</h5>
                  <span class="h2 font-weight-bold mb-0"><?= count($activity) ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-bar-32"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col p-3">
                  <h5 class="card-title text-uppercase text-muted mb-0">Last Month</h5>
                  <span class="h2 font-weight-bold mb-0"><?= count($month) ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-calendar-grid-58"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col p-3">
                  <h5 class="card-title text-uppercase text-muted mb-0">This Years</h5>
                  <span class="h2 font-weight-bold mb-0"><?= count($year) ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-world-2"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl">
      <div class="card">
        <div class="card-header bg-light border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="ml-3">Data Activity</h3>
            </div>
            <div class="col text-right">
              <a href="<?= base_url('user/see_activity') ?>" class="btn btn-lg btn-primary mr-3">See all</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row">
              <?php foreach ($activity as $key => $a) : if ($key == 6) break  ?>
                <div class="col-lg-4">
                  <div class="card border">
                    <div class="card-body">
                      <h2><?= $a->destination ?></h2>
                      <small class="text-muted float-right"><?= $a->checkin_date ?> <?= $a->checkin_time ?></small>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('templates/main_footer') ?>