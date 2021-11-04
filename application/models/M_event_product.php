<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_event_product extends CI_Model
{

    public function data_event()
    {
        $this->db->select("*");
        $this->db->from('event_product');
        $this->db->join('user', 'user.id_user = event_product.id_user');
        $this->db->join('action_button', 'action_button.id_actionbutton = event_product.id_actionbutton', 'inner');
        $this->db->order_by('id_events', 'DESC');
        return $this->db->get();
    }

    public function data_event_edit($id_event)
    {
        $this->db->select("*");
        $this->db->from('event_product');
        $this->db->join('user', 'user.id_user = event_product.id_user');
        $this->db->join('action_button', 'action_button.id_actionbutton = event_product.id_actionbutton', 'inner');
        $this->db->where('id_events', $id_event);
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
}
