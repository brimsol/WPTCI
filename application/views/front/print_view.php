<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WebPagetest Test Result</title>
        <style>
            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
                -moz-box-sizing:border-box;
                -webkit-box-sizing:border-box;
            }
            /* HTML5 display-role reset for older browsers */
            article, aside, details, figcaption, figure, 
            footer, header, hgroup, menu, nav, section {
                display:block;
            }
            img{
                border:none;
            }
            a{
                outline:none;
                color: green;
                text-decoration: none;

            }
            a img{
                border:none;
                outline:none;
            }
            .clear{
                clear:both;
            }
            body{
                background-color: #FFF;
                color: #222222;
                font-family: Arial,Helvetica,sans-serif;
                font-size: 14px;
            }
            #header{
                width: 980px;
                height: 100px;
            }
            #logo{
                float: left;
                padding-top: 15px;
                width: 222px;
            }
            #logo a {
                display: block;
                height: 71px;
                font-size:0;
            }
            #container{
                width:19cm;
                padding: 0px 25px 25px 25px;
                background-color: #FFF;
            }
            #header_data {

            }
            #header_data h2 {
                margin-top: 20px;
                font-weight: normal;
                font-size: 22px;
                line-height: 1em;
                text-align:right;
            }
            .url {
                color: #000040;
                font-size: 16px;
                line-height: 16px;
                font-weight: bold;
            }
            .heading_details {
                margin: 0 0 10px;
            }
            #optimization {
                width: 414px;
            }
            #optimization_header {
                line-height: 20px;
            }
            .grades{
                font-size: 11px;
                line-height: 1.2em;
                width: 59px;
            }
            .grades li {
                width: 59px;
            }
            .grades a {
                text-decoration: none;
            }
            .grades h2 {
                font-size: 35px;
                height: 60px;
                margin: 0 0 5px;
                text-align: center;
                width: 60px;
                color: #2e2e2c;
            }
            #test_results-container{
                border-bottom:1px solid silver;
                margin:10px 0;
            }
            .heading_text{
                margin:10px 0;
                text-align: center;
                padding: 0.5em 0;
                font-size: 2em;
                line-height: 1em;
                font-weight: bold;
            }
            table.pretty {
                background-color: #fff;
                border: 0 solid white;
                border-collapse: collapse;
                margin-left: auto;
                margin-right: auto;
            }
            table.pretty th.empty {
                background: none repeat scroll 0 0 #fff;
                border-left: 1px solid white;
                border-top: 1px solid white;
            }
            table.pretty th.border, table.pretty td.border {
                border-left: 2px solid black;
            }
            table.pretty th {
                background: none repeat scroll 0 0 gainsboro;
            }
            table.pretty th, table.pretty td {
                border: 1px solid silver;
                padding: 0.4em;
                text-align: center;
            }
            table.pretty {
                border-collapse: collapse;
            }
            .full_image{
                border: 1px solid silver;
            }
        </style>
    </head>
    <body>



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
            <tr>
                <td colspan="2"><div id="test_results-container"></div></td>
            </tr>
            <tr>	
                <td>
                    <table cellspacing="0" cellpadding="0" width="414px">
                        <tr>
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

                            <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $fgrade; ?>" alt="A"></h2></a>First Byte Time</td>
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

                            <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $skagrade; ?>" alt="B"></h2></a>Keep-alive Enabled</td>
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
                            <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $zipgrade; ?>" alt="C"></h2></a>Compress Transfer</td>

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
                            <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $scgrade; ?>" alt="D"></h2></a>Compress Images</td>
                            <!--Cache static content-->
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
                            <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $scagrade; ?>" alt="F"></h2></a>Cache static content</td>

                            <!--First Byte Time-->
                            <?php
                            if ($score_cdn >= 100) {
                                $cndgrade = "tick.jpg";
                            } else {
                                $cndgrade = "na.jpg";
                            }
                            ?>
                            <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $cndgrade; ?>" alt="NA"></h2></a>Effective use of CDN</td>
                        </tr>
                    </table>
                </td>
                <td style='height:232px;'>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $thumbnail; ?>" alt="Google" width="232px" height="180px" style="border:2px solid silver">
                </td>
            </tr>
            <tr>
                <td colspan="2"><div class="heading_text">Summary</div></td>
            </tr>

            <tr>
                <td colspan="2">

                    <table border="2" align="center" cellspacing="0" cellpadding="10"  id="tableResults">
                        <tbody>
                            <tr>
                                <th valign="middle" align="center" colspan="5" class="empty"></th>
                                <th valign="middle" align="center" colspan="3" class="border">Document Complete</th>
                                <th valign="middle" align="center" colspan="3" class="border">Fully Loaded</th>
                            </tr>
                            <tr>
                                <th valign="middle" align="center">Load Time</th>
                                <th valign="middle" align="center">First Byte</th>
                                <th valign="middle" align="center">Start Render</th>
                                <th valign="middle" align="center">DOM Elements</th>
                                <th valign="middle" align="center">Result (error code)</th>

                                <th valign="middle" align="center" class="border">Time</th>
                                <th valign="middle" align="center">Requests</th>
                                <th valign="middle" align="center">Bytes In</th>

                                <th valign="middle" align="center" class="border">Time</th>
                                <th valign="middle" align="center">Requests</th>
                                <th valign="middle" align="center">Bytes In</th>
                            </tr>
                            <tr>
                                <td valign="middle" id="LoadTime"><?php echo round(milli_to_seconds($first_loadTime),2);?>s</td>
                                <td valign="middle" id="TTFB"><?php echo round(($first_bytesOut/1024),2);?>KB</td>
                                <td valign="middle" id="startRender"><?php echo round(milli_to_seconds($first_view_render),2);?>s</td>
                                <td valign="middle" id="domElements"><?php echo $first_domElements;?></td>
                                <td valign="middle" id="result">0</td>
                                <td valign="middle" class="border" id="docComplete"><?php echo round(milli_to_seconds($first_docTime),2);?>s</td>
                                <td valign="middle" id="requestsDoc"><?php echo $first_requestsDoc;?></td>
                                <td valign="middle" id="bytesInDoc"><?php echo round(($first_bytesInDoc/1024),2);?> KB</td>
                                <td valign="middle" class="border" id="fullyLoaded"><?php echo round(milli_to_seconds($first_fullyLoaded),2);?></td>
                                <td valign="middle" id="requests"><?php echo $first_requests;?></td>
                                <td valign="middle" id="bytesIn"><?php echo  round(($first_bytesIn/1024),2);?> KB</td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>


            <tr>
                <td colspan="2"><div class="heading_text">Waterfall View</div></td>
            </tr>
            <tr>
                <td colspan="2"><img src="<?php echo $waterfall; ?>" alt="Website" class="full_image" width="700px"></td>
            </tr>

            <tr>
                <td colspan="2"><div class="heading_text">Google PageSpeed Score</div></td>
            </tr>

            <tr>
                <td colspan="2"><div class="heading_text" style="color:orchid"><?php echo $speed_score; ?>/100</div></td>
            </tr>
            <tr>
                <td colspan="2"><div class="heading_text">PageSpeed Optimization Check</div></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $page_speed; ?>
                </td>
            </tr>

            <tr>
                <td colspan="2"><div class="heading_text">Waterfall View (Repeat)</div></td>
            </tr>
            <tr>
                <td colspan="2"><img src="<?php echo $waterfall_repeat; ?>" alt="Website" class="full_image" width="700px"></td>
            </tr>



            <tr>
                <td colspan="2"><div class="heading_text">Connection View</div></td>
            </tr>
            <tr>
                <td colspan="2"><img src="<?php echo $connection_view; ?>" alt="Website" class="full_image" width="700px"></td>
            </tr>

            <tr>
                <td colspan="2"><div class="heading_text">Connection View (Repeat)</div></td>
            </tr>
            <tr>
                <td colspan="2"><img src="<?php echo $connection_view_repeat; ?>" alt="Website" class="full_image" width="700px"></td>
            </tr>

            <tr>
                <td colspan="2"><div class="heading_text">Check List</div></td>
            </tr>
            <tr>
                <td colspan="2"><img src="<?php echo $checklist; ?>" alt="Website" class="full_image" width="700px"></td>
            </tr>

            <tr>
                <td colspan="2"><div class="heading_text">Check List (Repeat)</div></td>
            </tr>
            <tr>
                <td colspan="2"><img src="<?php echo $checklist_repeat; ?>" alt="Website" class="full_image" width="700px"></td>
            </tr>

            <tr>
                <td colspan="2"><div class="heading_text">Screen Shot</div></td>
            </tr>
            <tr>
                <td colspan="2"><center><img src="<?php echo $screenshot; ?>" alt="Website" class="full_image" width="410px"></center></td>
    </tr>

    <tr>
        <td colspan="2"><div class="heading_text">Screen Shot (Repeat)</div></td>
    </tr>
    <tr>
        <td colspan="2"><center><img src="<?php echo $screenshot_repeat; ?>" alt="Website" class="full_image" width="410px"></center></td>
</tr>

</table><!--container-->


</body>
</html>