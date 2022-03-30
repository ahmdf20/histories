</div>
</div>

<!-- My Script -->
<script>
  window.addEventListener('load', () => {
    const canvas = document.getElementById('data-sidebar')
    let title = "<?= $title ?>"
    $.ajax({
      url: "<?= base_url('component/sidebar') ?>",
      method: "POST",
      data: {
        title: title
      },
      success: (result) => {
        canvas.innerHTML = result
      },
      error: (error) => {
        console.log(error)
      }

    })
  })
</script>

<!-- Argon Scripts -->
<!-- Core -->
<script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="<?= base_url() ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="<?= base_url() ?>assets/js/argon.js?v=1.2.0"></script>
</body>

</html>