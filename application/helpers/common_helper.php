<?php
if ( ! function_exists('logged_in'))
{
    function logged_in(){
        $CI =& get_instance();
        return (bool) $CI->session->userdata('user_id');
		
    }
    
}

if ( ! function_exists('is_admin'))
{
    function is_admin(){
        $CI =& get_instance();
       if($CI->session->userdata('user_type')==1){
           return TRUE;
       }else{
           return FALSE;
       }
		
    }
    
}

function PageSpeedTreeHTML($file, $docRoot = '', $ver = '') {
    $html = '';
    $pagespeed = json_decode($file, true);
    
    
    //LoadPageSpeedData($file);
    if( $pagespeed )
    {
        $scores = array();
        $newFormat = false;
        $html .= '<div class="pagespeed_container">';
        $score = 0;
        if( isset($pagespeed['score']) )
        {
            $score = $pagespeed['score'];
            $newFormat = true;
            foreach( $pagespeed['rule_results'] as $index => &$result )
            {
                if( !array_key_exists('experimental', $result) || !$result['experimental'] )
                    $scores[$index] = $result['rule_impact'];
            }
        }
        else
        {
            // build an array of the scores to sort
            $total = 0;
            $count = 0;
            foreach( $pagespeed as $index => &$check )
            {
                $scores[$index] = $check['score'];
                $total += (double)$check['score'];
                $count++;
            }
            if( $count )
                $score = ceil($total / $count);
        }
        $html .= "PageSpeed $ver Score: <b>" . $score . '/100</b>*<br>';

        $html .= '<ul id="pagespeed_tree" class="pagespeed_treeview">';
        
        // sort by score
        if( $newFormat )
            arsort($scores);
        else
            asort($scores);
        $count = count($scores);
        $current = 0;
        foreach( $scores as $index => $score )
        {
            $current++;
            if( $newFormat )
            {
                $color = 'pagespeed_score-green';
                if( $score >= 10 )
                    $color = 'pagespeed_score-red';
                elseif( $score >= 3 )
                    $color = 'pagespeed_score-yellow';
                $score = $pagespeed['rule_results'][$index]['rule_score'];
                $label = $pagespeed['rule_results'][$index]['localized_rule_name'];
                $url = PageSpeedGetRuleDoc($pagespeed['rule_results'][$index]['rule_name']);
                if( isset($url) )
                    $label = "<a href=\"$url\" target=\"_blank\">$label</a>";
                $children = &$pagespeed['rule_results'][$index]['url_blocks'];
            }
            else
            {
                $label = FormatLabel($pagespeed[$index]['format'], $newFormat);
                if( $pagespeed[$index]['url'] )
                {
                    $url = 'http://code.google.com/speed/page-speed/docs/' . $pagespeed[$index]['url'];
                    $label = "<a href=\"$url\" target=\"_blank\">$label</a>";
                }
                $children = &$pagespeed[$index]['children'];
                $color = 'pagespeed_score-green';
                if( $score < 50 )
                    $color = 'pagespeed_score-red';
                elseif( $score < 80 )
                    $color = 'pagespeed_score-yellow';
            }

            $img = "";
            
            $last = '';
            if( $current == $count )
                $last = ' last';
                
            $childCount = 0;
            $expand = '';
            $div = '';
            if( $children && count($children) )
            {
                $childCount = count($children);
                $expand = ' closed expandable';
                $div = '<div class="hitarea pagespeed_check-hitarea closed-hitarea expandable-hitarea"></div>';
                if( strlen($last) )
                    $last .= 'Collapsable';
            }
            
            $html .= "<li class=\"pagespeed_check{$expand}{$last}\">$div$img $label";
            if( !$newFormat )
                $html .= " ($score/100)";
                
            if( $childCount )
                $html .= DisplayChildren($children, true, $newFormat);
                
            $html .= '</li>';
        }
        $html .= '</ul><br>* PageSpeed scores can only be compared to scores from the same version of the PageSpeed library.</div>';
    }
    
    return $html;
}

