<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    private $page = "Test/";
  
    public function index()
    {
        $data = [
            "title" => "Test",
            "page" => $this->page . "index",
        ];
        $this->load->view('Router/route', $data);
    }
}