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
    <div class="col-xl">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h5 class="h3 mb-0">Table <?= $title ?></h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-resvonsive">
            <table class="table table-hover">
              <thead class="bg-light">
                <tr>
                  <td>#</td>
                  <td>Name</td>
                  <td>Created At</td>
                  <td>Update At</td>
                  <td>Status</td>
                  <td>More</td>
                </tr>
              </thead>
              <tbody id="data-users">

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
    const canvas = document.getElementById('data-users')

    window.addEventListener('load', () => {
      load_data()
    })

    function load_data() {
      $.ajax({
        url: "<?= base_url('data/data_users') ?>",
        success: (res) => {
          canvas.innerHTML = res
        },
        error: (err) => {
          console.log(err)
        }
      })
    }
  </script>

  <?php $this->load->view('templates/main_footer') ?>