<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_link_url extends CI_Model
{

    public function data_link()
    {
        $this->db->select("*");
        $this->db->from('link_url');
        $this->db->join('user', 'user.id_user = link_url.id_user');
        $this->db->join('action_button', 'action_button.id_actionbutton = link_url.id_actionbutton', 'inner');
        $this->db->order_by('id_link', 'DESC');
        return $this->db->get();
    }
}
