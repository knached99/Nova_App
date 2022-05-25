<div class="page-holder bg-gray-100">
    <footer class="footer mt-auto bg-white shadow align-self-end py-3 px-xl-5 w-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center text-md-start fw-bold">
                    <p class="mb-2 mb-md-0 fw-bold">Nova Music by East Rock Entertainment. Copyright &copy; <?php echo DATE('Y');?></p>
                </div>
                <div class="col-md-6 text-center text-md-end text-gray-400">
                    <p class="mb-0">Alpha 0.0.1</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="<?php echo base_url();?>vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url();?>js/all.js"></script>
<script src="<?php echo base_url();?>js/all.min.js"></script>
<script src="<?php echo base_url();?>js/brands.js"></script>
<script src="<?php echo base_url();?>js/conflict-detection.js"></script>
<script src="<?php echo base_url();?>js/conflict-detection.min.js"></script>
<script src="<?php echo base_url();?>js/fontawesome.js"></script>
<script src="<?php echo base_url();?>js/fontawesome.min.js"></script>
<script src="<?php echo base_url();?>js/regular.js"></script>
<script src="<?php echo base_url();?>js/regular.min.js"></script>
<script src="<?php echo base_url();?>js/solid.js"></script>
<script src="<?php echo base_url();?>js/solid.min.js"></script>
<script src="<?php echo base_url();?>js/v4-shims.js"></script>
<script src="<?php echo base_url();?>js/v4.shims.min.js"></script>
<script src="<?php echo base_url();?>js/charts-defaults.js"></script>
<script src="<?php echo base_url();?>js/charts-home.js"></script>
<script src="<?php echo base_url();?>js/theme.js"></script>
<script src="<?php echo base_url();?>vendor/prismjs/prism.js"></script>
<script src="<?php echo base_url();?>vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>
<script src="<?php echo base_url();?>vendor/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
<script src="<?php echo base_url();?>vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
<script src="<?php echo base_url();?>vendor/dropzone/dropzone.js"></script>
<script src="<?php echo base_url();?>js/forms-dropzone.js">    </script>
<script src="<?php echo base_url();?>vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="<?php echo base_url();?>vendor/nouislider/nouislider.min.js"></script>
    <script src="<?php echo base_url();?>vendor/vanillajs-datepicker/js/datepicker-full.min.js"></script>
    <script src="<?php echo base_url();?>js/forms-advanced.js"></script>

<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
// Optional
Prism.plugins.NormalizeWhitespace.setDefaults({
'remove-trailing': true,
'remove-indent': true,
'left-trim': true,
'right-trim': true,
});
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 // datatables logic
$(function (){
  $('#artists').DataTable({
    scrollY: 400,
    processing: true,
    paging:true,
    searching: true,
    responsive: true,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
     color: 'white',
     stateSave: true,
     /*
     s stores state information such as pagination position,
     display length, filtering and sorting.
     When stateSave is active and the end user reloads the
     page the table's state will be altered
     to match what they had previously set up
      */
  });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
    <!-- CMS Category JS-->
    <script src="js/e-commerce-customers.js">    </script>
