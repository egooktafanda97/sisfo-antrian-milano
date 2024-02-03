<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian extends CI_Controller
{
    private $page = "Antrian/";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {
        // Mengambil data antrian dengan join ke tb_daftar dan tb_dokter
        $this->db->select('tb_antrian.*, tb_daftar.nama as nama_pasien, tb_dokter.nama_dokter');
        $this->db->from('tb_antrian');
        $this->db->join('tb_daftar', 'tb_antrian.id_antrian = tb_daftar.id_antrian', 'left');
        $this->db->join('tb_dokter', 'tb_daftar.id_dokter = tb_dokter.id_dokter', 'left');
        $data['antrian_data'] = $this->db->get()->result();

        $data = [
            "title" => "Antrian",
            "page" => $this->page . "index",
            "antrian_data" => $data['antrian_data']
        ];

        $this->load->view('Router/route', $data);
    }

    public function confirmasi_kedatangan($id)
    {
        $this->db->where("id_antrian", $id);
        $antrianToUpdate = $this->db->get("tb_antrian")->row();

        // Periksa apakah data ditemukan
        if ($antrianToUpdate) {
            // Lakukan update
            $this->db->where("id_antrian", $id);
            $this->db->update("tb_antrian", ["confirmasi_kedatangan" => true]);

            // Lakukan sesuatu setelah update
            $updates = $this->db->affected_rows();
            if ($updates > 0) {
                redirect("Konsultasi");
            } else {
                redirect("Konsultasi");
            }
        } else {
            redirect("Konsultasi");
        }
    }
}
