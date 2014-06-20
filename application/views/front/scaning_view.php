<?php $this->load->view('front/slice/header'); ?>

<div class="col-lg-10 col-lg-offset-1 bg-white">
    <h1 class="page-heading">Analyzing your url</h1>
    <legend><?php echo $url;?></legend>

    <div id="screenshot">
        <img src="<?php echo base_url('/assets/front'); ?>/img/scanner.png" id="scanner" alt="Scanner">
        <img src="<?php echo base_url('/assets/front'); ?>/img/website.png" alt="Website" id="website_pic">
    </div><!--screenshot-->

    <div id="analyze_text">
        <h3>Analyzing your website</h3>
    </div>

</div>


<?php $this->load->view('front/slice/footer'); ?>
<script>
    $(document).ready(function() {
        function scanner() {

            setInterval(function() {

                $("#scanner").animate({'top': 200}, "slow");
                $("#scanner").animate({'top': 0}, "slow");
            }, 1000);

        }
        scanner();

    });
</script>