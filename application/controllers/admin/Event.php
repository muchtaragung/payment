<?php

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model', 'event');
        $this->load->model('User_model', 'user');
    }

    public function list()
    {
        $join = [
            ['user', 'user.id_user = event.id_user']
        ];

        $data['title']  = "List Event";
        $data['events'] = $this->event->get_join($join)->result();
        $this->load->view('admin/event/list', $data);
    }

    public function add()
    {
        $data['title'] = "Add Event";
        $data['user'] = $this->user->get_all()->result();
        $this->load->view('admin/event/add', $data);
    }

    public function save()
    {
        $event['nama_event']  = $this->input->post('nama_event');
        $event['slug_event']  = str_replace(' ', '-', strtolower($event['nama_event']));
        // $event['image_event'] = $this->_upload();
        $event['description'] = $this->input->post('description');
        $event['quantity']    = $this->input->post('quantity');
        $event['link_event']  = $this->input->post('link_event');
        $event['date_event']  = $this->input->post('date_event');
        $event['start_time']  = $this->input->post('start_time');
        $event['end_time']    = $this->input->post('end_time');
        $event['price']       = str_replace('.', '', $this->input->post('price'));
        $event['id_user']     = $this->input->post('id_user');

        $data = $this->event->save($event);

        $this->session->set_flashdata('msg', 'Berhasil Membuat Data Sales');
        return redirect('admin/event/list');
    }

    public function edit($id_event)
    {
        $data['title'] = "Edit Event";
        $data['event'] = $this->event->get_where(['id_event' => $id_event])->row();
        $data['user'] = $this->user->get_all()->result();

        $this->load->view('admin/event/edit', $data);
    }

    public function update()
    {
        $event['id_event'] = $this->input->post('id_event');
        $event['nama_event']  = $this->input->post('nama_event');
        $event['slug_event']  = str_replace(' ', '-', strtolower($event['nama_event']));
        // $event['image_event'] = $this->_upload();
        $event['description'] = $this->input->post('description');
        $event['quantity']    = $this->input->post('quantity');
        $event['link_event']  = $this->input->post('link_event');
        $event['date_event']  = $this->input->post('date_event');
        $event['start_time']  = $this->input->post('start_time');
        $event['end_time']    = $this->input->post('end_time');
        $event['price']       = str_replace('.', '', $this->input->post('price'));
        $event['id_user']     = $this->input->post('id_user');

        $this->event->update($event);

        $this->session->set_flashdata('msg', 'Berhasil Mengupdate Data Sales');

        return redirect('admin/event/list');
    }

    public function delete($id_event)
    {
        $this->event->delete(['id_event' => $id_event]);
        $this->session->set_flashdata('msg', 'Berhasil Menghapus Data Sales');
        return redirect('admin/event/list');
    }

    private function _upload()
    {
        $config['upload_path']   = './assets/events/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name']     = uniqid();
        $config['overwrite']     = true;
        $config['encrypt_name']  = false;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            print_r($this->upload->display_errors());
        } else {
            return $this->upload->data("file_name");
        }
    }
}
