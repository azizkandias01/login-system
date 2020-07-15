<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class AkunController extends CI_Controller
{
    private $_client;

    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_url' => 'http://127.0.0.1/api/rest_ci/akun/'
        ]);
        $this->load->library('form_validation');
        $this->load->model('account');
        $this->load->model('pupukModel');
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    public function Profile()
    {
        $id = $_SESSION['id'];
        $data['data'] = json_decode(
            file_get_contents('http://127.0.0.1/api/rest_ci/akun?id_akun=' . $id, TRUE)
        );
        $this->load->view('templates/pelanggan_head');
        $this->load->view('templates/pelanggan_header');
        $this->load->view('pelanggan/pelanggan_profile', $data);
        $this->load->view('templates/pelanggan_footer');
        $this->load->view('templates/pelanggan_loader');
    }
    public function getAlldata()
    {
        $data['data'] = json_decode(
            file_get_contents('http://127.0.0.1/api/rest_ci/akun', true)
        );
        $this->load->view('templates/index_header');
        $this->load->view('home/akun', $data);
        $this->load->view('templates/index_footer');
    }
    public function deleteAkun()
    {
        $id = $this->input->post('akun_id');

        $response = $this->_client->request('DELETE', 'http://127.0.0.1/api/rest_ci/akun/index_delete', [
            'form_params' => [
                'id_akun' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Akun Berhasil Dihapus!!</div>');
        redirect('AkunController/getAlldata');
    }
    public function updateAkun()
    {
        $id = $this->input->post('akun_id');
        $nama = $this->input->post('akun_nama');
        $password = $this->input->post('akun_password');
        $alamat = $this->input->post('akun_alamat');
        $email = $this->input->post('akun_email');
        $telepon = $this->input->post('akun_telepon');
        $response = $this->_client->request('PUT', 'http://127.0.0.1/api/rest_ci/akun/index_put', [
            'form_params' => [
                'id_akun' => $id,
                'nama'          => $nama,
                'email'    => $email,
                'password'    => $password,
                'alamat'    => $alamat,
                'telepon'    => $telepon
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Akun Berhasil Diupdate!!</div>');
        redirect('AkunController/getAlldata');
    }
    public function updateAkun2()
    {
        $id = $this->input->post('akun_id');
        $nama = $this->input->post('akun_nama');
        $password = $this->input->post('akun_password');
        $alamat = $this->input->post('akun_alamat');
        $email = $this->input->post('akun_email');
        $telepon = $this->input->post('akun_telepon');
        $response = $this->_client->request('PUT', 'http://127.0.0.1/api/rest_ci/akun/index_put', [
            'form_params' => [
                'id_akun' => $id,
                'nama'          => $nama,
                'email'    => $email,
                'password'    => $password,
                'alamat'    => $alamat,
                'telepon'    => $telepon
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        $_SESSION['name'] = $result['nama'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['password'] = $result['password'];
        $_SESSION['address'] = $result['alamat'];
        $_SESSION['phone'] = $result['telepon'];
        $this->session->set_flashdata('message', '<div class="alert alert-success">Akun Berhasil Diupdate!!</div>');
        redirect('AkunController/Profile');
    }
    public function Registration()
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
            $response = $this->_client->request('POST', 'http://127.0.0.1/api/rest_ci/akun/index_post', [
                'form_params' => [
                    'nama' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'password' => $this->input->post('password1'),
                    'alamat' => $alamat,
                    'telepon' => $this->input->post('phone'),
                    'jenis_akun' => 3
                ]
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
            your registration account has been created!</div>');
            redirect('/', 'refresh');
        }
    }
}
