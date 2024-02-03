<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    private $page = "Dokter/";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if (!auth()->username)
            redirect("login");
    }
    public function index()
    {
        // Mengambil data dokter beserta informasi layanan dari tabel tb_dokter dan tb_layanan
        $this->db->select('tb_dokter.*, tb_layanan.nama AS layanan_nama');
        $this->db->from('tb_dokter');
        $this->db->join('tb_layanan', 'tb_dokter.id_layanan = tb_layanan.id_layanan', 'left');
        $data['dokter_data'] = $this->db->get()->result();

        $data = [
            "title" => "Dokter",
            "page" => $this->page . "index",
            "dokter_data" => $data['dokter_data']
        ];

        $this->load->view('Router/route', $data);
    }
    public function tambah()
    {
        // Mengambil data layanan dari tabel tb_layanan
        $data['layanan_data'] = $this->db->get('tb_layanan')->result();

        $data = [
            "title" => "Tambah Dokter",
            "page" => $this->page . "tambah",
            "layanan_data" => $data['layanan_data']
        ];

        $this->load->view('Router/route', $data);
    }
    public function edit($id_dokter)
    {
        // Ambil data dokter dan informasi layanan dari tabel tb_dokter dan tb_layanan
        $this->db->select('tb_dokter.*, tb_layanan.nama AS layanan_nama');
        $this->db->from('tb_dokter');
        $this->db->join('tb_layanan', 'tb_dokter.id_layanan = tb_layanan.id_layanan', 'left');
        $this->db->where('id_dokter', $id_dokter);
        $data['dokter'] = $this->db->get()->row();

        $data = [
            "title" => "Edit Dokter",
            "page" => $this->page . "update",
            "dokter" => $data['dokter'],
            "layanan_data" => $this->db->get('tb_layanan')->result()
        ];

        $this->load->view('Router/route', $data);
    }



    public function tambahDokter()
    {
        // Data untuk tb_user
        $data_user = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama' => $this->input->post('nama_dokter'), // Mengambil nama dari tb_dokter
            'akses' => 'dokter' // Sesuaikan dengan kebutuhan akses
        );

        // Menambah data ke tb_user
        $this->db->insert('tb_user', $data_user);

        $users = $this->db->get_where("tb_user", ["username" => $this->input->post('username')])->row_array();

        // Data untuk tb_dokter
        $data_dokter = array(
            'nama_dokter' => $this->input->post('nama_dokter'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'status' => $this->input->post('status'),
            'pendidikan_akhir' => $this->input->post('pendidikan_akhir'),
            'id_layanan' => $this->input->post('id_layanan'),
            "user_id" => $users['id_user']
        );

        // Menambah data ke tb_dokter
        $this->db->insert('tb_dokter', $data_dokter);

        // Mendapatkan ID dokter yang baru ditambahkan
        $id_dokter = $this->db->insert_id();




        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data dokter berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Data dokter dan user gagal ditambahkan.');
        }

        redirect('dokter');
    }


    public function editDokter()
    {
        $idDokter = $this->input->post('id_dokter');

        $data = array(
            'nama_dokter' => $this->input->post('nama_dokter'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'status' => $this->input->post('status'),
            'pendidikan_akhir' => $this->input->post('pendidikan_akhir'),
            'id_layanan' => $this->input->post('id_layanan')
        );

        $this->db->where('id_dokter', $idDokter);
        $this->db->update('tb_dokter', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data dokter berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Data dokter gagal diupdate.');
        }

        redirect('dokter');
    }
    public function deleteDokter($id_dokter)
    {
        $this->db->where('id_dokter', $id_dokter);
        $this->db->delete('tb_dokter');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data dokter berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data dokter gagal dihapus.');
        }

        redirect('dokter');
    }
}
