<?php
defined('BASEPATH') or exit('No direct script access allowed');
class checkoutModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        $this->load->library('cart');
    }
    public function addPembelian()
    {
        date_default_timezone_set("Asia/Jakarta");
        $cart = $this->cart->contents();
        $jumlahBayar = 0;
        foreach ($cart as $bayar) {
            $jumlahBayar += $bayar['subtotal'];
        }
        $data = array(
            'id_pelanggan' => $_SESSION['id'],
            'status' => "Menunggu Pembayaran",
            'total_pembelian' => $jumlahBayar,
            'alamat' => $_SESSION['address'],
            'tanggal' => date("Y-m-d H:i:s")
        );
        $this->db->insert('pembelian2', $data);
    }
    public function pembelianPupuk()
    {
        $cart = $this->cart->contents();
        foreach ($cart as $keranjang) {
            $data = array(
                'id_pembelian' => $this->getMaxId(),
                'id_pupuk' => $keranjang['id'],
                'jumlah' => $keranjang['qty']
            );
            $this->db->insert('pembelian_pupuk2', $data);
        }
    }
    private function getMaxId()
    {
        $this->db->select_max('id_pembelian');
        $query = $this->db->get('pembelian2')->row_array();
        return $query['id_pembelian'];
    }
}
