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
                <form method="post">
                    <button type="submit" title="" data-toggle="tooltip" class="btn btn-primary refresh-btn pull-right" data-original-title="Go">Go</button>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="daterange" name="daterange" class="form-control pull-right">
                        <input type="hidden" id="datestart" name="datestart" class="form-control pull-right">
                        <input type="hidden" id="dateend" name="dateend" class="form-control pull-right">
                    </div>

                </form>
            </div>
        </div>
        <?php if (isset($customers) && count($customers) > 0) { ?>
            <div class="box-body table-responsive">

                <table id="customer_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="nosort">#</th>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Work start date</th>
                            <th>Rate of work</th>
                            <th>Total Measure</th>
                            <th>Total Amount</th>
                            <th>Advance Amount</th>
                            <th>Balance Amount</th>
                            <th class="nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $c = 1; ?>
                        <?php foreach ($customers as $cus) { ?>
                            <tr>
                                <td><?php echo $c; ?></td>
                                <td><?php echo $cus->customer_custid; ?></td>
                                <td><?php echo $cus->customer_name; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($cus->work_starting_date)); ?></td>
                                <td><?php echo $cus->rate_of_work; ?></td>
                                <td><?php echo $cus->total_measurement; ?></td>
                                <td><?php echo $cus->total_amount; ?></td>
                                <td><?php echo $cus->advance_amount; ?></td>
                                <td><?php echo $cus->balance_amount; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/works/edit/' . $cus->work_id) ?>" data-toggle="tooltip" data-original-title="Edit Work"><button class="btn btn-sm btn-circle btn-primary"><i class="fa fa-edit"></i></button></a>

                                    <a href="<?php echo site_url('admin/works/delete/' . $cus->work_id) ?>" data-toggle="tooltip" data-original-title="Delete Work" onclick="return confirm('Are you sure ?');"><button class="btn btn-sm btn-circle btn-danger"><i class="fa fa-trash-o"></i></button></a>

                                </td>
                            </tr>
                            <?php
                            $c++;
                        }
                        ?>
                    </tbody>

                </table>
            </div><!-- /.box-body -->
            <?php
        } else {
            echo 'No customer found';
        }
        ?> 

    </div><!-- /.box -->
</div>      



<?php $this->load->view('admin/slice/footer'); ?>