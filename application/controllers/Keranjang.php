<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pupukModel');
        $this->load->library('cart');
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
