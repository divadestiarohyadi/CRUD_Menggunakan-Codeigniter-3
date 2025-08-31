<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'security']);
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('login');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username', TRUE); // TRUE = xss_clean
            $password = md5($this->input->post('password', TRUE));

            $user = $this->M_auth->get_user($username, $password);

            if ($user) {
                $this->session->set_userdata([
                    'username' => $user->username,
                    'logged_in' => TRUE
                ]);
                redirect('home');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah!');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        // Hapus semua data session
        $this->session->sess_destroy();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        // Redirect ke halaman login
        redirect('auth');
    }
}
