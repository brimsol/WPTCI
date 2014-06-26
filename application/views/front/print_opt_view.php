<style>
    .heading_text{
        margin:10px 0;
        text-align: center;
        padding: 0.5em 0;
        font-size: 2em;
        line-height: 1em;
        font-weight: bold;
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

</style>    
<div class="heading_text">PageSpeed Optimization Check</div></td>

<?php echo $page_speed; ?>
       