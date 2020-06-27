<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeranjangController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pupukModel');
        $this->load->library('cart');
    }
    public function Index()
    {
        //$cart = $this->cart->contents();
        // if (!isset($cart)) {
        //     $this->load->view('templates/pelanggan_head');
        //     $this->load->view('templates/pelanggan_header');
        //     $this->load->view('pelanggan/pelanggan_keranjangKosong');
        //     $this->load->view('templates/pelanggan_footer');
        //     $this->load->view('templates/pelanggan_loader');
        // } else {
        // $cart = $this->cart->contents();
        $m = "a";

        $this->load->view('templates/pelanggan_head');
        $this->load->view('templates/pelanggan_header');
        $this->load->view('pelanggan/pelanggan_keranjang', $m);
        $this->load->view('templates/pelanggan_footer');
        $this->load->view('templates/pelanggan_loader');
        //}
    }
    public function tambahKeranjang($id)
    {
        $data = $this->pupukModel->getPupuk($id);
        $insertData = array(
            'id'      => $data[0]['id_pupuk'],
            'qty'     => 1,
            'price'   => $data[0]['harga_pupuk'],
            'name'    => $data[0]['nama_pupuk']
        );
        $this->cart->insert($insertData);
        $this->Index();
    }
    public function semuaKeranjang()
    {
        $cart = $this->cart->contents();
        foreach ($cart as $keranjang) {
            echo "nama : " . $keranjang['name'] . "<br>";
        }
        $this->load->view('pelanggan/pelanggan_keranjang', $cart);
    }
}
