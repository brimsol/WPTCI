<div>Grade Details</div>
<table border="1">

            <tr>
                <td>First Byte Time (back-end processing)</td>
                <td><?php echo $first_byte; ?> Milli.Sec</td>
            </tr>
            <tr>
                <td>Use persistent connections (keep alive)</td>
                <td><?php echo $score_keep_alive; ?>/100</td>
            </tr>
            <tr>
                <td>Use gzip compression for transferring compressable responses</td>
                <td><?php echo $score_gzip; ?>/100</td>
            </tr>

            <tr>
                <td>Compress Images</td>
                <td><?php echo $score_compress; ?>/100</td>
            </tr>

            <tr>
                <td>Use Progressive JPEGs</td>
                <td><?php echo $score_compress; ?>/100</td>
            </tr>

            <tr>
                <td>Leverage browser caching of static assets</td>
                <td><?php echo $score_cache; ?>/100</td>
            </tr>
            <tr>
                <td>Use a CDN for all static assets</td>
                <td><?php echo $score_cdn; ?>/100</td>
            </tr>
        </table>
<table>
<tr>
    <td>Glossary</td>
</tr>
<tr>
    <td><img src="<?php echo base_url('/assets/front'); ?>/img/glossary.png" alt="Website" class="full_image" width="700px"></td>
</tr>
</table>
 