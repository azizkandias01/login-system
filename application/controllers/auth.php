<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('account');
    }

    public function index(){
        
        $data['title']="Login";
        $this->load->view('templates/auth_header',$data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }
    
    public function registration()
    {
        $data['title']="User Registration";

        $this->form_validation->set_rules('name','Name','required|trim');

        $this->form_validation->set_rules
        (
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
            'is_unique'=>"This email Has already registered"
            ]
        );
        $this->form_validation->set_rules
        (
            'password1',
            'Password1',
            'required|trim|min_length[6]|matches[password2]',
            [
            'matches'=>"password don't match!",
            'min_length'=>"password too short!"
            ]
        );
        $this->form_validation->set_rules('password2','Password2','required|trim|matches[password1]');


        if($this->form_validation->run()==false){

            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');                  
        }
        else{
            $data=[
                'name'=>htmlspecialchars($this->input->post('name',true)),
                'email'=>htmlspecialchars($this->input->post('email',true)),
                'password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
            ];
            
            $this->account->tambah($data,'user');
            $this->session->set_flashdata('message','<div class="alert alert-success">
            your registration account has been created!</div>');
            redirect('/','refresh');
        }
    }
    public function login(){

        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        
        if($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger">your account data incorrect!</div>');
            redirect('/');
        }
        else
        {
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            
            $user=$this->account->Login($email,$password);

            if($user){

                if(password_verify($password,$user['password'])){

                    redirect('user');
                }
                else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger">your password account is incorrect!</div>');
                    redirect('/');
                }
            }
            else{
                $this->session->set_flashdata('message','<div class="alert alert-danger">email has not been registered!</div>');
                redirect('/');
            }
        }
    }

}