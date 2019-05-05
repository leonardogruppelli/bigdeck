<?php
class Rarities extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rarities_model', 'rarities');
    }

    public function index()
    {
        $data['rarities'] = $this->rarities->get();

        $this->load->view('structure/header');
        $this->load->view('rarities/index', $data);
        $this->load->view('structure/footer');
    }

    public function insert()
    {
        if ($this->input->post()) {
            $data = array(
                'name' => strip_tags($this->input->post('name'))
            );

            if ($this->rarities->insert($data)) {
                $this->session->flashdata('message', 'Card rarity successfully inserted');
                $this->session->flashdata('type', 1);
            } else {
                $this->session->flashdata('message', 'An error occurred while inserting the Card rarity');
                $this->session->flashdata('type', 2);
            }

            redirect('rarities');
        } else {
            $this->load->view('structure/header');
            $this->load->view('rarities/insert');
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

            if ($this->rarities->update($data, $id)) {
                $this->session->flashdata('message', 'Card rarity successfully updated');
                $this->session->flashdata('type', 1);
            } else {
                $this->session->flashdata('message', 'An error occurred while updating the Card rarity');
                $this->session->flashdata('type', 2);
            }

            redirect('rarities');
        } else {
            $data['rarity'] = $this->rarities->get($id);

            $this->load->view('structure/header');
            $this->load->view('rarities/update', $data);
            $this->load->view('structure/footer');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if ($this->rarities->delete($id)) {
            $this->session->flashdata('message', 'Card rarity successfully deleted');
            $this->session->flashdata('type', 1);
        } else {
            $this->session->flashdata('message', 'An error occurred while deleting the Card rarity');
            $this->session->flashdata('type', 2);
        }

        redirect('rarities');
    }

}
