<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_histori_penjualan', 'histori');
        $this->load->model('histori_model', 'histori');
    }


    public function index()
    {
        $data['title'] = "Payment Histori";
        $data['histori_pembelian'] = $this->histori->get_all()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/histori_penjualan/index', $data);
        $this->load->view('template/footer');
    }
}
