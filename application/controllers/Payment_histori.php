<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_histori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_histori_penjualan', 'histori');
    }


    public function index()
    {
        $data['title'] = "Payment Histori";
        $data['histori_pembelian'] = $this->histori->data_transaksi()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/histori_penjualan/index', $data);
        $this->load->view('template/footer');
    }

    public function status_success()
    {
        $id_pesanan = $this->input->post('id_pesanan');

        $data = [
            'status_code' => $this->input->post('status_success')
        ];

        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->update('histori_pesanan', $data);
        redirect('payment_histori');
    }
}
