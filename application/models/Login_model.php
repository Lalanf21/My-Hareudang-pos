<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

    public function cek_user($user){
        $this->db->where('nama_user',$user);
        $this->db->where('status',1);
        return $this->db->get('user');
    }

    public function cek_pass($pass, $cek){
        return password_verify($pass, $cek);
    }
}