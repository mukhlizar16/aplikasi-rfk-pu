<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function get_data($id)
    {
        return $this->db->get_where('user_role', ['user_id' => $id]);
    }
}


/* End of file Role_model_model.php and path /application/models/Role_model_model.php */
