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
            $this->load->view('templates/header',$data);
            $this->load->view('message/success');
            $this->load->view('templates/footer');
            }
        }
    }



    public function signin()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $user = $this->user_model->signin();
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
        if($user)
        {
            $_SESSION['username']=$user['username'];
            $_SESSION['role']=$user['role'];
            $this->load->view('templates/header',$data);
            $this->load->view('message/success');
            $this->load->view('templates/footer');
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
