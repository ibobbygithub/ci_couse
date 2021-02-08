<?php
class Student_model extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getOne($id){
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        return $query->row(0);
    }
}