/**
* Return the URL for the given rule
* 
* @param mixed $rule
*/
function PageSpeedGetRuleDoc($rule)
{
    $rules = array(
          'AvoidBadRequests' => 'rtt.html#AvoidBadRequests',
          'AvoidCssImport' => 'rtt.html#AvoidCssImport',
          'AvoidDocumentWrite' => 'rtt.html#AvoidDocumentWrite',
          'CombineExternalCss' => 'rtt.html#CombineExternalCSS',
          'CombineExternalJavaScript' => 'rtt.html#CombineExternalJS',
          'EnableGzipCompression' => 'payload.html#GzipCompression',
          'EnableKeepAlive' => 'rtt.html#EnableKeepAlive',
          'InlineSmallCss' => 'caching.html#InlineSmallResources',
          'InlineSmallJavaScript' => 'caching.html#InlineSmallResources',
          'LeverageBrowserCaching' => 'caching.html#LeverageBrowserCaching',
          'MinifyCss' => 'payload.html#MinifyCSS',
          'MinifyHTML' => 'payload.html#MinifyHTML',
          'MinifyJavaScript' => 'payload.html#MinifyJS',
          'MinimizeDnsLookups' => 'rtt.html#MinimizeDNSLookups',
          'MinimizeRedirects' => 'rtt.html#AvoidRedirects',
          'MinimizeRequestSize' => 'request.html#MinimizeRequestSize',
          'OptimizeImages' => 'payload.html#CompressImages',
          'OptimizeTheOrderOfStylesAndScripts' => 'rtt.html#PutStylesBeforeScripts',
          'ParallelizeDownloadsAcrossHostnames' => 'rtt.html#ParallelizeDownloads',
          'PreferAsyncResources' => 'rtt.html#PreferAsyncResources',
          'PutCssInTheDocumentHead' => 'rendering.html#PutCSSInHead',
          'RemoveQueryStringsFromStaticResources' => 'caching.html#LeverageProxyCaching',
          'ServeResourcesFromAConsistentUrl' => 'payload.html#duplicate_resources',
          'ServeScaledImages' => 'payload.html#ScaleImages',
          'SpecifyACacheValidator' => 'caching.html#LeverageBrowserCaching',
          'SpecifyAVaryAcceptEncodingHeader' => 'caching.html#LeverageProxyCaching',
          'SpecifyCharsetEarly' => 'rendering.html#SpecifyCharsetEarly',
          'SpecifyImageDimensions' => 'rendering.html#SpecifyImageDimensions',
          'SpriteImages' => 'rtt.html#SpriteImages');

    $url = null;
    if( isset($rules[$rule]) )
        $url = 'http://code.google.com/speed/page-speed/docs/' . $rules[$rule];
    
    return $url;
}

/**
* Recursively display the children
* 
* @param mixed $children
*/
function DisplayChildren(&$children, $hide, $newFormat)
{
    $html = '';
    $hidden = '';
    $sub_children = 'children';
    if( $newFormat )
        $sub_children = 'urls';
    if( $hide )
        $hidden = 'style="display:block;"';
    $html .= "<ul class=\"pagespeed_children\"$hidden>";
    $current = 0;
    $count = count($children);
    foreach( $children as &$child )
    {
        $current++;
        
        if( $newFormat )
        {
            if( array_key_exists('header', $child) )
                $label = FormatLabel($child['header'], $newFormat);
            else
                $label = FormatLabel($child['result'], $newFormat);
        }
        else
        {
            $type = $child['format'][0]['type'];
            $label = FormatLabel($child['format'], $newFormat);
        }

        $last = '';
        if( $current == $count )
            $last = ' last';
            
        $childCount = 0;
        $expand = '';
        $div = '';
        if( isset($child[$sub_children]) && $child[$sub_children] && count($child[$sub_children]) )
        {
            $childCount = count($child[$sub_children]);
            $expand = ' open collapsable';
            if( strlen($last) )
            {
                $last .= 'Collapsable';
                $div = '<div class="hitarea pagespeed_child-hitarea open-hitarea collapsable-hitarea lastCollapsable-hitarea"></div>';
            }
            else
                $div = '<div class="hitarea pagespeed_child-hitarea open-hitarea collapsable-hitarea"></div>';
        }

        $html .= "<li class=\"pagespeed_child{$expand}{$last}\">$div $label";
        if( $childCount )
            $html .= DisplayChildren($child[$sub_children], false, $newFormat);
        $html .= '</li>';
    }
    $html .= '</ul>';

    return $html;
}

