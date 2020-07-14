<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('account');
        $this->load->model('dashboardModel');
    }
    public function akun()
    {
        if (!isset($_SESSION['name_admin'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">you are not logged in!!</div>');
            redirect('/');
        } else {
            $result['data'] = $this->account->alldata();
            $this->load->view('templates/index_header');
            $this->load->view('home/akun', $result);
            $this->load->view('templates/index_footer');
        }
    }

    public function index()
    {
        if (!isset($_SESSION['name_admin'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">you are not logged in!!</div>');
            redirect('/');
        } else {
            $data['data'] = json_decode(
                file_get_contents('http://127.0.0.1/api/rest_ci/akun', true)
            );
            $dashboard['dash'] = $this->dashboardModel->dataDashboard();
            $transaksi['transaksi'] = $this->dashboardModel->getTransaction();
            $this->load->view('templates/index_header', $transaksi);
            $this->load->view('templates/index_footer', $dashboard);
            $this->load->view('home/dashboard', $data);
        }
    }
}
