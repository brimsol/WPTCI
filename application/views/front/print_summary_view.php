<table cellspacing="0" cellpadding="0">
    <tr>
        <td width="230px">
            <h2>Performance Report for: <?php echo $test_url; ?>
            </h2>

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

<table>
    <tr>	
        <td>
            <table cellspacing="0" cellpadding="0" width="414px">
                <tr>

                    <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $fgrade; ?>" alt="A"></h2></a>First Byte Time</td>

                    <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $skagrade; ?>" alt="B"></h2></a>Keep-alive Enabled</td>

                    <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $zipgrade; ?>" alt="C"></h2></a>Compress Transfer</td>

                    <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $scgrade; ?>" alt="D"></h2></a>Compress Images</td>

                    <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $scagrade; ?>" alt="F"></h2></a>Cache static content</td>

                    <td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/<?php echo $cndgrade; ?>" alt="NA"></h2></a>Effective use of CDN</td>
                </tr>
            </table>
        </td>

    </tr>
</table>
<div>&nbsp;</div>
<h2>Quick Glance</h2>
<div>&nbsp;</div>
<table  border="1">

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

</table>