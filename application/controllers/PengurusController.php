<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengurusController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('dashboardModel');
    }
    public function Index()
    {
        if (!isset($_SESSION['name_pengurus'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">you are not logged in!!</div>');
            redirect('/');
        } else {
            $data['data'] = json_decode(
                file_get_contents('http://127.0.0.1/api/rest_ci/akun', true)
            );
            $dashboard['dash'] = $this->dashboardModel->dataDashboard();
            $transaksi['transaksi'] = $this->dashboardModel->getTransaction();
            $this->load->view('templates/pengurus_header', $transaksi);
            $this->load->view('templates/index_footer', $dashboard);
            $this->load->view('home/dashboard', $data);
        }
    }
}
