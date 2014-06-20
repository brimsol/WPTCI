<?php $this->load->view('admin/slice/header'); ?>

<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <?php if (isset($customer) && $customer->num_rows() > 0) {
                $row = $customer->row() ?>


                <h3 class="box-title">Edit View</h3>    
                <div class="pull-right box-tools">
                    <a href="<?php echo site_url('admin/customers/'); ?>"> <button title="" data-toggle="tooltip" class="btn btn-primary btn-sm refresh-btn" data-original-title="Back to list"><i class="fa fa-list"></i></button></a>
                </div>
            </div>
            <div class="col-xs-12">

                <form class="form-horizontal" name="addcustomer" role="form" method="post">
                    <div class="box-body">

                       <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Username *</label>
                            <div class="col-sm-6">
                                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Please Enter an Username" value="<?php echo $row->user_name;?>" readonly="readonly">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">New Password </label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" name="password" class="form-control" id="password" placeholder="Please Enter a New Password" >
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" onClick="randomString();" type="button">Generate</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="points" class="col-sm-2 control-label">Points *</label>
                            <div class="col-sm-6">
                                <input type="text" name="points" class="form-control" id="points" placeholder="Please Enter the Points" value="<?php echo $row->points;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Please Enter a Name" value="<?php echo $row->full_name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Please Enter an Email Address" value="<?php echo $row->email;?>">
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
                            <label for="email" class="col-sm-2 control-label">Username *</label>
                            <div class="col-sm-6">
                                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Please Enter an Username" value="<?php echo set_value('user_name');?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password *</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" name="password" class="form-control" id="password" placeholder="Please Enter a Password" value="<?php echo set_value('password');?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" onClick="randomString();" type="button">Generate</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="points" class="col-sm-2 control-label">Points *</label>
                            <div class="col-sm-6">
                                <input type="text" name="points" class="form-control" id="points" placeholder="Please Enter the Points" value="<?php echo set_value('points');?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Please Enter a Name" value="<?php echo set_value('full_name');?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Please Enter an Email Address" value="<?php echo set_value('email');?>">
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