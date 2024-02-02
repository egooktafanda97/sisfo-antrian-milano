<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load library, model, atau helper yang dibutuhkan
    }

    public function index()
    {
        // Tampilkan halaman login
        $this->load->view('Page/login');
    }

    public function processLogin()
    {
        // Ambil data input dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        // Proses validasi atau otentikasi sesuai dengan data di database
        $this->db->where('username', $username);
        $user = $this->db->get('tb_user')->row();
    
        if ($user && password_verify($password, $user->password)) {
            // Login sukses, set session atau tindakan lain sesuai kebutuhan
            $data = array(
                'user_id' => $user->user_id,
                'username' => $user->username,
                'role' => $user->role // 'dokter' atau 'admin'
            );
    
            $this->session->set_userdata($data);
            redirect('home'); // Redirect ke home setelah login sukses
        } else {
            // Jika login gagal, bisa tambahkan notifikasi atau tindakan lainnya
            echo "Login failed!";
        }
    }
    public function logout()
{
    // Hapus semua data sesi
    $this->session->sess_destroy();

    // Redirect ke halaman login atau halaman lain yang diinginkan
    redirect('login');
}

    
    
}
