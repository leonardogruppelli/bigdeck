<?php
class Classes extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Classes_model', 'classes');
    }

    public function index()
    {
        $data['classes'] = $this->classes->get();

        $this->load->view('structure/header');
        $this->load->view('classes/index', $data);
        $this->load->view('structure/footer');
    }

    public function insert()
    {
        if ($this->input->post()) {
            $data = array(
                'name' => strip_tags($this->input->post('name'))
            );

            if ($this->classes->insert($data)) {
                $this->session->flashdata('message', 'Card class successfully inserted');
                $this->session->flashdata('class', 1);
            } else {
                $this->session->flashdata('message', 'An error occurred while inserting the Card class');
                $this->session->flashdata('class', 2);
            }

            redirect('classes');
        } else {
            $this->load->view('structure/header');
            $this->load->view('classes/insert');
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

            if ($this->classes->update($data, $id)) {
                $this->session->flashdata('message', 'Card class successfully updated');
                $this->session->flashdata('class', 1);
            } else {
                $this->session->flashdata('message', 'An error occurred while updating the Card class');
                $this->session->flashdata('class', 2);
            }

            redirect('classes');
        } else {
            $data['class'] = $this->classes->get($id);

            $this->load->view('structure/header');
            $this->load->view('classes/update', $data);
            $this->load->view('structure/footer');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if ($this->classes->delete($id)) {
            $this->session->flashdata('message', 'Card class successfully deleted');
            $this->session->flashdata('class', 1);
        } else {
            $this->session->flashdata('message', 'An error occurred while deleting the Card class');
            $this->session->flashdata('class', 2);
        }

        redirect('classes');
    }

}
