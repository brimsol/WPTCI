<?php $this->load->view('front/slice/header'); ?>


<div class="col-lg-8 col-centered">

    <!-- BEGIN EXAMPLE ALERT -->
    <div class="alert alert-info alert-bold-border fade in alert_box">

        <h1 class="page-heading">Analyze performance of:</h1>
        <form method="post">
        <div class="form-group"> 
            <div class="col-lg-11 left_no_pad right_no_pad">
                <input type="text" name="s_url" class="form-control analyze_search" value="<?php echo set_value('s_url'); ?>" placeholder="URL here">
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>

        <div class="form-group"> 
            <div class="col-lg-11 left_no_pad right_no_pad">
                <label>EMAIL TO SEND REPORT</label>
                <input type="text" name="email" placeholder="Email here" class="form-control" value="<?php echo set_value('email'); ?>">
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="form-group"> 
            <div class="col-lg-2 left_no_pad right_no_pad">
                <input type="submit" class="btn btn-info btn-perspective analyze_search_btn" value="Proceed">
            </div>
            <div class="clearfix"></div>
        </div>
</form>
    </div><!-- END EXAMPLE ALERT -->

</div><!--col-lg-->


<?php $this->load->view('front/slice/footer'); ?>
