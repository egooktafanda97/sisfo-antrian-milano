<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    private $page = "Dokter/";

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Dokter_model");
    }
    public function index()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            if (!empty($data['id']))
                Dokter_model::where("id", $data['id'])->update(collect($this->input->post())->toArray());
            else
                Dokter_model::create(collect($this->input->post())->merge([
                    "status" => "active"
                ])->toArray());
        }

        $data = [
            "title" => "Test",
            "page" => $this->page . "show-dokter",
            "dokter" => Dokter_model::all()
        ];
        $this->load->view('Router/route', $data);
    }

    public function store()
    {
        $id = $this->input->get("id") ?? null;
        $data = [
            "title" => "Test",
            "page" => $this->page . "store-dokter",
            "dokter" => !empty($id) ? Dokter_model::where("id", $id)->first() : []
        ];
        $this->load->view('Router/route', $data);
    }
    public function delete()
    {
        $id = $this->input->get("id") ?? null;
        Dokter_model::where("id", $id)->delete();
        redirect("/Dokter");
    }
}
