<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pupukModel');
    }
    public function index()
    {
        if (!isset($_SESSION['email'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">you are not logged in!!</div>');
            redirect('/');
        } else {
            $data['data'] = $this->pupukModel->allPupuk();
            $this->load->view('templates/pelanggan_head');
            $this->load->view('templates/pelanggan_header');
            $this->load->view('pelanggan/pelanggan_home', $data);
            $this->load->view('templates/pelanggan_footer');
            $this->load->view('templates/pelanggan_loader');
        }
    }
    public function Logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/'));
    }
    public function coba()
    {
        $data['data'] = $this->pupukModel->allPupuk();
        $this->load->view('pelanggan/coba', $data);
    }
}
