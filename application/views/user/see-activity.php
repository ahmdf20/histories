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
          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-export" onclick="handleSubmitPrintButton('month')">Print By Month</button>
          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-export" onclick="handleSubmitPrintButton('year')">Print By Year</button>
          <a href="<?= base_url('user/add_activity') ?>" class="btn btn-sm btn-success">Add</a>
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

            <?= $this->session->flashdata('message') ?>

            <div class="row">
              <div class="col-xl">
                <div id="data-table">
                  <table class="table table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                        <th>Destination</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Temperature</th>
                        <th>Duration</th>
                        <th>Options</th>
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
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal-export" tabindex="-1" aria-labelledby="modal-export" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title-export"></h5>
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body" id="modal-body">

        </div>
        <div class="modal-footer" id="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-md btn-danger" id="btn-export">Export</button>
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

    const handleSubmitPrintButton = (data) => {
      const btnExport = document.getElementById('btn-export')
      document.getElementById('title-export').innerText = `Print by ${data}`
      document.getElementById('modal-body').innerHTML = ``
      btnExport.removeAttribute('data-export')
      if (data == 'month') {
        const monthArr = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
        document.getElementById('modal-body').innerHTML = `
        <div class='form-group mb-3'>
        <label for='data-filter'>Filter By Month</label>
        <select class='form-control' name='data-filter' id='data-filter'>
        ${monthArr.map((month, id) => {
          return (`<option value='${id + 1}'>${month}</option>`)
        })}
        </select>
        </div>
        `
        btnExport.setAttribute('onclick', "handleSubmitExportButton('month')")
      } else {
        const year = new Date()
        let currentYear = year.getFullYear()
        let startYear = year.getFullYear() - 5
        document.getElementById('modal-body').innerHTML = `
        <div class='form-group'>
        <label for='data-filter'>Filter By Year</label>
        <select class='form-control' name='data-filter' id='data-filter'>
        <?php
        $startYear = date('Y', strtotime('-5 year'));
        $currentYear = date('Y');
        for ($currentYear; $currentYear >= $startYear; $currentYear--) {
          echo "<option value=" . $currentYear . "> " . $currentYear . "</option>";
        }
        ?>
          </select>
          </div>`
        btnExport.setAttribute('onclick', "handleSubmitExportButton('year')")
      }
    }

    const handleSubmitExportButton = (data) => {
      let query = document.getElementById('data-filter').value
      getDataForExport(query, data)
    }

    const getDataForExport = (query, option) => {
      $.ajax({
        url: "<?= base_url('Export/get_data_for_export') ?>",
        method: "POST",
        data: {
          query: query,
          option: option,
        },
        success: (result) => {
          Export(result)
        },
        error: (error) => console.warn(error)
      })
    }

    const Export = (data) => {
      let currentWrapper = document.body.innerHTML
      document.body.innerHTML = `
      <div class='container'>
        <div class='row mt-5 p-3'>
          <div class='col-lg'>
            <h1 class='text-danger text-center'>Export Data</h1>

            <hr>

            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Destination</th>
                  <th>Timestamp</th>
                  <th>Temperature</th>
                </tr>
              </thead>
              <tbody>
                ${data}
              </tbody>
            </table>
          </div>
        </div>
      </div>
      `
      window.print()
      document.body.innerHTML = currentWrapper
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