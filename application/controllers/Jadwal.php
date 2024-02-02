<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    private $page = "Jadwal/";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    public function index()
{
    // Mengambil data jadwal beserta informasi dokter dari tabel tb_jadwal dan tb_dokter
    $this->db->select('tb_jadwal.*, tb_dokter.nama_dokter');
    $this->db->from('tb_jadwal');
    $this->db->join('tb_dokter', 'tb_jadwal.id_dokter = tb_dokter.id_dokter', 'left');
    $data['jadwal_data'] = $this->db->get()->result();

    $data = [
        "title" => "Jadwal",
        "page" => $this->page . "index",
        "jadwal_data" => $data['jadwal_data']
    ];

    $this->load->view('Router/route', $data);
}


    public function tambah()
    {
        // Mengambil data dokter dari tabel tb_dokter
        $data['dokter_data'] = $this->db->get('tb_dokter')->result();

        $data = [
            "title" => "Tambah Jadwal",
            "page" => $this->page . "tambah",
            "dokter_data" => $data['dokter_data']
        ];

        $this->load->view('Router/route', $data);
    }

    public function edit($id_jadwal)
{
    // Mengambil data jadwal berdasarkan ID
    $this->db->select('tb_jadwal.*, tb_dokter.nama_dokter');
    $this->db->from('tb_jadwal');
    $this->db->join('tb_dokter', 'tb_jadwal.id_dokter = tb_dokter.id_dokter', 'left');
    $this->db->where('id_jadwal', $id_jadwal);
    $data['jadwal'] = $this->db->get()->row();

    // Mengambil data dokter dari tabel tb_dokter
    $data['dokter_data'] = $this->db->get('tb_dokter')->result();

    $data = [
        "title" => "Edit Jadwal",
        "page" => $this->page . "update",
        "jadwal" => $data['jadwal'],
        "dokter_data" => $data['dokter_data']
    ];

    $this->load->view('Router/route', $data);
}


    public function tambahJadwal()
    {
        $data = array(
            'id_dokter' => $this->input->post('id_dokter'),
            'bagian' => $this->input->post('bagian'),
            'hari_pertama' => $this->input->post('hari_pertama'),
            'hari_terakhir' => $this->input->post('hari_terakhir'),
            'jam_pertama' => $this->input->post('jam_pertama'),
            'jam_terakhir' => $this->input->post('jam_terakhir')
            // Tambahkan field lainnya sesuai kebutuhan
        );

        $this->db->insert('tb_jadwal', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Jadwal berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Jadwal gagal ditambahkan.');
        }

        redirect('jadwal');
    }

    public function updateJadwal()
{
    $idJadwal = $this->input->post('id_jadwal');

    $data = array(
        'id_dokter' => $this->input->post('id_dokter'),
        'bagian' => $this->input->post('bagian'),
        'hari_pertama' => $this->input->post('hari_pertama'),
        'hari_terakhir' => $this->input->post('hari_terakhir'),
        'jam_pertama' => $this->input->post('jam_pertama'),
        'jam_terakhir' => $this->input->post('jam_terakhir')
        // Tambahkan field lainnya sesuai kebutuhan
    );

    $this->db->where('id_jadwal', $idJadwal);
    $this->db->update('tb_jadwal', $data);

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Jadwal berhasil diupdate.');
    } else {
        $this->session->set_flashdata('error', 'Jadwal gagal diupdate.');
    }

    redirect('jadwal');
}
public function deleteJadwal($id_jadwal)
{
    $this->db->where('id_jadwal', $id_jadwal);
    $this->db->delete('tb_jadwal');

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data Jadwal berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Data Jadwal gagal dihapus.');
    }

    redirect('jadwal');
}

}
