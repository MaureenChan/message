<?php
class User_model extends CI_model {

    public function __construct() {
        $this->load->database();
    }


    public function signup(){
        $username=$this->input->post('username');
        $query=$this->db->get_where('user',array('username'=>$username));
        if(!$query) {
            $data=array(
                'username'=>$this->input->post('username'),
                'email'=>$this->input->post('email'),
                'password'=>$this->input->post('password'),
                'role'=>"user"
            );
            $this->db->insert('user',$data);
            return True;

        }
        else{
            return False;
        }
   }
    public function signin(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $query=$this->db->get_where('user',array('username'=>$username,'password'=>'password'));
        return $query;
    }

}
?>
