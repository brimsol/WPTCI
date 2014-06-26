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
                width:auto;
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
            .pagespeed_treeview{
                list-style:none;
                margin-top:20px;
            }
            .pagespeed_treeview > li{
                background:url(<?php echo base_url('/assets/front'); ?>/img/arrow_list.png) 0 2px no-repeat;
                min-width:16px;
                min-height:16px;
                padding-left: 25px;
                margin-bottom:10px;
            }
            .pagespeed_children{
                list-style: none;
            }
            .pagespeed_child.open.collapsable.lastCollapsable{
                font-size: 13px;
                margin-top: 5px;
            }
            .pagespeed_check.closed.expandable > a,.pagespeed_check > a{
                color:#000;
            }
            .pagespeed_child.open.collapsable.lastCollapsable {
                margin-left: 0;
            }
            .pagespeed_child {
                margin-left: 20px;
                margin-top: 5px;
            }

            .google_rank{
                width:340px;
                margin-left:auto;
                margin-right:auto;
                margin-bottom:10px;
                border:1px solid #c0c8d3;
            }
            .google_rank_top{
                background-color: #8cc152;
                color:#FFF;
                font-size: 22px;
                padding:10px;
                text-align:center;
            }
            .google_rank_no{
                padding:20px 0px;
                background-color:#E8E9EE;
                color: #FFF;
                text-align:center;
                font-size:22px;
            }
            .google_rank_no span {
                background: none repeat scroll 0 0 #3bafda;
                border: 3px solid #2c83a3;
                border-radius: 50%;
                display: block;
                height: 100px;
                margin-left: auto;
                margin-right: auto;
                padding-top: 34px;
                width: 100px;
            }
            .header_border{
                min-height:20px;
                background-color:#740028;
                border-radius: 2px;
                padding:6px;
                width: 100%;
                color:#FFF;
                font-size:12px;
            }
            .table_new{
                border-collapse:collapse;
                width:100%;
                margin:10px 0;
            }
            .table_new th{
                padding:5px;
                background-color:#F2F2F2;
                border:1px solid #CCC;
                padding:5px;
                text-align:left;
            }
            .table_new td{
                border:1px solid #CCC;
                padding:5px;
            }
            .table_sec{
                border-collapse:collapse;
                width:100%;
                margin:10px 0;
            }
            .table_sec th{
                padding:5px;
                background-color:#F2F2F2;
                border:1px solid #CCC;
                padding:5px;
                font-size:22px;
            }
            .table_sec td{
                border:1px solid #CCC;
                padding:5px;
                font-size:16px;
            }
            .page-break{
                page-break-after: always;
            }

            @media print {
                .page-break {page-break-after: always;}
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
                <td colspan="2"><div class="header_border"></div></td>
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
                                <td valign="middle" id="LoadTime"><?php echo round(milli_to_seconds($first_loadTime), 2); ?>s</td>
                                <td valign="middle" id="TTFB"><?php echo round(($first_bytesOut / 1024), 2); ?>KB</td>
                                <td valign="middle" id="startRender"><?php echo round(milli_to_seconds($first_view_render), 2); ?>s</td>
                                <td valign="middle" id="domElements"><?php echo $first_domElements; ?></td>
                                <td valign="middle" id="result">0</td>
                                <td valign="middle" class="border" id="docComplete"><?php echo round(milli_to_seconds($first_docTime), 2); ?>s</td>
                                <td valign="middle" id="requestsDoc"><?php echo $first_requestsDoc; ?></td>
                                <td valign="middle" id="bytesInDoc"><?php echo round(($first_bytesInDoc / 1024), 2); ?> KB</td>
                                <td valign="middle" class="border" id="fullyLoaded"><?php echo round(milli_to_seconds($first_fullyLoaded), 2); ?></td>
                                <td valign="middle" id="requests"><?php echo $first_requests; ?></td>
                                <td valign="middle" id="bytesIn"><?php echo round(($first_bytesIn / 1024), 2); ?> KB</td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
            <div class="page-break"></div>
            <tr>
                <td colspan="2"><div class="heading_text">Waterfall View</div></td>
            </tr>

            <tr>
                <td colspan="2"><center><img src="<?php echo base_url('/assets/front'); ?>/img/waterfall.png" alt="Website"></center></td>
    </tr>
    <tr>
        <td colspan="2"><img src="<?php echo $waterfall; ?>" alt="Website" class="full_image" width="700px"></td>
    </tr>
    <!--
 <tr>
              <td colspan="2">
                <div class="heading_text"></div>
                <div class="google_rank">
                        <div class="google_rank_top">Google PageSpeed Score</div>
                    <div class="google_rank_no"><span><?php echo $speed_score; ?>/100</span></div>
                </div>
              </td>
            </tr>
    -->
    <tr>
        <td colspan="2"><div class="heading_text">PageSpeed Optimization Check</div></td>
    </tr>
    <tr>
        <td>
            <?php //echo $page_speed; ?>
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
        <td colspan="2"><center><img src="<?php echo base_url('/assets/front'); ?>/img/connection_view.png" alt="Website"></center></td>
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
    <td colspan="2"><div class="heading_text">Grade Details</div></td>
</tr>

<tr>
    <td colspan="2">

        <table cellspacing="0" cellpadding="0" class="table_sec">

            <tr>
                <td class="table_sec_ftd">First Byte Time (back-end processing)</td>
                <td><?php echo $first_byte; ?> Milli.Sec</td>
            </tr>
            <tr>
                <td class="table_sec_ftd">Use persistent connections (keep alive)</td>
                <td><?php echo $score_keep_alive; ?>/100</td>
            </tr>
            <tr>
                <td class="table_sec_ftd">Use gzip compression for transferring compressable responses</td>
                <td><?php echo $score_gzip; ?>/100</td>
            </tr>

            <tr>
                <td class="table_sec_ftd">Compress Images</td>
                <td><?php echo $score_compress; ?>/100</td>
            </tr>

            <tr>
                <td class="table_sec_ftd">Use Progressive JPEGs</td>
                <td><?php echo $score_compress; ?>/100</td>
            </tr>

            <tr>
                <td class="table_sec_ftd">Leverage browser caching of static assets</td>
                <td><?php echo $score_cache; ?>/100</td>
            </tr>
            <tr>
                <td class="table_sec_ftd">Use a CDN for all static assets</td>
                <td><?php echo $score_cdn; ?>/100</td>
            </tr>
        </table>

    </td>
</tr>

<tr>
    <td colspan="2"><div class="heading_text">Glossary for Grades</div></td>
</tr>
<tr>
    <td colspan="2" width="700px">


        <table cellspacing="0" style="width:100%">

            <tr><th >First Byte Time</th>
                <td >Applicable Objects</td>
                <td>Time to First Byte for the page (back-end processing + redirects)</td>
            </tr>
            <tr>
                <td>What is checked</td>
                <td>The target time is the time needed for the DNS, socket and SSL negotiations + 100ms.  A single letter grade will be deducted for every 100ms beyond the target.</td>
            </tr>

            <tr></tr>
            <tr><th>Keep-Alive</th>
                <td>Applicable Objects</td>
                <td>All objects that are from a domain that serves more than one object for the page (i.e. if only a single object is served from a given domain it will not be checked)</td>
            </tr>
            <tr>
                <td>What is checked</td>
                <td>The response header contains a "keep-alive" directive or the same socket was used for more than one object from the given host</td>
            </tr>

            <tr></tr>
            <tr><th>GZIP Text</th>
                <td>Applicable Objects</td>
                <td>All objects with a mime type of "text/*" or "*javascript*"</td>
            </tr>
            <tr>
                <td>What is checked</td>
                <td>Transfer-encoding is checked to see if it is gzip.  If it is not then the file is compressed and the percentage of compression 
                    is the result (so a page that can save 30% of the size of it's text by compressing would yield a 70% test result)</td>
            </tr>

            <tr></tr>
            <tr><th>Compress Images</th>
                <td>Applicable Objects</td>
                <td>JPEG Images</td>
            </tr>
            <tr>
                <td>What is checked</td>
                <td>Within 10% of a photoshop quality 50 will pass, up to 50% larger will warn and anything larger than that will fail.<br>
                    The overall score is the percentage of image bytes that can be saved by re-compressing the images.                        
                </td>
            </tr>

            <tr></tr>
            <tr><th>Use Progressive JPEGs</th>
                <td>Applicable Objects</td>
                <td>All JPEG Images</td>
            </tr>
            <tr>
                <td>What is checked</td>
                <td>Each JPEG image is checked and the resulting score is the percentage of JPEG bytes that were served as progressive images relative to the total JPEG bytes.</td>
            </tr>

            <tr></tr>
            <tr><th >Cache Static</th>
                <td>Applicable Objects</td>
                <td>Any non-html object with a mime type of "text/*", "*javascript*" or "image/*" that does not
                    explicitly have an Expires header of 0 or -1, a cache-control header of "private",
                    "no-store" or "no-cache" or a pragma header of "no-cache"</td>
            </tr>
            <tr>
                <td>What is checked</td>
                <td>
                    An "Expires" header is present (and is not 0 or -1) or a 
                    "cache-control: max-age" directive is present and set for an 
                    hour or greater.  If the expiration is set for less than 30 
                    days you will get a warning (only applies to max-age currently).
                </td>
            </tr>


            <tr><th>Use A CDN</th>
                <td>Applicable Objects</td>
                <td>All static non-html content (css, js and images)</td>
            </tr>
            <tr>
                <td>What is checked</td>
                <td>Checked to see if it is hosted on a known CDN (CNAME mapped to a known CDN network).  80% of the static resources need to be served from a CDN for the overall page to be considered using a CDN. The current list of known CDN's is <a href="http://webpagetest.googlecode.com/svn/trunk/agent/wpthook/cdn.h">here</a></td>
            </tr>

        </table>


    </td>
</tr>



<tr>
    <td colspan="2"><div class="heading_text">Content Breakdown by MIME (Request)</div></td>
</tr>
<tr>
    <td colspan="2"><center><img src="<?php echo base_url('/graph'); ?>/<?php echo $test_id; ?>req.png" alt="Website" class="full_image" width="400px"></center></td>
</tr>
<tr>
    <td colspan="2"><center><img src="<?php echo base_url('/assets/front'); ?>/img/pie_legand.png" alt="Website" class="full_image" width="400px"></center></td>
</tr>
<tr>
    <td colspan="2">
        <table cellspacing="0" cellpadding="0" class="table_new">
            <tr>
                <th>MIME Types</th>
                <th>Requests</th>
            </tr>
            <tr>
                <td>HTML</td>
                <td><?php echo $break_html_req; ?></td>
            </tr>
            <tr>
                <td>JS</td>
                <td><?php echo $break_js_req; ?></td>
            </tr>
            <tr>
                <td>CSS</td>
                <td><?php echo $break_css_req; ?></td>
            </tr>
            <tr>
                <td>IMAGE</td>
                <td><?php echo $break_image_req; ?></td>
            </tr>
            <tr>
                <td>FLASH</td>
                <td><?php echo $break_flash_req; ?></td>
            </tr>
            <tr>
                <td>FONT</td>
                <td><?php echo $break_font_req; ?></td>
            </tr>
            <tr>
                <td>OTHER</td>
                <td><?php echo $break_other_req; ?></td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td colspan="2"><div class="heading_text">Content Breakdown by MIME (Bytes)</div></td>
</tr>
<tr>
    <td colspan="2"><center><img src="<?php echo base_url('/graph'); ?>/<?php echo $test_id; ?>byt.png" alt="Website" class="full_image" width="400px"></center></td>
</tr>
<tr>
    <td colspan="2"><center><img src="<?php echo base_url('/assets/front'); ?>/img/pie_legand.png" alt="Website" class="full_image" width="400px"></center></td>
</tr>

<tr>
    <td colspan="2">
        <table cellspacing="0" cellpadding="0" class="table_new">
            <tr>
                <th>MIME Types</th>
                <th>Bytes</th>
            </tr>
            <tr>
                <td>HTML</td>
                <td><?php echo ($break_html_bytes / 8); ?></td>
            </tr>
            <tr>
                <td>JS</td>
                <td><?php echo ($break_js_bytes / 8); ?></td>
            </tr>
            <tr>
                <td>CSS</td>
                <td><?php echo ($break_css_bytes / 8); ?></td>
            </tr>
            <tr>
                <td>IMAGE</td>
                <td><?php echo ($break_image_bytes / 8); ?></td>
            </tr>
            <tr>
                <td>FLASH</td>
                <td><?php echo ($break_flash_bytes / 8); ?></td>
            </tr>
            <tr>
                <td>FONT</td>
                <td><?php echo ($break_font_bytes / 8); ?></td>
            </tr>
            <tr>
                <td>OTHER</td>
                <td><?php echo $break_other_bytes; ?></td>
            </tr>
        </table>
    </td>
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







<tr>
    <td colspan="2"><div class="header_border">Report generated @ <?php
            echo date("m-d-Y");
            ;
            ?></div></td>
</tr>


</table><!--container-->



</body>
</html>