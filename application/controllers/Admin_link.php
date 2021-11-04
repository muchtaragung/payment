<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_link extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['title'] = "Form Event";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['action_button'] = $this->m_action_button->data_button()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/add_link', $data);
        $this->load->view('template/footer');
    }

    public function add_link()
    {
        $nama_event = $this->input->post('nama_link');
        $slug_event = strtolower($nama_event);
        $data = [
            'slug_link' =>  str_replace(' ', '-', $slug_event),
            'judul_link' => ucwords($nama_event),
            'icon_code_link' => "fas fa-link",
            'url_link' => $this->input->post('link'),
            'date_created_linkurl' => date('Y-m-d H:i:s'),
            'id_actionbutton' => $this->input->post('button_action'),
            'id_user' => $this->input->post('id_user')
        ];

        $this->db->insert('link_url', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        <p>Data telah tersimpan</p></div>');
        redirect('admin_controller');
    }
}
