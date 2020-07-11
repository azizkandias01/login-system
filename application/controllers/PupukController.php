<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PupukController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('pupukModel');
    }
    public function daftarPupuk()
    {
        if (!isset($_SESSION['name_admin'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">you are not logged in!!</div>');
            redirect('/');
        } else {
            $result['data'] = $this->pupukModel->allPupuk();
            $this->load->view('templates/index_header');
            $this->load->view('home/pupuk', $result);
            $this->load->view('templates/index_footer');
        }
    }
    public function addPupuk()
    {
        $this->pupukModel->addPupuk();
        $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Ditambahkan!</div>');
        redirect('/PupukController/daftarPupuk');
    }
    public function deletePupuk()
    {
        $id = $this->input->post('pupuk_id');
        $where = array('id_pupuk' => $id);
        $this->pupukModel->deletePupuk($where, 'pupuk', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Berhasil Dihapus!</div>');
        redirect('/PupukController/daftarPupuk');
    }
    public function editPupuk()
    {
        $this->pupukModel->editPupuk();
        $this->session->set_flashdata('message', '<div class="alert alert-primary">Berhasil Diupdate!</div>');
        redirect('/PupukController/daftarPupuk');
    }
}
