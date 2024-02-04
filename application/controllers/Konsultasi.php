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

        $this->load->model("Antrian_model");
        $this->load->model("Dokter_model");
        $this->load->model("Jadwal_model");
        $this->load->model("Layanan_model");
        $this->load->model("Pendaftaran_model");
        $this->load->model("User_model");


        $this->userId = auth()->id_user;
    }

    public function index()
    {

        // $this->db->select('tb_antrian.*, tb_daftar.nama as nama_pasien, tb_dokter.nama_dokter,tb_antrian.status_konsul,tb_dokter.user_id');
        // $this->db->from('tb_antrian');
        // $this->db->join('tb_daftar', 'tb_antrian.id_antrian = tb_daftar.id_antrian', 'left');
        // $this->db->join('tb_dokter', 'tb_daftar.id_dokter = tb_dokter.id_dokter', 'left');
        // $this->db->where("tb_dokter.user_id", $this->userId);
        // $this->db->where("tb_antrian.tanggal", date("Y-m-d"));
        // $this->db->where("tb_antrian.status_konsul", null);
        // $this->db->where("tb_antrian.konsul_act", null);
        // $this->db->where("tb_antrian.status_konsul IS NULL OR tb_antrian.status_konsul = ''");
        // $this->db->where("tb_antrian.konsul_act = '' AND tb_antrian.konsul_act != true");
        // $this->db->where("tb_antrian.confirmasi_kedatangan", 'true');
        // $this->db->where("tb_antrian.status", 'dikonfirmasi');
        // $this->db->order_by("tb_antrian.antrian");
        // $data['antrian_data'] = $this->db->get()->result();

        $antrianData = Antrian_model::select('tb_antrian.*', 'tb_daftar.nama as nama_pasien', 'tb_dokter.nama_dokter', 'tb_antrian.status_konsul', 'tb_dokter.user_id')
            ->leftJoin('tb_daftar', 'tb_antrian.id_antrian', '=', 'tb_daftar.id_antrian')
            ->leftJoin('tb_dokter', 'tb_daftar.id_dokter', '=', 'tb_dokter.id_dokter')
            ->where('tb_dokter.user_id', $this->userId)
            ->where('tb_antrian.tanggal', date('Y-m-d'))
            ->where(function ($x) {
                $x->whereNull('tb_antrian.status_konsul')
                    ->orWhere('tb_antrian.status_konsul', '');
            })
            ->where(function ($query) {
                $query->whereNull('tb_antrian.status_konsul')
                    ->orWhere('tb_antrian.status_konsul', '');
            })
            ->where(function ($query) {
                $query->where('tb_antrian.konsul_act', '')
                    ->orWhere('tb_antrian.konsul_act', '!=', 'true')
                    ->orWhere('tb_antrian.konsul_act', null);
            })
            ->where('tb_antrian.confirmasi_kedatangan', 'true')
            ->where('tb_antrian.status', 'dikonfirmasi')
            ->orderBy('tb_antrian.antrian')
            ->get();

        // $this->db->select('tb_antrian.*, tb_daftar.nama as nama_pasien, tb_dokter.nama_dokter,tb_antrian.status_konsul');
        // $this->db->from('tb_antrian');
        // $this->db->join('tb_daftar', 'tb_antrian.id_antrian = tb_daftar.id_antrian', 'left');
        // $this->db->join('tb_dokter', 'tb_daftar.id_dokter = tb_dokter.id_dokter', 'left');
        // $this->db->where("tb_dokter.user_id", $this->userId);
        // $this->db->where("tb_antrian.tanggal", date("Y-m-d"));
        // $this->db->where("(tb_antrian.status_konsul IS NULL OR tb_antrian.status_konsul = '')");
        // $this->db->where("tb_antrian.confirmasi_kedatangan", 'true');
        // $this->db->where("tb_antrian.status", 'dikonfirmasi');
        // $this->db->where("tb_antrian.konsul_act", 'true');
        // $this->db->order_by("tb_antrian.antrian");
        // $pasien_act = $this->db->get()->row();

        $pasien_act = Antrian_model::select('tb_antrian.*', 'tb_daftar.nama as nama_pasien', 'tb_dokter.nama_dokter', 'tb_antrian.status_konsul', 'tb_dokter.user_id')
            ->leftJoin('tb_daftar', 'tb_antrian.id_antrian', '=', 'tb_daftar.id_antrian')
            ->leftJoin('tb_dokter', 'tb_daftar.id_dokter', '=', 'tb_dokter.id_dokter')
            ->where('tb_dokter.user_id', $this->userId)
            ->where('tb_antrian.tanggal', date('Y-m-d'))
            ->where(function ($x) {
                $x->whereNull('tb_antrian.status_konsul')
                    ->orWhere('tb_antrian.status_konsul', '');
            })
            ->where(function ($x) {
                $x->where('tb_antrian.konsul_act', 'true')
                    ->orWhere('tb_antrian.konsul_act', true);
            })
            ->where(function ($query) {
                $query->whereNull('tb_antrian.status_konsul')
                    ->orWhere('tb_antrian.status_konsul', '');
            })

            ->where('tb_antrian.confirmasi_kedatangan', 'true')
            ->where('tb_antrian.status', 'dikonfirmasi')
            ->orderBy('tb_antrian.antrian')
            ->first();


        $data = [
            "title" => "Daftar Antrian",
            "page" => $this->page . "show-daftar",
            "antrian_data" => $antrianData,
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
            $updates = $this->db->affected_rows();
            $getSetting = $this->db->get_where("settings", ["setting_key" => "session_wa"])->row();
            $treAntrian = $this->next_queue_3();
            $this->sendText([
                "session" => $getSetting->setting_value,
                "wa" => $nextAntrian->nowa,
                "msg" => "Antrian dengan nomor antrian : $nextAntrian->antrian atas nama $nextAntrian->nama_pasien segera menuju admin"
            ]);
            foreach ($treAntrian as $x) {
                if ($x->antrian != $nextAntrian->id_antrian)
                    $this->sendText([
                        "session" => $getSetting->setting_value,
                        "wa" => $x->nowa,
                        "msg" => "Mohono bersiapsiap karna antrian andaa akan segera di panggil :" . $x->antrian
                    ]);
            }



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
        $antrianData = Antrian_model::select('tb_antrian.*', 'tb_daftar.nama as nama_pasien', 'tb_dokter.nama_dokter', 'tb_antrian.status_konsul', 'tb_dokter.user_id', 'tb_daftar.nowa')
            ->leftJoin('tb_daftar', 'tb_antrian.id_antrian', '=', 'tb_daftar.id_antrian')
            ->leftJoin('tb_dokter', 'tb_daftar.id_dokter', '=', 'tb_dokter.id_dokter')
            ->where('tb_dokter.user_id', $this->userId)
            ->where('tb_antrian.tanggal', date('Y-m-d'))
            ->where(function ($x) {
                $x->whereNull('tb_antrian.status_konsul')
                    ->orWhere('tb_antrian.status_konsul', '');
            })
            ->where(function ($query) {
                $query->where('tb_antrian.konsul_act', '')
                    ->orWhere('tb_antrian.konsul_act', '!=', 'true')
                    ->orWhere('tb_antrian.konsul_act', null);
            })
            ->where('tb_antrian.confirmasi_kedatangan', 'true')
            ->where('tb_antrian.status', 'dikonfirmasi')
            ->orderBy('tb_antrian.antrian')
            ->take(1)
            ->first();
        return $antrianData;
    }

    public function next_queue_3()
    {
        $antrianData = Antrian_model::select('tb_antrian.*', 'tb_daftar.nama as nama_pasien', 'tb_dokter.nama_dokter', 'tb_antrian.status_konsul', 'tb_dokter.user_id', 'tb_daftar.nowa')
            ->leftJoin('tb_daftar', 'tb_antrian.id_antrian', '=', 'tb_daftar.id_antrian')
            ->leftJoin('tb_dokter', 'tb_daftar.id_dokter', '=', 'tb_dokter.id_dokter')
            ->where('tb_dokter.user_id', $this->userId)
            ->where('tb_antrian.tanggal', date('Y-m-d'))

            ->where(function ($x) {
                $x->whereNull('tb_antrian.status_konsul')
                    ->orWhere('tb_antrian.status_konsul', '');
            })
            ->where(function ($query) {
                $query->whereNull('tb_antrian.status_konsul')
                    ->orWhere('tb_antrian.status_konsul', '');
            })
            ->where(function ($query) {
                $query->where('tb_antrian.konsul_act', '')
                    ->orWhere('tb_antrian.konsul_act', '!=', 'true')
                    ->orWhere('tb_antrian.konsul_act', null);
            })
            ->where('tb_antrian.confirmasi_kedatangan', 'true')
            ->where('tb_antrian.status', 'dikonfirmasi')
            ->orderBy('tb_antrian.antrian')
            ->take(3)
            ->get();
        return $antrianData;
    }

    public function sendText($props = [])
    {
        return CurlPost('http://localhost:5040/api/send-text', [
            "session" => $props['session'],
            "to" => $props['wa'],
            "text" => $props['msg'],
        ]);
    }
}
