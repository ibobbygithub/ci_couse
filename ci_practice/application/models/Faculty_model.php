<?php

class Faculty_model extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('mas_user_faculty');
        return $query->result();
    }
}
