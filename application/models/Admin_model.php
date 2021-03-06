<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function store_data($data, $table)
	{
		return $this->db->insert($table, $data);
	}

	public function delete_data($id, $table)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete($table);
		if ($query) :
			return $this->db->query("ALTER TABLE $table AUTO_INCREMENT=1");
		else :
			return false;
		endif;
	}

	public function show_kegiatan()
	{
		return $this->db->get('kegiatan');
	}

	public function show_dataProgram()
	{
		return $this->db->get('program');
	}

	public function store_program($data)
	{
		return $this->db->insert('program', $data);
	}

	public function delete_program($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('program');
	}

	public function store_kegiatan($data)
	{
		return $this->db->insert('kegiatan', $data);
	}

	public function delete_kegiatan($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('kegiatan');
	}


	public function show_dataKegiatan()
	{
		$this->db->select('k.*, k.id as id, p.nama_program as program, k.tgl as tgl');
		$this->db->from('kegiatan as k');
		$this->db->join('program as p', 'p.id = k.program_id', 'LEFT');
		return $this->db->get();
	}

	public function store_subkegiatan($data)
	{
		return $this->db->insert('subkegiatan', $data);
	}

	public function show_subkegiatan()
	{
		$this->db->select('s.*, k.*, s.tgl as tgl');
		$this->db->from('subkegiatan as s');
		$this->db->join('kegiatan as k', 'k.id = s.kegiatan_id', 'LEFT');
		return $this->db->get();
	}

	// ajax calling
	public function ajax_kegiatan($id)
	{
		$this->db->where('program_id', $id);
		return $this->db->get('kegiatan');
	}

	public function ajax_subkegiatan($id)
	{
		$this->db->where('kegiatan_id', $id);
		return $this->db->get('subkegiatan');
	}

	public function get_subkegiatan()
	{
		return $this->db->get('subkegiatan');
	}

	public function get_data_program($sub)
	{
		$this->db->select('s.id as id, p.kode_program as kode_program, p.nama_program, k.kode_kegiatan, k.nama_kegiatan,
							s.kode_subkegiatan as kode_sub, s.nama_subkegiatan as nama_sub');
		$this->db->from('subkegiatan as s');
		$this->db->join('kegiatan as k', 'k.id = s.kegiatan_id', 'LEFT');
		$this->db->join('program as p', 'p.id = k.program_id', 'LEFT');
		$this->db->where('s.id', $sub);
		return $this->db->get();
	}

	public function get_role_data()
	{
		return $this->db->get('role');
	}

	public function get_role_byID($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('role');
	}

	public function store_pagu($data)
	{
		return $this->db->insert('pagu', $data);
	}

	public function update_pagu($id_pagu, $data)
	{
		$this->db->where('id', $id_pagu);
		return $this->db->update('pagu', $data);
	}

	public function show_pagu_data()
	{
		$this->db->select('g.id as id, p.kode_program as kode_program, p.nama_program as nm_p, k.kode_kegiatan as kode_k, k.nama_kegiatan as nm_k,
							s.kode_subkegiatan as kode_sub, s.nama_subkegiatan as nama_sub, g.uraian_pekerjaan as pekerjaan,
							g.lokasi as lokasi, g.volume as volume, t.nama_satuan as satuan, g.pagu as pagu, g.tanggal as tanggal, 
							j.nama_jenis as jenis');
		$this->db->from('pagu as g');
		$this->db->join('subkegiatan as s', 's.id = g.subkegiatan_id', 'LEFT');
		$this->db->join('kegiatan as k', 'k.id = s.kegiatan_id', 'LEFT');
		$this->db->join('program as p', 'p.id = k.program_id', 'LEFT');
		$this->db->join('jenis_pengadaan as j', 'j.id = g.jenis_id', 'LEFT');
		$this->db->join('satuan as t', 't.id = g.satuan_id', 'LEFT');
		return $this->db->get();
	}

	public function delete_pagu_data($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('pagu');
		if ($query) {
			return $this->db->query('ALTER TABLE pagu AUTO_INCREMENT=1');
		} else {
			return false;
		}
	}
	public function delete_penugasan_data($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('scope_konsultan');
		if ($query) {
			return $this->db->query('ALTER TABLE scope_konsultan AUTO_INCREMENT=1');
		} else {
			return false;
		}
	}

	public function get_pagu_data($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('pagu');
	}

	public function get_satuan()
	{
		return $this->db->get('satuan');
	}

	public function store_satuan($data)
	{
		return $this->db->insert('satuan', $data);
	}

	public function ambil_data_pagu($id)
	{
		$this->db->select('g.id as id, g.uraian_pekerjaan as pekerjaan, p.nama_program as program, k.nama_kegiatan as kegiatan, s.nama_subkegiatan as sub,
							g.pagu');
		$this->db->from('pagu as g');
		$this->db->join('subkegiatan as s', 's.id = g.subkegiatan_id', 'LEFT');
		$this->db->join('kegiatan as k', 'k.id = s.kegiatan_id', 'LEFT');
		$this->db->join('program as p', 'p.id = k.program_id', 'LEFT');
		$this->db->where('g.id', $id);
		return $this->db->get();
	}

	public function store_data_kontrak($data)
	{
		return $this->db->insert('kontrak', $data);
	}

	public function get_kontrak_data()
	{
		$this->db->select('k.id as id, k.nilai_kontrak as nilai, k.no_kontrak as nomor, k.tgl_kontrak as tgl, k.jangka as jangka,
							k.mulai as mulai, k.selesai as selesai, k.penyedia as penyedia, p.uraian_pekerjaan as pekerjaan');
		$this->db->from('kontrak as k');
		$this->db->join('pagu as p', 'p.id = k.pagu_id', 'LEFT');
		$this->db->join('subkegiatan as s', 's.id = p.subkegiatan_id', 'LEFT');
		$this->db->join('kegiatan as g', 'g.id = s.kegiatan_id', 'LEFT');
		$this->db->join('program as r', 'r.id = g.program_id', 'LEFT');
		return $this->db->get();
	}

	public function ambil_data_kontrak_pagu($id)
	{
		$this->db->select('k.nilai_kontrak as kontrak, p.pagu as pagu');
		$this->db->from('kontrak as k');
		$this->db->join('pagu as p', 'p.id = k.pagu_id', 'LEFT');
		$this->db->where('k.id', $id);
		return $this->db->get();
	}

	public function store_user($data_user, $data_role)
	{
		$this->db->insert('user', $data_user);
		$data_role['user_id'] = $this->db->insert_id();

		return $this->db->insert('user_role', $data_role);
	}

	public function get_user_data()
	{
		$this->db->select('u.id as id, u.nama as nama, u.email as email, u.pass as pass, e.nama_role as role');
		$this->db->from('user as u');
		$this->db->join('user_role as r', 'r.user_id = u.id', 'left');
		$this->db->join('role as e', 'e.id = r.role_id', 'left');
		return $this->db->get();
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('user');
		if ($query) :
			$this->db->query('ALTER TABLE user AUTO_INCREMENT=1');
			return $this->db->query('ALTER TABLE user_role AUTO_INCREMENT=1');
		else :
			return false;
		endif;
	}

	public function get_sektor_data()
	{
		return $this->db->get('sektor');
	}

	public function store_sektor($data)
	{
		return $this->db->insert('sektor', $data);
	}

	public function get_divisi()
	{
		$this->db->select('d.id, d.nama_divisi, s.nama_sektor, d.tanggal');
		$this->db->from('divisi as d');
		$this->db->join('sektor as s', 's.id = d.sektor_id', 'left');
		return $this->db->order_by('id')->get();
	}

	public function store_divisi($data)
	{
		return $this->db->insert('divisi', $data);
	}

	public function get_seksi()
	{
		$this->db->select('s.id, s.nama_seksi, d.nama_divisi, s.tanggal');
		$this->db->from('seksi as s');
		$this->db->join('divisi as d', 'd.id = s.divisi_id', 'left');
		$this->db->order_by('s.id', 'asc');
		return $this->db->get();
	}

	public function save_seksi_data($data)
	{
		return $this->db->insert('seksi', $data);
	}

	public function delete_seksi($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('seksi');
		if ($query) {
			return $this->db->query('ALTER TABLE seksi AUTO_INCREMENT=1');
		} else {
			return false;
		}
	}

	public function get_riwayat()
	{
		$this->db->select('s.id, u.nama, p.uraian_pekerjaan as pekerjaan, s.tanggal');
		$this->db->from('scope_konsultan as s');
		$this->db->join('kontrak as k', 'k.id = s.pekerjaan_id', 'left');
		$this->db->join('pagu as p', 'p.id = k.pagu_id', 'left');
		$this->db->join('user as u', 'u.id = s.user_id', 'left');
		return $this->db->get();
	}

	public function get_pekerjaan()
	{
		$this->db->select('k.id, p.uraian_pekerjaan as pekerjaan');
		$this->db->from('kontrak as k');
		$this->db->join('pagu as p', 'p.id = k.pagu_id', 'left');
		return $this->db->get();
	}

	public function get_konsultan()
	{
		$this->db->select('u.id, u.nama');
		$this->db->from('user as u');
		$this->db->join('user_role as r', 'r.user_id = u.id', 'left');
		$this->db->where('r.role_id', 2);
		return $this->db->get();
	}

	public function store_penugasan($data)
	{
		return $this->db->insert('scope_konsultan', $data);
	}

	public function delete_sektor($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('sektor');
	}
}
