<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{
    private $page = "Website/";
  
    public function index()
    {
        $data = [
            "title" => "Milano",
            "page" => $this->page . "index",
        ];
        $this->load->view('Router/website', $data);
    }
}