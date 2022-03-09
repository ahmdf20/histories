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
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl">
      <div class="card">
        <div class="card-body">
          <div class="container">
            <div class="row mb-3">
              <div class="col-xl">
                <!-- Search form -->
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                  <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                      <div class="input-group-prepend">
                        <button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
                      </div>
                      <input class="form-control" placeholder="Search" type="text" id="search">
                    </div>
                  </div>
                  <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </form>
              </div>
              <div class="col-xl text-right align-items-center">
                <a href="<?= base_url('user/add_activity') ?>" class="btn btn-sm btn-success">Add</a>
              </div>
            </div>

            <?= $this->session->flashdata('message') ?>

            <div class="row">
              <div class="col-xl">
                <table class="table table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>Destination</th>
                      <th>Timestamp</th>
                    </tr>
                  </thead>
                  <tbody id="data-activity">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    window.addEventListener('load', () => {
      loadData()
    })
    const loadData = (query) => {
      const tableData = document.getElementById('data-activity')
      let id = "<?= $this->session->userdata('id') ?>"
      $.ajax({
        url: "<?= base_url('data/data_activity') ?>",
        method: "POST",
        data: {
          query: query,
          id: id
        },
        success: (res) => {
          tableData.innerHTML = res
        },
        error: (err) => {
          console.log(err)
        }
      })
    }

    const formSearch = document.getElementById('navbar-search-main')
    formSearch.addEventListener('submit', (e) => {
      e.preventDefault()
      let search = document.getElementById('search').value
      if (search != '') {
        loadData(search)
      } else {
        loadData()
      }
    })
  </script>

  <?php $this->load->view('templates/main_footer') ?>