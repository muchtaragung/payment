<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_event_product extends CI_Model
{

    public function data_event()
    {
        $this->db->select("*");
        $this->db->from('event_product');
        $this->db->join('user', 'user.id_user = event_product.id_user');
        $this->db->order_by('id_events', 'DESC');
        return $this->db->get();
    }

    public function data_event_edit($id_event)
    {
        $this->db->select("*");
        $this->db->from('event_product');
        $this->db->join('user', 'user.id_user = event_product.id_user');
        $this->db->where('id_events', $id_event);
        return $this->db->get();
    }

    public function event_detail($slug)
    {
        $this->db->select("*");
        $this->db->from('event_product');
        $this->db->join('user', 'user.id_user = event_product.id_user');
        $this->db->where('event_product.slug_event', $slug);
        return $this->db->get();
    }
    public function add_event($data)
    {
        return $this->db->insert('event_product', $data);
    }
    public function update_event($id, $data)
    {
        $this->db->where('id_events', $id);
        $this->db->update('event_product', $data);
    }
    public function delete_event($id)
    {
        $this->db->where('id_events', $id);
        $this->db->delete('event_product');
    }
}
