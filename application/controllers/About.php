<?php

defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    private $page = "Website/";

    public function index()
    {
        $data = [
            "title" => "About",
            "page" => $this->page . "about",
        ];
        $this->load->view('Router/website', $data);
    }
}
