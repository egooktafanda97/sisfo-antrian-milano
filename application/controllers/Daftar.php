<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    private $page = "Website/";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {
        // Mengambil data dokter dan jamkes
        $data['dokter_data'] = $this->db->get('tb_dokter')->result();
        $data['jamkes_data'] = $this->db->get('tb_jamkes')->result();

        // Tambahkan informasi lainnya ke dalam data
        $data['title'] = "Pendaftaran";
        $data['page'] = $this->page . "daftar";

        $this->load->view('Router/website', $data);
    }


    public function simpanDaftar()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'nowa' => $this->input->post('nowa'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'umur' => $this->input->post('umur'),
            'berat_badan' => $this->input->post('berat_badan'),
            'tanggal_besuk' => $this->input->post('tanggal_besuk'),
            'penyakit' => $this->input->post('penyakit'),
            'id_dokter' => $this->input->post('id_dokter'),
            'id_jamkes' => $this->input->post('id_jamkes')
            // Tambahkan field lainnya sesuai kebutuhan
        );

        $this->db->insert('tb_daftar', $data);

        if ($this->db->affected_rows() > 0) {
            $data['status'] = true;
        } else {
            redirect("Daftar");
        }

        // Tambahkan informasi lainnya ke dalam data
        $data['title'] = "Daftar Response";
        $data['page'] = $this->page . "daftar_response";

        $this->load->view('Page/Website/daftar_response.php', $data);
    }
}
