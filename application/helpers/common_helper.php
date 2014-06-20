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