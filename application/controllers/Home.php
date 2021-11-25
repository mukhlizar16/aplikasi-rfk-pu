<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
	}

	public function index()
	{
		if (role() == 1) :
			redirect('admin', 'refresh');
		else :
			redirect('konsultan', 'refresh');
		endif;
	}
}
