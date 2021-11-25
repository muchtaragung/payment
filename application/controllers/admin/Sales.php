<?php

class Sales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function list()
    {
        $data['title'] = "List Sales";
        $data['sales'] = $this->user->get_all()->result();
        $this->load->view('admin/sales/list', $data);
    }

    public function save()
    {
        $user['name']  = $this->input->post('name');
        $user['name']  = ucwords($this->input->post('name'));
        $user['slug'] = url_title($this->input->post('name'), 'dash', true);
        $user['phone'] = $this->input->post('phone');
        $data = $this->user->save($user);

        $this->session->set_flashdata('msg', 'Berhasil Membuat Data Sales');
        echo json_encode($data);
    }

    public function edit()
    {
        $id_user = $this->input->get('id_user');
        $user = $this->user->get_where(['id_user' => $id_user])->row();
        echo json_encode($user);
    }

    public function update()
    {
        $user['id_user']    = $this->input->post('id_user');
        $user['name']  = ucwords($this->input->post('name'));
        $user['slug'] = url_title($this->input->post('name'), 'dash', true);
        $user['email'] = $this->input->post('email');
        $user['phone'] = $this->input->post('phone');

        $data = $this->user->update($user);

        $this->session->set_flashdata('msg', 'Berhasil Mengupdate Data Sales');

        echo json_encode($data);
    }

    public function delete()
    {
        $user['id_user'] = $this->input->post('id_user');
        $data = $this->user->delete($user);
        $this->session->set_flashdata('msg', 'Berhasil Menghapus Data Sales');
        echo json_encode($data);
    }
}
