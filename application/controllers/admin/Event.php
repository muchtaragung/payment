<?php

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model', 'event');
        $this->load->model('User_model', 'user');

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
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
        $event['slug_event']  = url_title($event['nama_event']);
        $event['image_event'] = $this->_upload();
        $event['description'] = $this->input->post('description');
        $event['quantity']    = 1;
        $event['trainer']     = $this->input->post('trainer');
        $event['start_time']  = $this->input->post('start_time');
        $event['end_time']    = $this->input->post('end_time');
        $event['start_date']  = $this->input->post('start_date');
        $event['end_date']    = $this->input->post('end_date');
        $event['price']       = str_replace('.', '', $this->input->post('price'));
        $event['early_price'] = str_replace('.', '', $this->input->post('early_price'));
        $event['early_date']  = $this->input->post('early_date');
        $event['super_price'] = str_replace('.', '', $this->input->post('super_price'));
        $event['super_date']  = $this->input->post('super_date');
        $event['id_user']     = $this->input->post('id_user');

        $data = $this->event->save($event);

        $this->session->set_flashdata('msg', 'Berhasil Membuat Data Event');
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
        if (!empty($_FILES["image_event"]["name"])) {
            $foto = $this->_upload();
        } else {
            $foto = $this->input->post('old_image_event');
        }
        $event['id_event'] = $this->input->post('id_event');
        $event['nama_event']  = $this->input->post('nama_event');
        $event['slug_event']  = url_title($event['nama_event']);
        $event['image_event'] = $foto;
        $event['description'] = $this->input->post('description');
        $event['quantity']    = 1;
        $event['trainer']     = $this->input->post('trainer');
        $event['start_time']  = $this->input->post('start_time');
        $event['end_time']    = $this->input->post('end_time');
        $event['start_date']  = $this->input->post('start_date');
        $event['end_date']    = $this->input->post('end_date');
        $event['price']       = str_replace('.', '', $this->input->post('price'));
        $event['early_price'] = str_replace('.', '', $this->input->post('early_price'));
        $event['early_date']  = $this->input->post('early_date');
        $event['super_price'] = str_replace('.', '', $this->input->post('super_price'));
        $event['super_date']  = $this->input->post('super_date');
        $event['id_user']     = $this->input->post('id_user');

        $this->event->update($event);

        $this->session->set_flashdata('msg', 'Berhasil Mengupdate Data Event');

        return redirect('admin/event/list');
    }

    public function delete($id_event)
    {
        $this->event->delete(['id_event' => $id_event]);
        $this->session->set_flashdata('msg', 'Berhasil Menghapus Data Event');
        return redirect('admin/event/list');
    }

    private function _upload()
    {
        $config['upload_path']   = './upload/events/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name']     = uniqid();
        $config['overwrite']     = true;
        $config['encrypt_name']  = false;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image_event')) {
            // print_r($this->upload->display_errors());
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return redirect('admin/event/list');
        } else {
            return $this->upload->data("file_name");
        }
    }
}
