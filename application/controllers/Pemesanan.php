<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_histori_penjualan', 'histori');
        $this->load->model('histori_model', 'histori');
    }


    public function cari()
    {
        $id_order = $this->input->post('id_order', true);
        $data['title'] = "Histori Pemesanan";
        $where = ['order_id' => $id_order];
        $data['pesanan'] = $this->histori->get_where($where)->row();
        if (!empty($data['pesanan'])) {
            $this->load->view('user_view/histori_pemesanan', $data);
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            return redirect('event');
        }
    }
}
