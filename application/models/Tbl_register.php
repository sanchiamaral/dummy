<?php

class Tbl_register extends CI_Model
{
    function insert($data)
    {
        $this->db->insert('tbl_register', $data);
        return $this->db->insert_id();
    }
}