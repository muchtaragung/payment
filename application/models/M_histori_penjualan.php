<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_histori_penjualan extends CI_Model
{

    public function data_transaksi()
    {
        $this->db->select("*");
        $this->db->from('histori_pesanan');
        $this->db->join('event_product', 'event_product.id_events = histori_pesanan.id_events');
        $this->db->join('user', 'user.id_user = event_product.id_user');
        $this->db->order_by('histori_pesanan.id_pesanan', 'DESC');
        return $this->db->get();
    }

    public function event_detail($slug)
    {
        $this->db->select("*");
        $this->db->from('event_product');
        $this->db->join('user', 'user.id_user = event_product.id_user');
        $this->db->join('action_button', 'action_button.id_actionbutton = event_product.id_actionbutton', 'inner');
        $this->db->where('event_product.slug_event', $slug);
        return $this->db->get();
    }
    public function update_status($id_order, $data)
    {
        $this->db->update('histori_pesanan', $data, array('order_id' => $id_order));
    }
}
