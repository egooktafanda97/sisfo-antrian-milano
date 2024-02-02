<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jamkes extends CI_Controller
{
    private $page = "Jamkes/";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {
        // Mengambil data jamkes dari tabel tb_jamkes
        $data['jamkes_data'] = $this->db->get('tb_jamkes')->result();

        $data = [
            "title" => "Data Jamkes",
            "page" => $this->page . "index",
            "jamkes_data" => $data['jamkes_data']
        ];

        $this->load->view('Router/route', $data);
    }

    public function tambah()
    {
        $data = [
            "title" => "Tambah Jamkes",
            "page" => $this->page . "tambah"
        ];

        $this->load->view('Router/route', $data);
    }

    public function edit($id_jamkes)
{
    $data['jamkes'] = $this->db->get_where('tb_jamkes', array('id_jamkes' => $id_jamkes))->row();

    $data = [
        "title" => "Edit Jamkes",
        "page" => $this->page . "update",
        "jamkes" => $data['jamkes']
    ];

    $this->load->view('Router/route', $data);
}


    public function tambahJamkes()
    {
        $data = array(
            'singkatan' => $this->input->post('singkatan'),
            'nama_jamkes' => $this->input->post('nama_jamkes')
            // Tambahkan field lainnya sesuai kebutuhan
        );

        $this->db->insert('tb_jamkes', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data jamkes berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Data jamkes gagal ditambahkan.');
        }

        redirect('jamkes');
    }

    public function updateJamkes()
{
    $id_jamkes = $this->input->post('id_jamkes');

    $data = array(
        'singkatan' => $this->input->post('singkatan'),
        'nama_jamkes' => $this->input->post('nama_jamkes')
        // Tambahkan field lainnya sesuai kebutuhan
    );

    $this->db->where('id_jamkes', $id_jamkes);
    $this->db->update('tb_jamkes', $data);

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data jamkes berhasil diperbarui.');
    } else {
        $this->session->set_flashdata('error', 'Data jamkes gagal diperbarui.');
    }

    redirect('jamkes');
}

public function deleteJamkes($id_jamkes)
{
    $this->db->where('id_jamkes', $id_jamkes);
    $this->db->delete('tb_jamkes');

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Data gagal dihapus.');
    }

    redirect('layanan');
}


}
