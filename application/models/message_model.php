<?php
class Message_model extends CI_model {

    public function __construct() {
        $this->load->database();
    }

    public function get_message($id=FALSE)
    {
        if($id===FALSE)
        {
            $query=$this->db->get('message');
            return $query->result_array();
        }
        $query=$this->db->get_where('message',array('id'=>$id));
        return $query->row_array();
    }


    public function set_message()
    {
        $this->load->helper('date'); 
        $data=array(
            'user_name'=>$this->input->post('user_name'),
            'content'=>$this->input->post('content'),
            'date'=>now();//now是helper('date')的函数，不过也不行。
        );
        return $this->db->insert('message',$data);
    }


    public function delete_message($id=FALSE)
    {
        $this->db->delete('message',array('id'=>$id));

    }
}
?>
