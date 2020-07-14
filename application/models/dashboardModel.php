<?php
defined('BASEPATH') or exit('No direct script access allowed');
class dashboardModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getTransaction()
    {
        $data = $this->db->query('select * from pembelian2 p, akun a where p.id_pelanggan=a.id_akun and p.status="Menunggu Konfirmasi" ');
        return $data->result();
    }
    private function getTotalMoney()
    {
        $data = $this->db->query('select sum(total_pembelian) as total from pembelian2 where status="Pesanan Selesai" ')->result_array();
        return $data;
    }
    private function getTotalTransaction()
    {
        $data = $this->db->query('select count(*) as transaksi from pembelian2')->result_array();
        return $data;
    }
    private function getSuccessTransaction()
    {
        $data = $this->db->query('select count(*) as sukses from pembelian2 where status="Pesanan Selesai"')->result_array();
        return $data;
    }
    public function dataDashboard()
    {
        $data = array(
            'totalPerbulan' => $this->getTotalMoney(),
            'totalTransaksi' => $this->getTotalTransaction(),
            'totalSuccess' => $this->getSuccessTransaction()
        );
        return $data;
    }
}
