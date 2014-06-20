<?php $this->load->view('admin/slice/header'); ?>

<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <?php if (isset($customer) && $customer->num_rows() > 0) {
                $row = $customer->row()
                ?>


                <h3 class="box-title">Edit View</h3>    
                <div class="pull-right box-tools">
                    <a href="<?php echo site_url('admin/customers/'); ?>"> <button title="" data-toggle="tooltip" class="btn btn-primary btn-sm refresh-btn" data-original-title="Back to list"><i class="fa fa-list"></i></button></a>
                </div>
            </div>
            <div class="col-xs-12">

                <form class="form-horizontal" name="addcustomer" role="form" method="post">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="work_starting_date" class="col-sm-2 control-label">Work Starting Date</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" id="datemask" type="text" name="work_starting_date" maxlength="25" value="<?php  echo date("d-m-Y",strtotime($row->work_starting_date)); ?><?php echo set_value('work_starting_date'); ?>"   autocomplete="off"/>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rate_of_work" class="col-sm-2 control-label">Rate of Work</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="rate_of_work" type="text" name="rate_of_work" maxlength="25" value="<?php echo set_value('rate_of_work'); ?><?php  echo $row->rate_of_work; ?>"  autocomplete="off" />

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="total_measurement" class="col-sm-2 control-label">Total Measurement</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="total_measurement" type="text" name="total_measurement" maxlength="25" value="<?php echo set_value('total_measurement'); ?><?php  echo $row->total_measurement; ?>"   autocomplete="off"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="total_amount" class="col-sm-2 control-label">Total Amount</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="total_amount" type="text" name="total_amount" maxlength="15" value="<?php echo set_value('total_amount'); ?><?php  echo $row->total_amount; ?>" readonly  />

                            </div>
                        </div>      

                        <div class="form-group">
                            <label for="advance" class="col-sm-2 control-label">Advance</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="advance_amount" type="text" name="advance_amount" maxlength="10" value="<?php echo set_value('advance_amount'); ?><?php  echo $row->advance_amount; ?>"   autocomplete="off"/>

                            </div>
                        </div>                                     

                        <div class="form-group">
                            <label for="balance_amount" class="col-sm-2 control-label">Balance Amount</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="balance_amount" type="text" name="balance_amount" maxlength="250" value="<?php echo set_value('balance_amount'); ?><?php  echo $row->balance_amount; ?>" readonly/>
    <?php echo form_error('balance_amount'); ?>
                            </div>
                        </div>                                     

                        <div class="form-group">
                            <label for="details_of_work" class="col-sm-2 control-label">Details of Work</label>
                            <div class="col-sm-6">
                                <textarea class="form-control"  name="details_of_work"><?php echo set_value('details_of_work'); ?><?php  echo $row->details_of_work; ?></textarea>
    <?php echo form_error('details_of_work'); ?>
                            </div>
                        </div>                                     

                        <div class="form-group">
                            <label for="drawing_of_work" class="col-sm-2 control-label">Drawing of Work</label>
                            <div class="col-sm-6">
                                <input type="file" name="drawing_of_work" id="drawing_of_work" class="fileupload-buttonbar">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">

                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?php echo site_url('admin/works/'); ?>"> <button type="button" class="btn btn-default">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </form>          


<?php } else { ?>


                <h3 class="box-title">Add View</h3>    
                <div class="pull-right box-tools">
                    <a href="<?php echo site_url('admin/customers/'); ?>"> <button title="" data-toggle="tooltip" class="btn btn-primary btn-sm refresh-btn" data-original-title="Back to list"><i class="fa fa-list"></i></button></a>
                </div>
            </div>
            <div class="col-xs-12">

                <form class="form-horizontal" name="addcustomer" role="form" method="post">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="work_starting_date" class="col-sm-2 control-label">Work Starting Date</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" id="datemask" type="text" name="work_starting_date" maxlength="25" value="<?php echo set_value('work_starting_date'); ?>"   autocomplete="off"/>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rate_of_work" class="col-sm-2 control-label">Rate of Work</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="rate_of_work" type="text" name="rate_of_work" maxlength="25" value="<?php echo set_value('rate_of_work'); ?>"  autocomplete="off" />

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="total_measurement" class="col-sm-2 control-label">Total Measurement</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="total_measurement" type="text" name="total_measurement" maxlength="25" value="<?php echo set_value('total_measurement'); ?>"   autocomplete="off"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="total_amount" class="col-sm-2 control-label">Total Amount</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="total_amount" type="text" name="total_amount" maxlength="15" value="<?php echo set_value('total_amount'); ?>" readonly  />

                            </div>
                        </div>      

                        <div class="form-group">
                            <label for="advance" class="col-sm-2 control-label">Advance</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="advance_amount" type="text" name="advance_amount" maxlength="10" value="<?php echo set_value('advance_amount'); ?>"   autocomplete="off"/>

                            </div>
                        </div>                                     

                        <div class="form-group">
                            <label for="balance_amount" class="col-sm-2 control-label">Balance Amount</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="balance_amount" type="text" name="balance_amount" maxlength="250" value="<?php echo set_value('balance_amount'); ?>" readonly/>
    <?php echo form_error('balance_amount'); ?>
                            </div>
                        </div>                                     

                        <div class="form-group">
                            <label for="details_of_work" class="col-sm-2 control-label">Details of Work</label>
                            <div class="col-sm-6">
                                <textarea class="form-control"  name="details_of_work"><?php echo set_value('details_of_work'); ?></textarea>
    <?php echo form_error('details_of_work'); ?>
                            </div>
                        </div>                                     

                        <div class="form-group">
                            <label for="drawing_of_work" class="col-sm-2 control-label">Drawing of Work</label>
                            <div class="col-sm-6">
                                <input type="file" name="drawing_of_work" id="drawing_of_work" class="fileupload-buttonbar">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">

                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?php echo site_url('admin/customers/'); ?>"> <button type="button" class="btn btn-default">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </form>
<?php } ?>               
        </div>
        <div class="clearfix"></div>
    </div>
</div>      

<script language="javascript" type="text/javascript">
    function randomString() {
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var string_length = 8;
        var randomstring = '';
        for (var i = 0; i < string_length; i++) {
            var rnum = Math.floor(Math.random() * chars.length);
            randomstring += chars.substring(rnum, rnum + 1);
        }
        document.addcustomer.password.value = randomstring;
    }
</script>

<?php $this->load->view('admin/slice/footer'); ?>
