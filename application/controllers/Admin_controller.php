<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
        $this->load->model('M_event_product');
        $this->load->model('Event_model', 'event');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['data_event'] = $this->m_event_product->data_event()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/payment_link');
        $this->load->view('template/footer');
    }

    public function form_event()
    {
        $data['title'] = "Form Event";
        $data['action_button'] = $this->m_action_button->data_button()->result_array();
        $data['user'] = $this->user->get_user()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/add_event', $data);
        $this->load->view('template/footer');
    }

    public function add_event()
    {
        $harga = $this->input->post('harga_event');
        $nama_event = $this->input->post('nama_event');
        $slug_event = strtolower($nama_event);
        $data = [
            'slug_event' =>  str_replace(' ', '-', $slug_event),
            'nama_events' => ucwords($nama_event),
            'description' => $this->input->post('deskripsi'),
            'link_event' => $this->input->post('link_event'),
            'link_credit' => $this->input->post('link_credit'),
            'quantity' => $this->input->post('quantity'),
            'date_events' => $this->input->post('date_event'),
            'start_at' => $this->input->post('start_at'),
            'start_end' => $this->input->post('durasi_event'),
            'price' => str_replace('.', '', $harga),
            'date_created_events' => date('Y-m-d H:i:s'),
            'id_user' => $this->input->post('id_user'),
            'actionbutton' => $this->input->post('button_action'),
        ];
        $this->event->save($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        <p>Data telah tersimpan</p></div>');
        redirect('admin_controller');
    }

    public function form_editevent($id_event)
    {
        $data['title'] = "Edit Event";
        $data['data_event'] = $this->m_event_product->data_event_edit($id_event)->row_array();
        $data['action_button'] = $this->m_action_button->data_button()->result_array();
        $data['user'] = $this->user->get_user()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/edit_event', $data);
        $this->load->view('template/footer');
    }

    public function edit_event()
    {
        $id = $this->input->post('id_event', true);
        $harga = $this->input->post('harga_event', true);
        $nama_event = $this->input->post('nama_event', true);
        $slug_event = strtolower($nama_event);
        $data = [
            'slug_event' =>  str_replace(' ', '-', $slug_event),
            'nama_events' => ucwords($nama_event),
            'description' => $this->input->post('deskripsi', true),
            'link_event' => $this->input->post('link_event', true),
            'link_credit' => $this->input->post('link_credit', true),
            'quantity' => $this->input->post('quantity', true),
            'date_events' => $this->input->post('date_event', true),
            'start_at' => $this->input->post('start_at', true),
            'start_end' => $this->input->post('durasi_event', true),
            'price' => str_replace('.', '', $harga),
            'id_user' => $this->input->post('id_user', true),
            'actionbutton' => $this->input->post('button_action', true)
        ];

        $this->event->update_event($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        <p>Data telah tersimpan</p></div>');
        redirect('admin_controller');
    }

    public function delete_event($id)
    {
        $this->event->delete_event($id);
        redirect('admin_controller');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        <p>Data telah dihapus</p></div>');
        redirect('admin_controller');
    }
}
