<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksiModel');
        $this->load->model('riwayatModel');
        $this->load->library('cart');
    }
    public function daftarTransaksi()
    {
        $cart['data'] = $this->transaksiModel->getAll();
        $this->load->view('templates/index_header');
        $this->load->view('home/transaksi', $cart);
        $this->load->view('templates/index_footer');
    }
    public function nota()
    {
        $id = $this->input->get('id');
        $id_pelanggan = $this->input->get('id_pelanggan');
        $id_pembayaran = $this->input->get('id_pembayaran');
        $dataNota['data2'] = array(
            'detail' => $this->riwayatModel->_getDetail($id),
            'pelanggan' => $this->riwayatModel->getPelanggan($id_pelanggan)
        );
        $pembayaran['data3'] = $this->riwayatModel->getPembayaran($id_pembayaran);
        $tgl = $this->input->get('tanggal');
        $total = $this->input->get('total');
        $status = $this->input->get('status');
        $data['data'] = array('id' => $id, 'tanggal' => $tgl, 'total' => $total, 'status' => $status);
        $this->load->view('templates/index_header', $dataNota);
        $this->load->view('templates/index_footer', $pembayaran);
        $this->load->view('home/nota', $data);
    }
    public function konfirmasiPembayaran()
    {
        $id_pembelian = $this->input->post('konfirmasi');
        $data = array('status' => "Pesanan Dikirimkan!");
        $this->transaksiModel->konfirmasiPembayaran($id_pembelian, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Pesanan Dikonfirmasi!</div>');
        redirect("TransaksiController/daftarTransaksi");
    }
    public function konfirmasiDiterima()
    {
        $id_pembelian = $this->input->get('id');
        $data = array('status' => "Pesanan Selesai");
        $this->transaksiModel->konfirmasiPembayaran($id_pembelian, $data);
        redirect("RiwayatController/index");
    }
    public function tolakPembayaran()
    {
        $id_pembelian = $this->input->post('tolak');
        $data = array('status' => "Pesanan Ditolak");
        $this->transaksiModel->tolakPembayaran($id_pembelian, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Pesanan Ditolak!</div>');
        redirect("TransaksiController/daftarTransaksi");
    }
    public function hapusTransaksi()
    {
        $id_pembelian = $this->input->post('hapus');
        $this->transaksiModel->hapusTransaksi($id_pembelian);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Transaksi Berhasil Dihapus!!!</div>');
        redirect("TransaksiController/daftarTransaksi");
    }
}
