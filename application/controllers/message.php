<?php
class Message extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('message_model');
    }
    public function home()
    {
        $this->load->view('templates/header');
        $this->load->view('message/home');
        $this->load->view('templates/footer');
    }


    public function add()
    {
        session_start();
        $name=$_SESSION['username'];
        $this->load->helper('url') ;
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title']="Saying!";
        if($name){
            $this->form_validation->set_rules('content','content','required');
            $this->message_model->set_message($name); 
            if($this->form_validation->run()===FALSE)
            {
                $this->load->view('message/add');
            }
            else
            {
                $this->load->view('templates/header',$data);
                $this->load->view('message/success');
                $this->load->view('templates/footer');
            }
        }
        else
        {
            redirect('user/signin','location',301);
        }
    } 


    public function message_list()
    {
    }
} 
?>
