<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CheckoutController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkoutModel');
        $this->load->library('cart');
    }
    public function Index()
    {

        $cart['data'] = $this->cart->contents();
        $this->load->view('templates/pelanggan_head');
        $this->load->view('templates/pelanggan_header');
        $this->load->view('pelanggan/pelanggan_checkout', $cart);
        $this->load->view('templates/pelanggan_footer');
        $this->load->view('templates/pelanggan_loader');
    }
    public function pembelianPupuk()
    {
        $this->checkoutModel->addPembelian();
        $this->checkoutModel->pembelianPupuk();
        $this->cart->destroy();
        redirect("UserController/Index");
    }
}