/**
* Combine the partial strings from the json into a single formatted string
* 
* @param mixed $format
*/
function FormatLabel(&$format, $newFormat)
{
    $ret = '';
    
    if (isset($format) && is_array($format)) {
        if( $newFormat )
        {
            if (array_key_exists('format', $format)) {
                $ret = $format['format'];
            }
            if (array_key_exists('args', $format)) {
                foreach( $format['args'] as $index => &$arg )
                {
                    $key = $index + 1;
                    $key = '$' . $key;
                    $type = $arg['type'];
                    if( $type == 'url' )
                        $value = "<a rel=\"nofollow\" href=\"{$arg['localized_value']}\" target=\"_blank\">" . htmlspecialchars(FitText($arg['localized_value'],80)) . '</a>';
                    else
                        $value = htmlspecialchars($arg['localized_value']);
                    $ret = str_replace($key, $value, $ret);
                }
            }
        }
        else
        {
            foreach( $format as &$item )
            {
                $type = $item['type'];
                if( $type == 'url' )
                {
                    $ret .= "<a rel=\"nofollow\" href=\"{$item['value']}\" target=\"_blank\">" . htmlspecialchars(FitText($item['value'],80)) . '</a>';
                }
                else
                    $ret .= htmlspecialchars($item['value']);
            }
        }
    }
    
    return $ret;
}

/**
* Load the pagespeed results and calculate the score
* 
* @param mixed $file
*/
function GetPageSpeedScore($file)
{
    $score = '';
    if (gz_is_file($file)) {
        $pagespeed = LoadPageSpeedData($file);

        if( $pagespeed )
        {
            if( isset($pagespeed['score']) )
                $score = $pagespeed['score'];
            else
            {
                $total = 0;
                $count = 0;
                foreach( $pagespeed as &$check )
                {
                    $total += (double)$check['score'];
                    $count++;
                }
                if( $count )
                    $score = ceil($total / $count);
            }
        }
    }
    
    return $score;
}

/**
* Load the full Page Speed data from disk
* 
* @param mixed $file
*/
function LoadPageSpeedData($file)
{
    $pagespeed = json_decode(gz_file_get_contents($file), true);

    if( !$pagespeed )
    {
        // try an alternate JSON decoder
        require_once('./lib/json.php');
        $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE | SERVICES_JSON_SUPPRESS_ERRORS);
        $pagespeed = $json->decode(gz_file_get_contents($file), true);
        if( $pagespeed )
        {
            // make sure we only have to go this route once, save the corrected file
            gz_file_put_contents($file, json_encode($pagespeed));
        }
    }
    
    return $pagespeed;
}

/**
* Make the text fit in the available space.
*
* @param mixed $text
* @param mixed $len
*/
function FitText($text, $max_len) {
    $fit_text = $text;
    if (strlen($fit_text) > $max_len) {
        // Trim out middle.
        $num_before = intval($max_len / 2) - 1;
        if (substr($fit_text, $num_before - 1, 1) == ' ') {
            $num_before--;
        } elseif (substr($fit_text, $num_before + 1, 1) == ' ') {
            $num_before++;
        }
        $num_after = $max_len - $num_before - 3;
        $fit_text = (substr($fit_text, 0, $num_before) . '...' .
                     substr($fit_text, -$num_after));
    }
    return $fit_text;
}
