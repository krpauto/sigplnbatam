</div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="#" target="_blank">GIS PT PLN BATAM</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

  <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url() ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <!-- Page level custom scripts -->
   <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>