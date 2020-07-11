<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembayaranController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaranModel');
        $this->load->library('cart');
    }
    public function Pembayaran()
    {
        $data['data'] = array('id' => $id = $this->input->get('id'), 'total' => $this->input->get('total'));
        $this->load->view('templates/pelanggan_head');
        $this->load->view('templates/pelanggan_header');
        $this->load->view('pelanggan/pelanggan_pembayaran', $data);
        $this->load->view('templates/pelanggan_footer');
        $this->load->view('templates/pelanggan_loader');
    }
    public function addPembayaran()
    {
        $this->pembayaranModel->addPembayaran();
        $this->session->set_flashdata('message', '<div class="alert alert-success">Bukti Telah Diserahkan!</div>');
        redirect('/RiwayatController/Index');
    }
}
