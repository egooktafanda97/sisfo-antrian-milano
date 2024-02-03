<?php
function api_url()
{
    return "https://bidangsampahdlhpelalawan.com/rest/";
}

function auth()
{
    $CI = &get_instance();
    $CI->load->library('session');
    $sesion = $CI->db->get_where("tb_user", ["id_user" => $CI->session->userdata()['user_id']])->row();
    return $sesion;
}
