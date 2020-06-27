<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('account');
    }

    public function index()
    {

        $data['title'] = "Login";
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function registration()
    {
        $data['title'] = "User Registration";

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('zip', 'Zip', 'required');

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[akun.email]',
            [
                'is_unique' => "This email Has already registered"
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password1',
            'required|trim|min_length[6]|matches[password2]',
            [
                'matches' => "password don't match!",
                'min_length' => "password too short!"
            ]
        );
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $alamat = $this->input->post('address') .
                " " . $this->input->post('city') .
                " " . $this->input->post('state') .
                " " . $this->input->post('zip');
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => $this->input->post('password1'),
                'alamat' => $alamat,
                'telepon' => $this->input->post('phone'),
                'jenis_akun' => 3
            ];

            $this->account->tambah($data, 'akun');
            $this->session->set_flashdata('message', '<div class="alert alert-success">
            your registration account has been created!</div>');
            redirect('/', 'refresh');
        }
    }
    public function login()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">your credential is incorrect!</div>');
            redirect('/');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->account->Login($email);
            $password = $this->account->CheckPwd($email, $password);
            if ($user) {
                if ($password) {
                    if ($password['jenis_akun'] == 1) {
                        $dataSession = array(
                            'name_admin' => $user['nama'],
                            'email' => $user['email']
                        );
                        $this->session->set_userdata($dataSession);
                        redirect('admin');
                    } else {
                        $dataSession = array(
                            'name' => $user['nama'],
                            'email' => $user['email']
                        );
                        $this->session->set_userdata($dataSession);
                        redirect('UserController');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">your password account is incorrect!</div>');
                    redirect('/');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">email has not been registered!</div>');
                redirect('/');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/'));
    }
}
