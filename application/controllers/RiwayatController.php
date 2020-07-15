<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RiwayatController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('riwayatModel');
        $this->load->library('cart');
    }
    public function Index()
    {
        $id = $_SESSION['id'];
        $cart['data'] = $this->riwayatModel->getTotalItems($id);
        // $totalItem = $this->riwayatModel->getTotalItems($id);
        // print_r($totalItem);
        $this->load->view('templates/pelanggan_head');
        $this->load->view('templates/pelanggan_header');
        $this->load->view('pelanggan/pelanggan_riwayat', $cart);
        $this->load->view('templates/pelanggan_footer');
        $this->load->view('templates/pelanggan_loader');
    }
    public function deleteHistory()
    {
        $id_pembelian = $this->input->post('hapus');
        $data = array('is_deleted' => "1");
        $this->riwayatModel->delete($id_pembelian, $data);
        redirect("RiwayatController/index");
    }
}
