
<?php
if (isset($customer) && $customer->num_rows() > 0) {
    $row = $customer->row()
    ?>

    <form class="form-horizontal" action="<?php echo site_url('admin/points/add/' . $row->user_id) ?>" name="addcustomer" role="form" method="post">
        <div class="box-body">
            <div class="form-group">
                <label for="points" class="col-sm-4 control-label">Points Available</label>
                <div class="col-sm-6">
                    <input type="text" name="points_current" class="form-control" id="points" placeholder="Please Enter the Points" value="<?php echo $row->points; ?>" readonly="readonly">
                </div>
            </div>

            <div class="form-group">
                <label for="points" class="col-sm-4 control-label">Points To add</label>
                <div class="col-sm-6">
                    <input type="text" name="points_add" class="form-control" id="points_add" placeholder="Please Enter the Points">
                </div>
            </div>
            <div class="form-group">
                <label for="points" class="col-sm-4 control-label">Points To remove</label>
                <div class="col-sm-6">
                    <input type="text" name="points_remove" class="form-control" id="points_remove" placeholder="Please Enter the Points">
                </div>
            </div>
            <div class="form-group">
                <label for="points" class="col-sm-4 control-label">Current Total</label>
                <div class="col-sm-6">
                    <input type="text" name="points" class="form-control" id="points_total" placeholder="Please Enter the Points" value="<?php echo $row->points; ?>" readonly="readonly">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" class="form-control" value="Save">
            </div>
        </div>
    </form>          
    <script>
        $("#points_add").keyup(function() {
            do_math();
        });
        $("#points_add").keydown(function() {
            do_math();
        });
        $("#points_remove").keydown(function() {
            do_math();
        });
         $("#points_remove").keyup(function() {
            do_math();
        });
        function do_math() {

            var current_points = $("#points").val();
            var points_toadd = $("#points_add").val();
            var points_tore = $("#points_remove").val();

            var ta = parseInt(current_points) + parseInt(points_toadd);


            if (isNaN(ta) == true) {
                var ta = current_points;
            }
            //alert(points_tore);
            if (points_tore !== '' && points_tore <= ta) {
                var ta = parseInt(ta) - parseInt(points_tore);
            }
            $('#points_total').val(ta);
        }
    </script>

<?php } ?>
      
