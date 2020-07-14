<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pembayaranModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
    }
    private function do_upload()
    {
        $foto = $_FILES['bukti'];
        if ($foto = null) {
            echo "nill";
        } else {
            $config['upload_path']          = './assets/img/pembayaran/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('bukti')) {
                echo "gagal upload";
                die();
            } else {
                $foto = $this->upload->data('file_name');
                return $foto;
            }
        }
    }
    public function addPembayaran()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $bank = $this->input->post('bank');
        $jumlah = $this->input->post('jumlah');
        $tanggal = $this->input->post('tanggal');
        $data = array(
            'id_pembelian' => $id,
            'jumlah' => $jumlah,
            'nama' => $nama,
            'bank' => $bank,
            'bukti' => $this->do_upload(),
            'tanggal' => $tanggal
        );
        $this->db->insert('pembayaran', $data);
        $this->updatePembayaran();
    }
    public function getIdPembelian()
    {
        $id = $this->input->post('id');
        $data = $this->db->query("select * from pembayaran where id_pembelian ='" . $id . "'")->row_array();
        return $data;
    }
    public function updatePembayaran()
    {
        $data = $this->getIdPembelian();
        $idPembelian = $data['id_pembelian'];
        $update = array('id_pembayaran' => $data['id_pembayaran'], 'status' => "Menunggu Konfirmasi");
        $this->db->where('id_pembelian', $idPembelian);
        $this->db->update('pembelian2', $update);
    }
}
