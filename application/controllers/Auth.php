<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->goToDefaultPage();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['email' => $email])->row_array();
        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek passwornya
                if (password_verify($password, $user['password'])) {
                    //kalau password benar
                    $data = [
                        'email' => $user['email'],
                        'nama' => $user['name'],
                        'id_role' => $user['id_role']

                    ];
                    $this->session->set_userdata($data);
                    //masuk ke user
                    if ($user['id_role'] == 1) {
                        redirect('admin/event/list');
                    }
                    // else if ($user['id_role'] == 2) {
                    //     redirect('calendar');
                    // } else if ($user['id_role'] == 4) {
                    //     redirect('menu');
                    // }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum di Aktifasi</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar</div>');
            redirect('auth');
        }
    }

    public function goToDefaultPage()
    {
        if ($this->session->userdata('id_role') == 1) {
            redirect('admin/event/list');
        } else if ($this->session->userdata('id_role') == 2) {
            redirect('calendar');
        } else if ($this->session->userdata('id_role') == 4) {
            redirect('menu');
        }
        // jika ada role_id yg lain maka tambahkan disini
    }


    // public function registration()
    // {

    //     $this->goToDefaultPage();
    //     $this->form_validation->set_rules('nama_lengkap', 'Name', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
    //         'is_unique' => 'Email Ini Sudah Terdaftar!'
    //     ]);
    //     $this->form_validation->set_rules(
    //         'password1',
    //         'Password',
    //         'required|trim|min_length[4]|matches[password2]',
    //         ['matches' => 'Password Tidak Sama', 'min_length' => 'Password Terlalu Pendek']
    //     );
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {

    //         $data['title'] = 'Buat Akun';
    //         $this->load->view('auth/registration', $data);
    //     } else {
    //         $email = $this->input->post('email', true);
    //         $data = [
    //             'name' => htmlspecialchars($this->input->post('nama_lengkap', true)),
    //             'email' => htmlspecialchars($email),
    //             'image' => 'default.png',
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'id_role' =>  1,
    //             'is_active' => 1,
    //             'date_created_user' => time()
    //         ];

    //         $this->db->insert('user', $data);

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Akun Anda Telah Terdaftar</div>');
    //         redirect('auth');
    //     }
    // }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'ssmtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_user' => 'alexjhosan11@gmail.com',
            'smtp_pass' => 'kucinggila',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"

        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('alexjhosan11@gmail.com', 'Korpora Consulting');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Akun Verifikasi');
            $this->email->message('Klik Link ini Untuk Aktifasi Akunmu : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('<br><center><img src="http://korporaconsulting.com/wp-content/uploads/2018/04/Untitled-1cc.png"><br><h2 class="text-monospace">Klik Link Dibawah Ini Untuk Ganti Password Akunmu </h2> <h2 class="text-monospace"> <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a></h2></center>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Telah Di Aktifasi!! Silahkan Login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);


                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Expired</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Aktifasi Gagal! Email Salah</div>');
            redirect('auth');
        }
    }

    public function logout()
    {

        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu Telah Keluar</div>');
        redirect('login');
    }

    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('auth/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(bin2hex(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mohon Cek Email Anda Untuk Reset Password Anda</div>');
                redirect('auth/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar atau Belum Aktif</div>');
                redirect('auth');
            }
        }
    }

    public function resetPassword()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Token Tidak Cocok</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email Tidak Cocok</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[4]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ganti Password';
            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/change_password');
            $this->load->view('auth/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Telah Diganti! Silahkan Login.</div>');
            redirect('auth');
        }
    }
}
