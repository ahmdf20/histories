<?php $this->load->view('templates/main_header') ?>
<?php $this->load->view('templates/main_sidebar') ?>
<?php $this->load->view('templates/main_topbar') ?>
<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row py-4">
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col p-3">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Users</h5>
                  <span class="h2 font-weight-bold mb-0"><?= count($users) ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-single-02"></i>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Total History</h5>
                  <span class="h2 font-weight-bold mb-0"><?= count($histories) ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-single-copy-04"></i>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Histories This Month</h5>
                  <span class="h2 font-weight-bold mb-0"><?= count($month_history) ?></span>
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
                  <h5 class="card-title text-uppercase text-muted mb-0">Histories This Year</h5>
                  <span class="h2 font-weight-bold mb-0"><?= count($year_history) ?></span>
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
      <div class="card bg-default">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
              <h5 class="h3 text-white mb-0">History Activity</h5>
            </div>
            <div class="col">
              <ul class="nav nav-pills justify-content-end">
                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                    <span class="d-none d-md-block">Month</span>
                    <span class="d-md-none">M</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                    <span class="d-none d-md-block">Week</span>
                    <span class="d-md-none">W</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
            <!-- Chart wrapper -->
            <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('templates/main_footer') ?>