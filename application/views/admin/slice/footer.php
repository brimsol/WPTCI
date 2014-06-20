
</section>
<!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('/assets/admin/'); ?>/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('/assets/admin/'); ?>/js/AdminLTE/app.js" type="text/javascript"></script>
<!-- Data table -->
<script src="<?php echo base_url('/assets/admin/'); ?>/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/admin/'); ?>/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- Input Mask -->
<script src="<?php echo base_url('/assets/admin/'); ?>/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/admin/'); ?>/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/admin/'); ?>/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('/assets/admin/'); ?>/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
        $("#customer_list").dataTable({'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['nosort']
                }]})

    });
</script>
</body>
</html>