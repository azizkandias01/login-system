<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('account');
    }

    public function index(){
        $result['data']=$this->account->alldata();
        $this->load->view('templates/index_header');
        $this->load->view('home/index',$result);
        $this->load->view('templates/index_footer');
    }
    function hapus($id){
		$where = array('id' => $id);
		$this->account->hapus_data($where,'user');
		redirect('user','auto');
    }
    public function edit($id){
        $hasil['data']=$this->account->selectdata($id);
        $this->load->view('templates/index_header');
        $this->load->view('home/edit', $hasil);
        $this->load->view('templates/index_footer');
    }
    public function editAction(){
        $this->form_validation->set_rules('name','Name','required|trim');

        $this->form_validation->set_rules
        (
            'email',
            'Email',
            'required|trim|valid_email'
        );
        $this->form_validation->set_rules
        (
            'password',
            'Password',
            'required|trim'
        );
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','<div class="alert alert-danger">Gagal Melakukan Update, Data yang dimasukan tidak tepat.!</div>');
            redirect('user');              
        }
        else{
            $where=array('id'=> $this->input->post('id'));
            $data=[
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT)
            ];
            $this->account->editData($where,$data,'user');
            $this->session->set_flashdata('message','<div class="alert alert-success">Edit Data Berhasil!</div>');
            redirect('user');           
            
        }
    }
}