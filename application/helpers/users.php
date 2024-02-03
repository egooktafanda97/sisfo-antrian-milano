<?php
function auth()
{
    $CI = &get_instance();
    return $CI->session->get_userdata();
}
