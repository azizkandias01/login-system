<?php
defined('BASEPATH') or exit('No direct script access allowed');
class riwayatModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        $this->load->library('cart');
    }
    public function getAll()
    {
        $data = $this->db->query('select * from pembelian2');
        return $data->result();
    }
    public function getPembelian($id)
    {
        $this->db->select("*");
        $this->db->from("pembelian2");
        $this->db->where("id_pelanggan", $id);
        return $data = $this->db->get()->result_array(); //mengembalikan nilai berupa array
    }
    public function getTotalItems($id)
    {
        $query = "SELECT p.id_pembelian,p.id_pelanggan,p.id_pembayaran,p.status,p.total_pembelian,p.alamat,p.tanggal, COUNT(*) as total FROM pembelian2 p, pembelian_pupuk2 pp where p.id_pembelian=pp.id_pembelian AND p.id_pelanggan = '" . $id . "' GROUP BY p.id_pembelian";
        $hasil = $this->db->query($query);
        return $hasil->result_array();
    }
    public function _getDetail($id)
    {
        $query = "SELECT * FROM pupuk p, pembelian_pupuk2 pp WHERE p.id_pupuk=pp.id_pupuk AND pp.id_pembelian='" . $id . "'";
        $hasil = $this->db->query($query)->result_array();
        return $hasil;
    }
}
