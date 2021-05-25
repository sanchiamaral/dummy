<?php

class Tbl_user extends CI_Model
{
    function insert($data)
    {
        $this->db->insert('tbl_user', $data);
        return $this->db->insert_id();
    }

    function can_login($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('Tbl_user');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $store_password = $this->encryption->decrypt($row->password);
                if($password == $store_password){
                    $this->session->set_userdata('id', $row->id);
                }else{
                    return 'Wrong password';
                }
            }
        }else{
            return 'Wrong username';
        }
    }
}