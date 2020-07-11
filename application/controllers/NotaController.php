<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('riwayatModel');
        $this->load->library('cart');
    }
    public function Nota()
    {
        $id = $this->input->get('id');
        $dataNota['data2'] = $this->riwayatModel->_getDetail($id);
        $tgl = $this->input->get('tanggal');
        $total = $this->input->get('total');
        $status = $this->input->get('status');
        $data['data'] = array('id' => $id, 'tanggal' => $tgl, 'total' => $total, 'status' => $status);
        $this->load->view('templates/pelanggan_head');
        $this->load->view('templates/pelanggan_header', $dataNota);
        $this->load->view('pelanggan/pelanggan_nota', $data);
        $this->load->view('templates/pelanggan_footer');
        $this->load->view('templates/pelanggan_loader');
    }
}
