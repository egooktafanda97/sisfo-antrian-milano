<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    private $page = "Layanan/";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {
        $data = [
            "title" => "Layanan",
            "page" => $this->page . "index",
            "layanan_data" => $this->db->get('tb_layanan')->result()
        ];

        $this->load->view('Router/route', $data);
    }
    public function tambah()
    {
        $data = [
            "title" => "Tambah Layanan",
            "page" => $this->page . "tambah",
        ];

        $this->load->view('Router/route', $data);
    }
    public function edit($id_layanan)
    {
        // Ambil data layanan berdasarkan ID
        $data['layanan'] = $this->db->get_where('tb_layanan', ['id_layanan' => $id_layanan])->row();
    
        $data = [
            "title" => "Edit Layanan",
            "page" => $this->page . "update",
            "layanan" => $data['layanan']
        ];
    
        $this->load->view('Router/route', $data);
    }
    
    public function tambahLayanan()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'layanan_medis' => $this->input->post('layanan_medis'),
            'info_medis' => $this->input->post('info_medis'),
            'kode_layanan' => $this->input->post('kode_layanan')
        );

        $this->db->insert('tb_layanan', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan.');
        }

        redirect('layanan');
    }
    public function updateLayanan()
{
    $idLayanan = $this->input->post('id_layanan');

    $data = array(
        'nama' => $this->input->post('nama'),
        'layanan_medis' => $this->input->post('layanan_medis'),
        'info_medis' => $this->input->post('info_medis'),
        'kode_layanan' => $this->input->post('kode_layanan')
    );

    $this->db->where('id_layanan', $idLayanan);
    $this->db->update('tb_layanan', $data);

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data berhasil diupdate.');
    } else {
        $this->session->set_flashdata('error', 'Data gagal diupdate.');
    }

    redirect('layanan');
}

public function deleteLayanan($id_layanan)
{
    $this->db->where('id_layanan', $id_layanan);
    $this->db->delete('tb_layanan');

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Data gagal dihapus.');
    }

    redirect('layanan');
}



}
