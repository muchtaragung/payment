<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Histori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('histori_model', 'histori');
        $this->load->model('user_model', 'user');
    }


    public function index()
    {
        $data['title']             = "Payment Histori";
        $order               = ['id_histori_pesanan', 'DESC'];
        $data['histori_pembelian'] = $this->histori->get_all_order($order)->result_array();
        $data['sales']             = $this->user->get_all()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/histori_penjualan/index', $data);
        $this->load->view('template/footer');
    }

    public function export()
    {
        $date_start = $this->input->post('date_start');
        $date_end   = $this->input->post('date_end');
        $sales      = $this->input->post('sales');
        $status     = $this->input->post('status');

        $where['created_at >='] = $date_start;
        $where['created_at <='] = $date_end;
        if ($sales != "") {
            $where['nama_sales'] = $sales;
        }
        if ($status != "") {
            $where['status_code'] = $status;
        }
        $histori = $this->histori->get_where($where)->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Order ID')
            ->setCellValue('B1', 'Nama Pembeli')
            ->setCellValue('C1', 'Email Pembeli')
            ->setCellValue('D1', 'No Telp')
            ->setCellValue('E1', 'Sales')
            ->setCellValue('F1', 'Product')
            ->setCellValue('G1', 'Harga')
            ->setCellValue('H1', 'Payment Type')
            ->setCellValue('I1', 'Bank')
            ->setCellValue('I1', 'Va Number')
            ->setCellValue('J1', 'Waktu Transaksi')
            ->setCellValue('K1', 'Status');


        $kolom = 2;
        $nomor = 1;
        foreach ($histori as $data) {

            if ($data->status_code == 201) {
                $status = "Pending";
            }
            if ($data->status_code == 200) {
                $status = "Success";
            }
            if ($data->status_code == 202) {
                $status = "Failure";
            }


            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $data->order_id)
                ->setCellValue('B' . $kolom, $data->nama_customer)
                ->setCellValue('C' . $kolom, $data->email_customer)
                ->setCellValue('D' . $kolom, $data->no_telp)
                ->setCellValue('E' . $kolom, $data->nama_sales)
                ->setCellValue('F' . $kolom, $data->nama_event)
                ->setCellValue('G' . $kolom, $data->price)
                ->setCellValue('H' . $kolom, $data->payment_type)
                ->setCellValue('I' . $kolom, $data->bank)
                ->setCellValue('I' . $kolom, $data->va_number)
                ->setCellValue('J' . $kolom, date('d, M Y H:i:s', strtotime($data->transaction_time)))
                ->setCellValue('K' . $kolom, $status);

            $kolom++;
            $nomor++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Payment ' . date('d-m-Y H:i:s') . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
