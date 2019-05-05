<?php
class Home extends MY_Controller
{
    
    public function index()
    {
        $this->load->view('structure/header');
        $this->load->view('home/index');
        $this->load->view('structure/footer');
    }

}
