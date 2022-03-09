<?php $this->load->view('templates/main_header') ?>
<?php $this->load->view('templates/main_sidebar') ?>
<?php $this->load->view('templates/main_topbar') ?>
<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">

    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row py-4">
    <div class="col-xl-6">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h5 class="h3 mb-0">Table Menu's</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-resvonsive">
            <table class="table table-hover">
              <thead class="bg-light">
                <tr>
                  <td>#</td>
                  <td>Menu</td>
                  <td>More</td>
                </tr>
              </thead>
              <tbody id="data-menu">

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h5 class="h3 mb-0">Table User Access Menu's</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-resvonsive">
            <table class="table table-hover">
              <thead class="bg-light">
                <tr>
                  <td>#</td>
                  <td>Menu</td>
                  <td>Role</td>
                  <td>More</td>
                </tr>
              </thead>
              <tbody id="data-access-menu">

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="row py-3">
    <div class="col-xl">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h5 class="h3 mb-0">Table Sub Menu's</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-resvonsive">
            <table class="table table-hover">
              <thead class="bg-light">
                <tr>
                  <td>#</td>
                  <td>Menu</td>
                  <td>Title</td>
                  <td>Url</td>
                  <td>Icon</td>
                  <td>Active</td>
                  <td>More</td>
                </tr>
              </thead>
              <tbody id="data-sub-menu">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const canvasMenu = document.getElementById('data-menu')
    const canvasAccessMenu = document.getElementById('data-access-menu')
    const canvasSubMenu = document.getElementById('data-sub-menu')

    window.addEventListener('load', () => {
      load_data_menu()
      load_data_access_menu()
      load_data_sub_menu()
    })

    const load_data_menu = () => {
      $.ajax({
        url: "<?= base_url('data/data_menus') ?>",
        success: (res) => {
          canvasMenu.innerHTML = res
        },
        error: (err) => {
          console.log(err)
        }
      })
    }

    const load_data_access_menu = () => {
      $.ajax({
        url: "<?= base_url('data/data_access_menus') ?>",
        success: (res) => {
          canvasAccessMenu.innerHTML = res
        },
        error: (err) => {
          console.log(err)
        }
      })
    }

    const load_data_sub_menu = () => {
      $.ajax({
        url: "<?= base_url('data/data_sub_menus') ?>",
        success: (res) => {
          canvasSubMenu.innerHTML = res
        },
        error: (err) => {
          console.log(err)
        }
      })
    }
  </script>

  <?php $this->load->view('templates/main_footer') ?>