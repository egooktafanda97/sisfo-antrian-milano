<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{
    private $page = "konsultasi/";
    private $userId;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->userId = auth()->id_user;
    }

    public function index()
    {

        $this->db->select('tb_antrian.*, tb_daftar.nama as nama_pasien, tb_dokter.nama_dokter,tb_antrian.status_konsul');
        $this->db->from('tb_antrian');
        $this->db->join('tb_daftar', 'tb_antrian.id_antrian = tb_daftar.id_antrian', 'left');
        $this->db->join('tb_dokter', 'tb_daftar.id_dokter = tb_dokter.id_dokter', 'left');
        $this->db->where("tb_dokter.user_id", $this->userId);
        $this->db->where("tb_antrian.tanggal", date("Y-m-d"));
        $this->db->where("tb_antrian.status_konsul", null);
        $this->db->where("tb_antrian.konsul_act", null);
        $this->db->where("tb_antrian.status_konsul IS NULL OR tb_antrian.status_konsul = ''");
        $this->db->where("tb_antrian.konsul_act = '' AND tb_antrian.konsul_act != true");
        $this->db->where("tb_antrian.confirmasi_kedatangan", 'true');
        $this->db->where("tb_antrian.status", 'dikonfirmasi');
        $this->db->order_by("tb_antrian.antrian");
        $data['antrian_data'] = $this->db->get()->result();

        $this->db->select('tb_antrian.*, tb_daftar.nama as nama_pasien, tb_dokter.nama_dokter,tb_antrian.status_konsul');
        $this->db->from('tb_antrian');
        $this->db->join('tb_daftar', 'tb_antrian.id_antrian = tb_daftar.id_antrian', 'left');
        $this->db->join('tb_dokter', 'tb_daftar.id_dokter = tb_dokter.id_dokter', 'left');
        $this->db->where("tb_dokter.user_id", $this->userId);
        $this->db->where("tb_antrian.tanggal", date("Y-m-d"));
        $this->db->where("(tb_antrian.status_konsul IS NULL OR tb_antrian.status_konsul = '')");
        $this->db->where("tb_antrian.confirmasi_kedatangan", 'true');
        $this->db->where("tb_antrian.status", 'dikonfirmasi');
        $this->db->where("tb_antrian.konsul_act", 'true');
        $this->db->order_by("tb_antrian.antrian");
        $pasien_act = $this->db->get()->row();

        $data = [
            "title" => "Daftar Antrian",
            "page" => $this->page . "show-daftar",
            "antrian_data" => $data['antrian_data'],
            "antrian_data_act" => $pasien_act,
        ];

        $this->load->view('Router/route', $data);
    }


    public function done($id)
    {

        $this->db->where("id_antrian", $id);
        $antrianToUpdate = $this->db->get("tb_antrian")->row();

        // Periksa apakah data ditemukan
        if ($antrianToUpdate) {
            // Lakukan update
            $this->db->where("id_antrian", $id);
            $this->db->update("tb_antrian", ["status_konsul" => "selesai"]);

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

    public  function reject($id)
    {
        $this->db->where("id_antrian", $id);
        $antrianToUpdate = $this->db->get("tb_antrian")->row();

        // Periksa apakah data ditemukan
        if ($antrianToUpdate) {
            // Lakukan update
            $this->db->where("id_antrian", $id);
            $this->db->update("tb_antrian", ["status_konsul" => "batal", "konsul_act" => false]);

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

    public function next_queues()
    {
        $nextAntrian = $this->next_queue_active();
        // Dapatkan data yang sesuai kondisi
        $this->db->where("id_antrian", $nextAntrian->id_antrian);
        $antrianToUpdate = $this->db->get("tb_antrian")->row();

        // Periksa apakah data ditemukan
        if ($antrianToUpdate) {
            // Lakukan update
            $this->db->where("id_antrian", $nextAntrian->id_antrian);
            $this->db->update("tb_antrian", ["konsul_act" => "true"]);

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

    public function next_queue_active()
    {
        $this->db->select('tb_antrian.*, tb_daftar.nama as nama_pasien, tb_dokter.nama_dokter,tb_antrian.status_konsul');
        $this->db->from('tb_antrian');
        $this->db->join('tb_daftar', 'tb_antrian.id_antrian = tb_daftar.id_antrian', 'left');
        $this->db->join('tb_dokter', 'tb_daftar.id_dokter = tb_dokter.id_dokter', 'left');
        $this->db->where("tb_dokter.user_id", $this->userId);
        $this->db->where("tb_antrian.tanggal", date("Y-m-d"));
        $this->db->where("(tb_antrian.status_konsul IS NULL OR tb_antrian.status_konsul = '')");
        $this->db->where("tb_antrian.confirmasi_kedatangan", 'true');
        $this->db->where("tb_antrian.status", 'dikonfirmasi');
        $this->db->where("tb_antrian.konsul_act", 'true');
        $this->db->order_by("tb_antrian.antrian");
        $this->db->limit(1);
        $data['antrian_data'] = $this->db->get()->row();
        return $data['antrian_data'];
    }
}
