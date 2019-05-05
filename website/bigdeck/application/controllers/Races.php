<?php
class Races extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Races_model', 'races');
    }

    public function index()
    {
        $data['races'] = $this->races->get();

        $this->load->view('structure/header');
        $this->load->view('races/index', $data);
        $this->load->view('structure/footer');
    }

    public function insert()
    {
        if ($this->input->post()) {
            $data = array(
                'name' => strip_tags($this->input->post('name'))
            );

            if ($this->races->insert($data)) {
                $this->session->flashdata('message', 'Card race successfully inserted');
                $this->session->flashdata('type', 1);
            } else {
                $this->session->flashdata('message', 'An error occurred while inserting the Card race');
                $this->session->flashdata('type', 2);
            }

            redirect('races');
        } else {
            $this->load->view('structure/header');
            $this->load->view('races/insert');
            $this->load->view('structure/footer');
        }
    }

    public function update()
    {
        $id = $this->uri->segment(3);

        if ($this->input->post()) {
            $data = array(
                'name' => strip_tags($this->input->post('name'))
            );

            if ($this->races->update($data, $id)) {
                $this->session->flashdata('message', 'Card race successfully updated');
                $this->session->flashdata('type', 1);
            } else {
                $this->session->flashdata('message', 'An error occurred while updating the Card race');
                $this->session->flashdata('type', 2);
            }

            redirect('races');
        } else {
            $data['race'] = $this->races->get($id);

            $this->load->view('structure/header');
            $this->load->view('races/update', $data);
            $this->load->view('structure/footer');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if ($this->races->delete($id)) {
            $this->session->flashdata('message', 'Card race successfully deleted');
            $this->session->flashdata('type', 1);
        } else {
            $this->session->flashdata('message', 'An error occurred while deleting the Card race');
            $this->session->flashdata('type', 2);
        }

        redirect('races');
    }

}
