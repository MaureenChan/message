<?php
class Message extends CI_Controller {

    public function home()
    {
        $this->load->view('templates/header');
        $this->load->view('message/home');
        $this->load->view('templates/footer');
    }
} 
?>
