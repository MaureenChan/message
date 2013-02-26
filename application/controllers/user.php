<?php
class User extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user_model');
    }


    public function signup()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $data['title']='Sign up!';
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('confirm_password','confirm_password','required');
        if($this->form_validation->run()===FALSE)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('user/signup');
            $this->load->view('templates/footer');
        }
        else
        {
            if(!$this->user_model->signup())
            {
            $this->load->view('templates/header',$data);
            $this->load->view('user/signup');
            $this->load->view('templates/footer');
            }
            else
            {
                redirect('message/message_list','location',301);
            }
        }
    }



    public function signin()
    {
        session_start();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $data['title']='Sign in!';
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        if($this->form_validation->run()===FALSE)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('user/signin');
            $this->load->view('templates/footer');
        }
        else
        {
            $user = $this->user_model->signin();
            if($user)
            {
                $_SESSION['username']=$user['username'];
                $_SESSION['role']=$user['role'];
                redirect('message/message_list','location',301);
            }
            else
            {
                $this->load->view('templates/header',$data);
                $this->load->view('user/signin');
                $this->load->view('templates/footer');
            }
        }





    }
}
?>
