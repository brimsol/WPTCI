

    <table id="container" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <h1 id="logo"><a href="#"><img src="<?php echo base_url('/assets/front'); ?>/img/logo.png" alt="Logo" />WebPageTest</a></h1>
            </td>
            <td width="230px">
                <div id="header_data">
                    <h2 class="alternate cufon-dincond_regular">Performance Report for<br>
                        <a href="#" rel="nofollow" class="url cufon-dincond_black"><?php echo $test_url; ?></a>
                    </h2>
                </div><!--header_data-->
            </td>
        </tr>
    </table>
                        <!--First Byte Time-->
                        <?php
                        if ($first_byte <= 270) {
                            $fgrade = "grade_a.jpg";
                        } elseif ($first_byte > 270 && $first_byte < 370) {
                            $fgrade = "grade_b.jpg";
                        } elseif ($first_byte > 370 && $first_byte < 470) {
                            $fgrade = "grade_c.jpg";
                        } else {
                            $fgrade = "grade_d.jpg";
                        }
                        ?>

                      
                        <!--Keep-alive Enabled-->
                        <?php
                        if (($score_keep_alive > 90) && ($score_keep_alive <= 100)) {
                            $skagrade = "grade_a.jpg";
                        } elseif (($score_keep_alive > 80) && ($score_keep_alive <= 90)) {
                            $skagrade = "grade_b.jpg";
                        } elseif (($score_keep_alive > 70) && ($score_keep_alive <= 80)) {
                            $skagrade = "grade_c.jpg";
                        } elseif (($score_keep_alive > 60) && ($score_keep_alive <= 70)) {
                            $skagrade = "grade_d.jpg";
                        } else {
                            $skagrade = "grade_f.jpg";
                        }
                        ?>
  <!--Compress Transfer-->
                        <?php
                        if (($score_gzip > 90) && ($score_gzip <= 100)) {
                            $zipgrade = "grade_a.jpg";
                        } elseif (($score_gzip > 80) && ($score_gzip <= 90)) {
                            $zipgrade = "grade_b.jpg";
                        } elseif (($score_gzip > 70) && ($score_gzip <= 80)) {
                            $zipgrade = "grade_c.jpg";
                        } elseif (($score_gzip > 60) && ($score_gzip <= 70)) {
                            $zipgrade = "grade_d.jpg";
                        } else {
                            $zipgrade = "grade_f.jpg";
                        }
                        ?>
                       <!--Compress Images-->
                        <?php
                        if (($score_compress > 90) && ($score_compress <= 100)) {
                            $scgrade = "grade_a.jpg";
                        } elseif (($score_compress > 80) && ($score_compress <= 90)) {
                            $scgrade = "grade_b.jpg";
                        } elseif (($score_compress > 70) && ($score_compress <= 80)) {
                            $scgrade = "grade_c.jpg";
                        } elseif (($score_compress > 60) && ($score_compress <= 70)) {
                            $scgrade = "grade_d.jpg";
                        } else {
                            $scgrade = "grade_f.jpg";
                        }
                        ?>
                       
                        <?php
                        if (($score_cache > 90) && ($score_cache <= 100)) {
                            $scagrade = "grade_a.jpg";
                        } elseif (($score_cache > 80) && ($score_cache <= 90)) {
                            $scagrade = "grade_b.jpg";
                        } elseif (($score_cache > 70) && ($score_cache <= 80)) {
                            $scagrade = "grade_c.jpg";
                        } elseif (($score_cache > 60) && ($score_cache <= 70)) {
                            $scagrade = "grade_d.jpg";
                        } else {
                            $scagrade = "grade_f.jpg";
                        }
                        ?>
                                 <!--First Byte Time-->
                        <?php
                        if ($score_cdn >= 100) {
                            $cndgrade = "tick.jpg";
                        } else {
                            $cndgrade = "na.jpg";
                        }
                        ?>
                                 <div style="width:100px;height:100px;background-color:red;">asdasd</div>      
                                 
                                 
                <div id="image1" style="position:absolute; overflow:hidden; left:443px; top:69px; width:60px; height:60px; z-index:0"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>

<div id="image2" style="position:absolute; overflow:hidden; left:361px; top:69px; width:60px; height:60px; z-index:1"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>

<div id="image3" style="position:absolute; overflow:hidden; left:269px; top:67px; width:60px; height:60px; z-index:2"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>

<div id="image4" style="position:absolute; overflow:hidden; left:174px; top:66px; width:60px; height:60px; z-index:3"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>

<div id="image5" style="position:absolute; overflow:hidden; left:86px; top:66px; width:60px; height:60px; z-index:4"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>

<div id="image6" style="position:absolute; overflow:hidden; left:441px; top:167px; width:60px; height:60px; z-index:5"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>

<div id="image7" style="position:absolute; overflow:hidden; left:359px; top:167px; width:60px; height:60px; z-index:6"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>

<div id="image8" style="position:absolute; overflow:hidden; left:267px; top:165px; width:60px; height:60px; z-index:7"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>

<div id="image9" style="position:absolute; overflow:hidden; left:172px; top:164px; width:60px; height:60px; z-index:8"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>

<div id="image10" style="position:absolute; overflow:hidden; left:84px; top:164px; width:60px; height:60px; z-index:9"><img src="http://pagetest.dev/assets/front/img/grade_b.jpg" alt="" title="" border=0 width=60 height=60></div>
                 
                                 
                                 
<div id="grades">
                            <ul style="list-style:none; background-color: #FF000;">
				<li style="float: left">
					<img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $fgrade; ?>" alt="A">First Byte Time
				</li>
				<li style="float: left">
					<img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $skagrade; ?>" alt="B">Keep-alive Enabled
				</li>
				<li style="float: left" >
					<img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $zipgrade; ?>" alt="C">Compress Transfer
				</li>
				<li style="float: left">
					<img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $scgrade; ?>" alt="D">Compress Images
				</li>
				<li style="float: left">
					<img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $scagrade; ?>" alt="F">Cache static content
				</li>
				<li style="float: left">
					<img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $cndgrade; ?>" alt="NA">Effective use of CDN
				</li>
			</ul>
		</div><!--grades-->