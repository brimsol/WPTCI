<table>
<tr>
    <td colspan="2">Content Breakdown by MIME (Request)</td>
</tr>

<tr>
   <td colspan="2" align="center"><img src="http://chart.googleapis.com/chart?cht=p&chd=t:<?php echo $break_html_req;?>,<?php echo $break_css_req;?>,<?php echo $break_image_req;?>,<?php echo $break_js_req;?>,<?php echo $break_font_req;?>,<?php echo $break_flash_req;?>,<?php echo $break_other_req;?>&chs=500x350&chl=HTML|CSS|IMAGE|JS|FONT|FLASH|OTHER&chco=97BCEF|EDC393|ABD595|B899D3|42AAB1|E56354|BDBDBD&t=.png" alt="Website" class="full_image" width="500px"></td>
</tr>
<tr>
    <td colspan="2">
        <table cellspacing="0" cellpadding="0" border="1">
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
    <td colspan="2" align="center"><img src="http://chart.googleapis.com/chart?cht=p&chd=t:<?php echo $break_html_bytes;?>,<?php echo $break_css_bytes;?>,<?php echo $break_image_bytes;?>,<?php echo $break_js_bytes;?>,<?php echo $break_font_bytes;?>,<?php echo $break_flash_bytes;?>,<?php echo $break_other_bytes;?>&chs=500x350&chl=HTML|CSS|IMAGE|JS|FONT|FLASH|OTHER&chco=97BCEF|EDC393|ABD595|B899D3|42AAB1|E56354|BDBDBD&t=.png" alt="Website" class="full_image" width="500px"></td>
</tr>


<tr>
    <td colspan="2">
        <table cellspacing="0" cellpadding="0" border="1">
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
</table>