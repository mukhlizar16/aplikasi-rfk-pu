<?php defined('BASEPATH') or exit('No direct script access allowed');

function is_login()
{
	if (!empty($_SESSION['log-in'])) {
		return true;
	}
	return false;
}

function must_login()
{
	if (!is_login()) {
		redirect('login', 'refresh');
	}
}

if (!function_exists('rupiah')) {
	function rupiah($angka)
	{
		$hasil_rupiah = number_format($angka, 2, ',', '.');
		return 'Rp. ' . $hasil_rupiah;
	}
}

if (!function_exists('rp')) {
	function rp($angka)
	{
		return $hasil_rupiah = number_format($angka, 2, ',', '.');
	}
}

if (!function_exists('role')) {
	function role()
	{
		if (!empty($_SESSION['log-in'])) {
			$user_id = $_SESSION['id'];
			$ci = get_instance();
			$cek = $ci->Role_model->get_data($user_id)->row_array();
			if (!empty($cek)) {
				return $cek['role_id'];
			} else {
				return null;
			}
		} else {
			return null;
		}
	}
}

function get_abjad($index)
{
	$abjad = array(1 => 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	return $abjad[$index];
}

function get_id_pekerjaan()
{
	$ci = &get_instance();
	$id = $_SESSION['id'];
	$data = $ci->db->get_where('rab', ['konsultan_id' => $id])->row();
	if (!empty($data)) {
		return $data->pekerjaan_id;
	} else {
		return false;
	}
}

function sektor()
{
	$id = $_SESSION['id'];
	$ci = &get_instance();
	$ci->db->select('sk.sektor_id');
	$ci->db->from('scope_konsultan as sk');
	$ci->db->join('sektor as sr', 'sr.id = sk.sektor_id');
	$ci->db->where('sk.user_id', $id);
	$query = $ci->db->get()->row();
	if ($query) {
		return $query->sektor_id;
	} else {
		return false;
	}
}

/**
 * 
 * $param
 * create abjad list
 */
function get_abjad_kecil($index)
{
	$abjad = array(1 => 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
	return $abjad[$index];
}

function upload_dokumen($name = '')
{
	$ci = &get_instance();
	$config['upload_path'] = './assets/upload/keuangan/';
	$config['allowed_types'] = 'pdf|PDF|doc|docx|xls|xlsx|jpg|png';
	$config['max_size'] = 10048;
	$config['file_name'] = $name != '' ? $name : 'sp2d-' . strtotime(date('Y-m-d H:i:s'));
	$ci->load->library('upload', $config);
}
