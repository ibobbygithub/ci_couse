<?php

class Program_model extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('mas_user_program');
        return $query->result();
    }
}
