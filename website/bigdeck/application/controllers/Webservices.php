<?php
class Webservices extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rarities_model', 'rarities');
        $this->load->model('Types_model', 'types');
        $this->load->model('Races_model', 'races');
        $this->load->model('Classes_model', 'classes');
        $this->load->model('Cards_model', 'cards');
    }

    public function rarities() {
        $data['rarities'] = $this->rarities->get();
        echo json_encode($data);
    }

    public function types() {
        $data['types'] = $this->types->get();
        echo json_encode($data);
    }

    public function races() {
        $data['races'] = $this->races->get();
        echo json_encode($data);
    }

    public function classes() {
        $data['classes'] = $this->classes->get();
        echo json_encode($data);
    }

    public function cards() {
        $data['cards'] = $this->cards->get();
        echo json_encode($data);
    }
}
