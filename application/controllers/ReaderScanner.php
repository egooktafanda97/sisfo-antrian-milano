<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    private $page = "Pendaftaran/";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
}
