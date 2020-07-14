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
        $cart['data'] = $this->cart->contents();
        if (!isset($cart)) {
            $this->load->view('templates/pelanggan_head');
            $this->load->view('templates/pelanggan_header');
            $this->load->view('pelanggan/pelanggan_keranjangKosong');
            $this->load->view('templates/pelanggan_footer');
            $this->load->view('templates/pelanggan_loader');
        } else {
            $this->load->view('templates/pelanggan_head');
            $this->load->view('templates/pelanggan_header');
            $this->load->view('pelanggan/pelanggan_keranjang', $cart);
            $this->load->view('templates/pelanggan_footer');
        }
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
        redirect("KeranjangController/Index");
    }
    public function hapusKeranjang($id)
    {

        $data = array(
            'rowid' => $id,
            'qty' => 0
        );
        $this->cart->update($data);
        redirect("KeranjangController/Index");
    }
    public function editKeranjang()
    {
        $idpupuk = $this->input->get('product_pupuk');
        $id = $this->input->get('product_id');
        $dataPupuk = $this->pupukModel->getPupuk($idpupuk);
        $qty = $this->input->get('product_qty');
        if ($dataPupuk[0]['jumlah_pupuk'] < $qty) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Barang Yang anda pilih stoknya terbatas!!!</div>');
            redirect("KeranjangController/Index");
        } else {
            $data = array(
                'rowid' => $id,
                'qty' => $qty
            );
            $this->cart->update($data);
            redirect("KeranjangController/Index");
        }
    }
    public function hapusSemua()
    {
        $this->cart->destroy();
        redirect("KeranjangController/Index");
    }
    public function getAlldata()
    {
        return $this->cart->contents();
    }
}
