<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    private $page = "Laporan/";
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
        $antrianData = Antrian_model::select('tb_antrian.*', 'tb_daftar.nama as nama_pasien', 'tb_dokter.nama_dokter', 'tb_antrian.status_konsul', 'tb_dokter.user_id')
            ->leftJoin('tb_daftar', 'tb_antrian.id_antrian', '=', 'tb_daftar.id_antrian')
            ->leftJoin('tb_dokter', 'tb_daftar.id_dokter', '=', 'tb_dokter.id_dokter')
            ->where('tb_dokter.user_id', $this->userId)
            ->where('tb_antrian.tanggal', (!empty($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d')))
            // ->where(function ($x) {
            //     $x->whereNull('tb_antrian.status_konsul')
            //         ->orWhere('tb_antrian.status_konsul', '');
            // })
            // ->where(function ($query) {
            //     $query->whereNull('tb_antrian.status_konsul')
            //         ->orWhere('tb_antrian.status_konsul', '');
            // })
            // ->where(function ($query) {
            //     $query->where('tb_antrian.konsul_act', '')
            //         ->orWhere('tb_antrian.konsul_act', '!=', 'true')
            //         ->orWhere('tb_antrian.konsul_act', null);
            // })
            ->where('tb_antrian.confirmasi_kedatangan', 'true')
            ->where('tb_antrian.status', 'dikonfirmasi')
            ->orderBy('tb_antrian.antrian')
            ->get();
        $data = [
            "title" => "Laporan Antrian",
            "page" => $this->page . "Laporan-Dokter",
            'antrian' => $antrianData
        ];

        $this->load->view('Router/route', $data);
    }
    public function antrian()
    {
        $antrianData = Antrian_model::select('tb_antrian.*', 'tb_daftar.nama as nama_pasien', 'tb_dokter.nama_dokter', 'tb_antrian.status_konsul', 'tb_dokter.user_id')
            ->leftJoin('tb_daftar', 'tb_antrian.id_antrian', '=', 'tb_daftar.id_antrian')
            ->leftJoin('tb_dokter', 'tb_daftar.id_dokter', '=', 'tb_dokter.id_dokter')
            ->where('tb_antrian.tanggal', (!empty($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d')))
            // ->where(function ($x) {
            //     $x->whereNull('tb_antrian.status_konsul')
            //         ->orWhere('tb_antrian.status_konsul', '');
            // })
            // ->where(function ($query) {
            //     $query->whereNull('tb_antrian.status_konsul')
            //         ->orWhere('tb_antrian.status_konsul', '');
            // })
            // ->where(function ($query) {
            //     $query->where('tb_antrian.konsul_act', '')
            //         ->orWhere('tb_antrian.konsul_act', '!=', 'true')
            //         ->orWhere('tb_antrian.konsul_act', null);
            // })
            ->where('tb_antrian.confirmasi_kedatangan', 'true')
            ->where('tb_antrian.status', 'dikonfirmasi')
            ->orderBy('tb_antrian.antrian')
            ->get();
        $data = [
            "title" => "Laporan Antrian",
            "page" => $this->page . "Laporan-Dokter",
            'antrian' => $antrianData
        ];

        $this->load->view('Router/route', $data);
    }

    public function print()
    {
        $auth = auth();
        $antrianData = Antrian_model::select('tb_antrian.*', 'tb_daftar.nama as nama_pasien', 'tb_dokter.nama_dokter', 'tb_antrian.status_konsul', 'tb_dokter.user_id')
            ->leftJoin('tb_daftar', 'tb_antrian.id_antrian', '=', 'tb_daftar.id_antrian')
            ->leftJoin('tb_dokter', 'tb_daftar.id_dokter', '=', 'tb_dokter.id_dokter')
            ->where('tb_antrian.tanggal', (!empty($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d')))
            ->where(function ($x) use ($auth) {
                if (!empty($auth) && $auth->akses == 'dokter')
                    return $x->where('tb_dokter.user_id', $this->userId);
            })
            // ->where(function ($x) {
            //     $x->whereNull('tb_antrian.status_konsul')
            //         ->orWhere('tb_antrian.status_konsul', '');
            // })
            // ->where(function ($query) {
            //     $query->whereNull('tb_antrian.status_konsul')
            //         ->orWhere('tb_antrian.status_konsul', '');
            // })
            // ->where(function ($query) {
            //     $query->where('tb_antrian.konsul_act', '')
            //         ->orWhere('tb_antrian.konsul_act', '!=', 'true')
            //         ->orWhere('tb_antrian.konsul_act', null);
            // })
            ->where('tb_antrian.confirmasi_kedatangan', 'true')
            ->where('tb_antrian.status', 'dikonfirmasi')
            ->orderBy('tb_antrian.antrian')
            ->get();
        $data = [
            'antrian' => $antrianData
        ];

        $this->load->view('Page/Laporan/Laporan-Antrian.php', $data);
    }
}
