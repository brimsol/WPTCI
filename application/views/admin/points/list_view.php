<?php $this->load->view('admin/slice/header'); ?>
<div class="row">
    <div class="col-xs-12">

    </div>
</div>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List View</h3>    
            <div class="pull-right box-tools">
                <a href="<?php echo site_url('admin/customers/add'); ?>"> <button title="" data-toggle="tooltip" class="btn btn-primary btn-sm refresh-btn" data-original-title="Add New"><i class="fa fa-plus"></i></button></a>
            </div>
        </div>
        <?php if(isset($customers) && count($customers)>0){ ?>
        <div class="box-body table-responsive">

            <table id="customer_list" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Points Available</th>
                        <th>Name</th>
                        <th>Email</th>
                        
                        
                        <th class="nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c = 1;?>
                    <?php foreach($customers as $cus){?>
                    <tr>
                        <td><?php echo $c;?></td>
                        <td><?php echo $cus->user_name;?></td>
                         <td><small class="badge bg-yellow"><?php echo $cus->points;?></small></td>
                         <td><?php echo $cus->full_name;?></td>
                        <td><?php echo $cus->email;?></td>
                         
                      
                       <td>
                           <a href="<?php echo site_url('admin/customers/edit/'. $cus->user_id) ?>" data-toggle="tooltip" data-original-title="Edit Customer"><button class="btn btn-sm btn-circle btn-primary"><i class="fa fa-edit"></i></button></a>
                           <a href="<?php echo site_url('admin/points/add/'. $cus->user_id) ?>"  title="Add Points" data-toggle="modal" data-target="#myModal" class="tooltip_act"><button class="btn btn-sm btn-circle btn-success"><i class="fa fa-rocket"></i></button></a>
                           <a href="<?php echo site_url('admin/customers/delete/'. $cus->user_id) ?>" data-toggle="tooltip" data-original-title="Delete Customer" onclick="return confirm('Are you sure ?');"><button class="btn btn-sm btn-circle btn-danger"><i class="fa fa-trash-o"></i></button></a>
                       </td>
                    </tr>
                    <?php $c++;} ?>
                </tbody>

            </table>
        </div><!-- /.box-body -->
        <?php }else{echo '<center>No customer found</center>';} ?>
        
    </div><!-- /.box -->
</div>      
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Modal title</h4>

            </div>
            <div class="modal-body"> </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php $this->load->view('admin/slice/footer'); ?>