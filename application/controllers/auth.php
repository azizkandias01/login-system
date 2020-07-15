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

        if (isset($_SESSION['name'])) {
            redirect('UserController');
        } else if (isset($_SESSION['name_admin'])) {
            redirect('DashboardController');
        } else {
            $data['title'] = "Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
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
                            'email_admin' => $user['email']
                        );
                        $this->session->set_userdata($dataSession);
                        redirect('DashboardController');
                    } else if ($password['jenis_akun'] == 2) {
                        $dataSession = array(
                            'name_pengurus' => $user['nama'],
                            'email_pengurus' => $user['email']
                        );
                        $this->session->set_userdata($dataSession);
                        redirect('PengurusController');
                    } else {
                        $dataSession = array(
                            'id' => $user['id_akun'],
                            'name' => $user['nama'],
                            'email' => $user['email'],
                            'address' => $user['alamat'],
                            'phone' => $user['telepon'],
                            'password' => $user['password']
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
        unset($_SESSION['name_admin'],
        $_SESSION['email_admin']);
        redirect(base_url('/'));
    }
}
