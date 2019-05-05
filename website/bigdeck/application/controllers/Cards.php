<?php
class Cards extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cards_model', 'cards');
        $this->load->model('Rarities_model', 'rarities');
        $this->load->model('Types_model', 'types');
        $this->load->model('Races_model', 'races');
        $this->load->model('Classes_model', 'classes');
    }

    public function index()
    {
        $data['cards'] = $this->cards->get();

        $this->load->view('structure/header');
        $this->load->view('cards/index', $data);
        $this->load->view('structure/footer');
    }

    public function insert()
    {
        if ($this->input->post()) {
            $data = array(
                'name' => strip_tags($this->input->post('name')),
                'cost' => strip_tags($this->input->post('cost')),
                'rarity_id' => strip_tags($this->input->post('rarity_id')),
                'type_id' => strip_tags($this->input->post('type_id')),
                'race_id' => strip_tags($this->input->post('race_id')),
                'class_id' => strip_tags($this->input->post('class_id')),
            );

            if ($this->cards->insert($data)) {
                $image = $_FILES['image']['name'];
                $ext = pathinfo($image, PATHINFO_EXTENSION);
                $config = array(
                    'upload_path' => './assets/upload/images/',
                    'allowed_types' => '*',
                    'file_name' => sha1($this->cards->last_id) . '.' . $ext,
                );
                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $this->cards->update(array('image' => sha1($this->cards->last_id) . '.' .  $ext), $id);
                    $this->session->flashdata('message', 'Card successfully inserted');
                    $this->session->flashdata('type', 1);
                } else {
                    echo $this->upload->display_errors();
                    $this->session->flashdata('message', 'Card successfully inserted, but an error ocurred while uploading the image');
                    $this->session->flashdata('type', 1);
                }
            } else {
                $this->session->flashdata('message', 'An error occurred while inserting the Card');
                $this->session->flashdata('type', 2);
            }

            redirect('cards');
        } else {
            $data['rarities'] = $this->rarities->get();
            $data['types'] = $this->types->get();
            $data['races'] = $this->races->get();
            $data['classes'] = $this->classes->get();

            $this->load->view('structure/header');
            $this->load->view('cards/insert', $data);
            $this->load->view('structure/footer');
        }
    }

    public function update()
    {
        $id = $this->uri->segment(3);

        if ($this->input->post()) {
            $data = array(
                'name' => strip_tags($this->input->post('name')),
                'cost' => strip_tags($this->input->post('cost')),
                'rarity_id' => strip_tags($this->input->post('rarity_id')),
                'type_id' => strip_tags($this->input->post('type_id')),
                'race_id' => strip_tags($this->input->post('race_id')),
                'class_id' => strip_tags($this->input->post('class_id')),
            );

            if ($this->cards->update($data, $id)) {
                if ($_FILES['image']['name']) {
                    $image = $_FILES['image']['name'];
                    $ext = pathinfo($image, PATHINFO_EXTENSION);
                    $config = array(
                        'upload_path' => './assets/upload/images/',
                        'allowed_types' => '*',
                        'file_name' => sha1($id) . '.' .  $ext,
                    );
                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    unlink('./assets/upload/images/' . sha1($id) . '.' . $ext);

                    if ($this->upload->do_upload('image')) {
                        $this->cards->update(array('image' => sha1($id) . '.' . $ext), $id);
                        $this->session->flashdata('message', 'Card successfully updated');
                        $this->session->flashdata('type', 1);
                    } else {
                        $this->session->flashdata('message', 'Card successfully updated, but an error ocurred while uploading the image');
                        $this->session->flashdata('type', 1);
                    }
                }
            } else {
                $this->session->flashdata('message', 'An error occurred while updating the Card');
                $this->session->flashdata('type', 2);
            }

            redirect('cards');
        } else {
            $data['card'] = $this->cards->get($id);
            $data['rarities'] = $this->rarities->get();
            $data['types'] = $this->types->get();
            $data['races'] = $this->races->get();
            $data['classes'] = $this->classes->get();

            $this->load->view('structure/header');
            $this->load->view('cards/update', $data);
            $this->load->view('structure/footer');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if ($this->cards->delete($id)) {
            unlink('./assets/upload/images/' . sha1($id) . '.' . $ext);
            
            $this->session->flashdata('message', 'Card successfully deleted');
            $this->session->flashdata('type', 1);
        } else {
            $this->session->flashdata('message', 'An error occurred while deleting the Card');
            $this->session->flashdata('type', 2);
        }

        redirect('cards');
    }

}
