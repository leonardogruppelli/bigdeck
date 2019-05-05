<?php
class Types extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Types_model', 'types');
    }

    public function index()
    {
        $data['types'] = $this->types->get();

        $this->load->view('structure/header');
        $this->load->view('types/index', $data);
        $this->load->view('structure/footer');
    }

    public function insert()
    {
        if ($this->input->post()) {
            $data = array(
                'name' => strip_tags($this->input->post('name'))
            );

            if ($this->types->insert($data)) {
                $this->session->flashdata('message', 'Card type successfully inserted');
                $this->session->flashdata('type', 1);
            } else {
                $this->session->flashdata('message', 'An error occurred while inserting the Card type');
                $this->session->flashdata('type', 2);
            }

            redirect('types');
        } else {
            $this->load->view('structure/header');
            $this->load->view('types/insert');
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

            if ($this->types->update($data, $id)) {
                $this->session->flashdata('message', 'Card type successfully updated');
                $this->session->flashdata('type', 1);
            } else {
                $this->session->flashdata('message', 'An error occurred while updating the Card type');
                $this->session->flashdata('type', 2);
            }

            redirect('types');
        } else {
            $data['type'] = $this->types->get($id);

            $this->load->view('structure/header');
            $this->load->view('types/update', $data);
            $this->load->view('structure/footer');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if ($this->types->delete($id)) {
            $this->session->flashdata('message', 'Card type successfully deleted');
            $this->session->flashdata('type', 1);
        } else {
            $this->session->flashdata('message', 'An error occurred while deleting the Card type');
            $this->session->flashdata('type', 2);
        }

        redirect('types');
    }

}
