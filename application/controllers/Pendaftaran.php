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
    public function index()
    {
        // Mengambil data daftar dengan join ke tb_dokter dan tb_jamkes
        $this->db->select('tb_daftar.*, tb_dokter.nama_dokter, tb_jamkes.nama_jamkes, tb_jamkes.singkatan');
        $this->db->from('tb_daftar');
        $this->db->join('tb_dokter', 'tb_daftar.id_dokter = tb_dokter.id_dokter', 'left');
        $this->db->join('tb_jamkes', 'tb_daftar.id_jamkes = tb_jamkes.id_jamkes', 'left');
        $data['daftar_data'] = $this->db->get()->result();

        // Memutar urutan array (data terakhir di atas)
        $data['daftar_data'] = array_reverse($data['daftar_data']);

        $data = [
            "title" => "Pendaftaran",
            "page" => $this->page . "index",
            "daftar_data" => $data['daftar_data']
        ];

        $this->load->view('Router/route', $data);
    }


    public function konfirmasiPendaftaran($id_daftar)
    {
        // Mendapatkan data pendaftaran berdasarkan ID
        $pendaftaran = $this->db->get_where('tb_daftar', array('id_daftar' => $id_daftar))->row();

        // Mendapatkan huruf awal dari id_dokter
        $huruf_awal = substr($pendaftaran->id_dokter, 0, 1);

        // Mendapatkan kode antrian untuk id_dokter tersebut
        $kode_antrian = $this->generateKodeAntrian($huruf_awal);

        // Menyiapkan data untuk dimasukkan ke dalam tabel tb_antrian
        $antrian_data = array(
            'tanggal' => date('Y-m-d'), // Menggunakan tanggal hari ini
            'antrian' => $kode_antrian, // Menggunakan kode antrian yang dihasilkan
            'status' => "dikonfirmasi" // Menggunakan status konfirmasi (sesuaikan dengan aturan bisnis Anda)
        );

        // Memasukkan data ke dalam tabel tb_antrian
        $this->db->insert('tb_antrian', $antrian_data);
        $id_antrian = $this->db->insert_id(); // Mendapatkan ID antrian yang baru saja dimasukkan

        // Memperbarui kolom id_antrian di dalam tabel tb_daftar
        $this->db->where('id_daftar', $id_daftar);
        $this->db->update('tb_daftar', array('id_antrian' => $id_antrian));

        // Redirect kembali ke halaman pendaftaran
        redirect('pendaftaran');
    }

    // Fungsi untuk menghasilkan kode antrian berdasarkan huruf awal
    private function generateKodeAntrian($huruf_awal)
    {
        // Mendapatkan urutan antrian terakhir berdasarkan huruf awal
        $last_antrian = $this->db->select('MAX(antrian) as last_antrian')
            ->like('antrian', $huruf_awal, 'after')
            ->get('tb_antrian')
            ->row();

        // Jika urutan antrian terakhir tidak ada, set urutan menjadi 1
        $urutan = ($last_antrian->last_antrian) ? intval(substr($last_antrian->last_antrian, 1)) + 1 : 1;

        // Format kode antrian, misal: A001, B002, dst.
        $kode_antrian = $huruf_awal . str_pad($urutan, 3, '0', STR_PAD_LEFT);

        return $kode_antrian;
    }
}
