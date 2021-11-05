<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{


    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_event'] = $this->m_event_product->data_event()->result_array();
        $data['data_link'] = $this->m_link_url->data_link()->result_array();
        $this->load->view('user_view/index', $data);
    }


    public function detail_event($slug)
    {
        $data['title'] = $slug;
        $data['detail_event'] = $this->m_event_product->event_detail($slug)->row_array();
        $this->load->view('user_view/event_detail', $data);
        // $this->load->view('checkout_snap', $data);
    }



    public function success_message()
    {
        $data['title'] = "Pembelian Sedang di Proses";
        $this->load->view('user_view/success_message', $data);
    }

    public function gagal_message()
    {
        $data['title'] = "Pembelian anda gagal";
        $this->load->view('user_view/gagal_message', $data);
    }
}
