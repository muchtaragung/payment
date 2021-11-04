<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_action_button extends CI_Model
{

    public function data_button()
    {
        $this->db->select("*");
        $this->db->from('action_button');
        $this->db->order_by('id_actionbutton', 'DESC');
        return $this->db->get();
    }
}
