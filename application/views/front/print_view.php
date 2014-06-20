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
	color: #000;
}
a img{
	border:none;
	outline:none;
}
.clear{
	clear:both;
}
body{
	background-color: #fff;
	color: #222222;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
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
	width:755px;
    padding: 25px;
    background-color: #FFF;
}
#header_data {
    overflow-x: hidden;
    width: 510px;
}
#header_data h2 {
    margin: 0;
    font-weight: normal;
    font-size: 2.5em;
    line-height: 1em;
    padding: 0.5em 0;
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

<div id="header">
    <h1 id="logo"><a href="#"><img src="<?php echo base_url('/assets/front'); ?>/img/logo.png" alt="Logo" />WebPageTest</a></h1>
    <div class="clear"></div>
</div>

<table id="container" cellspacing="0" cellpadding="0">
<tr>
	<td>
		<div id="header_data">
			<h2 class="alternate cufon-dincond_regular">Web Page Performance Test for<br>
			<a href="http://google.com" title="http://google.com" rel="nofollow" class="url cufon-dincond_black">google.com</a></h2>
			<p class="heading_details">
				<strong>From:</strong> Dulles, VA - IE8 - <b>Cable</b><br>
				<span date="1403238525" class="jsdate">6/20/2014, 9:58:45 AM</span><br>
			</p>
		</div><!--header_data-->
	</td>
</tr>
<tr>	
	<td>
		<table cellspacing="0" cellpadding="0" width="414px">
		<tr>
			<td colspan="6">
				<div id="optimization_header">
					<span id="headerPagespeedScore"><a href="#">PageSpeed 1.12 Score</a>: <b>98/100</b></span>
				</div>
			</td>
		</tr>
		<tr>
			<td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/grade_a.jpg" alt="A"></h2></a>First Byte Time</td>
			<td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/grade_b.jpg" alt="B"></h2></a>Keep-alive Enabled</td>
			<td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/grade_c.jpg" alt="C"></h2></a>Compress Transfer</td>
			<td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/grade_d.jpg" alt="D"></h2></a>Compress Images</td>
			<td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/grade_f.jpg" alt="F"></h2></a>Cache static content</td>
			<td class="grades"><a href="#"><h2><img src="<?php echo base_url('/assets/front'); ?>/img/na.jpg" alt="NA"></h2></a>Effective use of CDN</td>
		</tr>
		</table>
	</td>

</tr>
	
<tr>
	<td colspan="2"><div id="test_results-container"></div></td>
</tr>
	
<tr>
	<td colspan="2"><div class="heading_text">Waterfall View</div></td>
</tr>
	
<tr>
	<td colspan="2">

	<table border="1" align="center" cellspacing="0" cellpadding="10" class="pretty" id="tableResults">
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
		<td valign="middle" id="LoadTime">1.423s</td>
		<td valign="middle" id="TTFB">0.634s</td>
		<td valign="middle" id="startRender">0.965s</td>
		<td valign="middle" id="domElements">214</td>
		<td valign="middle" id="result">0</td>
		<td valign="middle" class="border" id="docComplete">1.423s</td>
		<td valign="middle" id="requestsDoc">10</td>
		<td valign="middle" id="bytesInDoc">247 KB</td>
		<td valign="middle" class="border" id="fullyLoaded">1.634s</td>
		<td valign="middle" id="requests">12</td>
		<td valign="middle" id="bytesIn">281 KB</td>
	</tr>
	</tbody>
	</table>

	</td>
</tr>
	
	
<tr>
	<td colspan="2"><div class="heading_text">Image</div></td>
</tr>
<tr>
	<td colspan="2"><img src="<?php echo base_url('/assets/front'); ?>/img/sample.jpg" alt="Website" / class="full_image" width="20%" height="20%"></td>
</tr>

</table><!--container-->

	
</body>
</html>