<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('account');
        $this->load->model('pupukModel');
    }
    public function akun()
    {
        if (!isset($_SESSION['name_admin'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">you are not logged in!!</div>');
            redirect('/');
        } else {
            $result['data'] = $this->account->alldata();
            $this->load->view('templates/index_header');
            $this->load->view('home/akun', $result);
            $this->load->view('templates/index_footer');
        }
    }

    public function index()
    {
        if (!isset($_SESSION['name_admin'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">you are not logged in!!</div>');
            redirect('/');
        } else {
            $result['data'] = $this->account->alldata();
            $this->load->view('templates/index_header');
            $this->load->view('home/index', $result);
            $this->load->view('templates/index_footer');
        }
    }
    function hapus($id)
    {
        $where = array('id_akun' => $id);
        $this->account->hapus_data($where, 'akun');
        redirect('Admin', 'auto');
    }
    public function edit($id)
    {
        $hasil['data'] = $this->account->selectdata($id);
        $this->load->view('templates/index_header');
        $this->load->view('home/edit', $hasil);
    }
    public function editAction()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim'
        );
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal Melakukan Update, Data yang dimasukan tidak tepat.!</div>');
            redirect('user');
        } else {
            $where = array('id' => $this->input->post('id'));
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->account->editData($where, $data, 'user');
            $this->session->set_flashdata('message', '<div class="alert alert-success">Edit Data Berhasil!</div>');
            redirect('user');
        }
    }
}
