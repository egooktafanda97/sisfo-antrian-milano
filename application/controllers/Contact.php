<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    private $page = "Website/";
  
    public function index()
    {
        $data = [
            "title" => "Kontak",
            "page" => $this->page . "contact",
        ];
        $this->load->view('Router/website', $data);
    }
}