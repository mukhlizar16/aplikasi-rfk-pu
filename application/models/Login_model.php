<?php defined('BASEPATH') or exit('No direct script access allowed');


class Login_model extends CI_Model {

	public function cek_user($email)
	{
		return $this->db->get_where('user', ['email' => $email]);
	}
}
