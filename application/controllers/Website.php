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
            'dok' => $this->dokter()
        ];
        $this->load->view('Router/website', $data);
    }

    public function dokter()
    {
        $this->db->select('*'); // Ganti dengan kolom yang sesuai
        $this->db->from('tb_dokter');
        $this->db->join('tb_jadwal', 'tb_jadwal.id_dokter = tb_dokter.id_dokter', 'left'); // Sesuaikan jenis join jika diperlukan
        $this->db->join('tb_layanan', 'tb_layanan.id_layanan = tb_dokter.id_layanan', 'left');
        $isDoctor = $this->db->get()->result();

        return $isDoctor;
    }
}
