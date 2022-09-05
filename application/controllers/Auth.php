<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {
        // if( $this->session->userdata('username')) {
        //     redirect('dashboard');
        //  } 

        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tabel_user', ['username' => $username])->row_array();
        
        if($user) {
            if($user['is_active'] == 1) {
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user ['username'],
                        'role_id' => $user ['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1) {
                        redirect ('dashboard');
                    } else {
                        redirect ('user');
                    }
                } else {
                    $this->session->set_flashdata('msg_error', 'Password Salah');
                redirect('auth');
                }
            } else {
                $this->session->set_flashdata('msg_error', 'Email belum diaktivasi');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('msg_error', 'Username tidak terdaftar');
            redirect('auth');
        }
    }


    public function registration()
    {
        $this->form_validation->set_rules ('name', 'Name', 'required|trim');
        $this->form_validation->set_rules ('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules ('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!', 
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules ('password2', 'Password', 'required|trim|matches[password1]');

        if ( $this->form_validation->run() == false ) {
            $data['title'] = 'Karyawan User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('tabel_user', $data);
            $this->session->set_flashdata('msg_success', 'Selamat, Akun anda berhasil dibuat, Silahkan Login!');
            redirect('auth');
        }

    }
    

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('msg_success', 'Berhasil Logout');
        redirect('auth');

    }
}