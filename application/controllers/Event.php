<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model', 'event');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->user->get_all()->result();
        $data['data_event'] = $this->m_event_product->data_event()->result_array();
        $data['data_link'] = $this->m_link_url->data_link()->result_array();
        $this->load->view('user_view/index', $data);
    }

    public function sales_event($nama)
    {
        $slug       = str_replace('-', ' ', $nama);
        $nama_sales = ucwords($slug);

        $sales = $this->user->get_where(['name' => $nama_sales])->row();

        if ($sales == null) {
            redirect('');
        }
        $select = '*, user.slug as slug_sales';

        $join = [
            ['user', 'user.id_user = event.id_user']
        ];

        $data['data_event'] = $this->event->get_join_where($select, $join, ['event.id_user' => $sales->id_user])->result();
        $this->load->view('event/list', $data);
    }




    public function detail_event($slug_sales, $slug)
    {
        $data['title'] = $slug;
        $select = '*';
        $join = [
            ['user', 'user.id_user = event.id_user'],
        ];
        $where = [
            'user.slug' => $slug_sales,
            'event.slug_event' => $slug
        ];
        $data['detail_event'] = $this->event->get_join_where($select, $join, $where)->row_array();
        // var_dump($data['detail_event']);
        // die;
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
