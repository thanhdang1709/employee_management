<?php 


class Auth_model extends CI_Model {
    public function __construct(){
        parent::__construct(); 
        
    }

    public function getUserInfor($email, $password) {
        $this->db->select("*");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $this->db->where("status", 1);
        return $this->db->get()->row();
    }

}
