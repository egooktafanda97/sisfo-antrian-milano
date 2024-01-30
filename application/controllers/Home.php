<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $page = "Home/";
  
    public function index()
    {
        $data = [
            "title" => "Home",
            "page" => $this->page . "index",
        ];
        $this->load->view('Router/route', $data);
    }
}