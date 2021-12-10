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
		$this->db->select('g.id as id, p.id as id_program, p.kode_program as kode_program, p.nama_program as nm_p, k.kode_kegiatan as kode_k, k.nama_kegiatan as nm_k,
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

	public function get_total_pagu()
	{
		$this->db->select('g.id as id, p.id as id_program, p.kode_program as kode_program, p.nama_program as nm_p, k.kode_kegiatan as kode_k, k.nama_kegiatan as nm_k,
							s.kode_subkegiatan as kode_sub, s.nama_subkegiatan as nama_sub, g.uraian_pekerjaan as pekerjaan,
							g.lokasi as lokasi, g.volume as volume, t.nama_satuan as satuan, g.pagu as pagu, g.tanggal as tanggal, 
							j.nama_jenis as jenis, SUM(g.pagu) as sum');
		$this->db->from('pagu as g');
		$this->db->join('subkegiatan as s', 's.id = g.subkegiatan_id', 'LEFT');
		$this->db->join('kegiatan as k', 'k.id = s.kegiatan_id', 'LEFT');
		$this->db->join('program as p', 'p.id = k.program_id', 'LEFT');
		$this->db->join('jenis_pengadaan as j', 'j.id = g.jenis_id', 'LEFT');
		$this->db->join('satuan as t', 't.id = g.satuan_id', 'LEFT');
		$this->db->group_by('p.id');
		$this->db->order_by('p.nama_program', 'asc');
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
							g.pagu, kk.nilai_kontrak');
		$this->db->from('pagu as g');
		$this->db->join('subkegiatan as s', 's.id = g.subkegiatan_id', 'LEFT');
		$this->db->join('kegiatan as k', 'k.id = s.kegiatan_id', 'LEFT');
		$this->db->join('program as p', 'p.id = k.program_id', 'LEFT');
		$this->db->join('kontrak as kk', 'kk.pagu_id = g.id');
		$this->db->where('g.id', $id);
		return $this->db->get();
	}

	public function store_data_kontrak($data)
	{
		return $this->db->insert('kontrak', $data);
	}

	public function get_kontrak_data()
	{
		$this->db->select('k.id as id, k.pagu_id as id_pagu, k.nilai_kontrak as nilai, k.no_kontrak as nomor, k.tgl_kontrak as tgl, k.jangka as jangka,
							k.mulai as mulai, k.selesai as selesai, k.penyedia as penyedia, p.uraian_pekerjaan as pekerjaan');
		$this->db->from('kontrak as k');
		$this->db->join('pagu as p', 'p.id = k.pagu_id', 'LEFT');
		$this->db->join('subkegiatan as s', 's.id = p.subkegiatan_id', 'LEFT');
		$this->db->join('kegiatan as g', 'g.id = s.kegiatan_id', 'LEFT');
		$this->db->join('program as r', 'r.id = g.program_id', 'LEFT');
		$this->db->order_by('k.created_at', 'desc');
		return $this->db->get();
	}

	public function delete_kontrak($id)
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('kontrak');
		if ($del) {
			return $this->db->query('ALTER TABLE kontrak AUTO_INCREMENT=1');
		} else {
			return false;
		}
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

	public function count_all_value()
	{
		return $this->db->query('
		SELECT SUM(p.pagu) as pagu, SUM(k.nilai_kontrak) as kontrak
		FROM kontrak as k
		JOIN pagu as p ON p.id = k.pagu_id
        JOIN scope_konsultan as sc ON sc.pekerjaan_id = k.id
	');
	}

	public function get_program_id()
	{
		return $this->db->query('
		SELECT pg.id, pg.nama_program, sk.kegiatan_id, kg.id as id_kegiatan, kg.nama_kegiatan , sk.nama_subkegiatan, p.subkegiatan_id, SUM(p.pagu) as pagu, SUM(k.nilai_kontrak) as kontrak
		FROM kontrak as k
		JOIN pagu as p ON p.id = k.pagu_id
        JOIN scope_konsultan as sc ON sc.pekerjaan_id = k.id
		JOIN subkegiatan as sk ON sk.id = p.subkegiatan_id
		JOIN kegiatan as kg ON kg.id = sk.kegiatan_id
		JOIN program as pg ON pg.id = kg.program_id
		GROUP BY pg.id
		ORDER BY pg.nama_program ASC
		');
	}

	public function get_kegiatan_id()
	{
		return $this->db->query('
		SELECT sk.kegiatan_id, kg.id, kg.program_id, kg.nama_kegiatan, sk.nama_subkegiatan, p.subkegiatan_id, SUM(p.pagu) AS pagu, SUM(k.nilai_kontrak) AS kontrak
		FROM kontrak AS k
		JOIN pagu AS p ON p.id = k.pagu_id
		JOIN subkegiatan AS sk ON sk.id = p.subkegiatan_id
		JOIN kegiatan AS kg	ON kg.id = sk.kegiatan_id
		JOIN scope_konsultan AS sc ON sc.pekerjaan_id = k.id
		GROUP BY kg.id
		');
	}

	public function get_subkegiatan_id()
	{
		return $this->db->query('
		SELECT sk.id, sk.nama_subkegiatan, pg.id as idp, sk.kegiatan_id as idk, p.subkegiatan_id, SUM(p.pagu) as pagu, SUM(k.nilai_kontrak) as kontrak
		FROM kontrak as k
		JOIN pagu as p ON p.id = k.pagu_id
		JOIN scope_konsultan as sc ON sc.pekerjaan_id = k.id
		JOIN subkegiatan as sk ON sk.id = p.subkegiatan_id
		JOIN kegiatan as kg ON kg.id = sk.kegiatan_id
		JOIN program as pg ON pg.id = kg.program_id
		GROUP BY p.subkegiatan_id
		');
	}

	public function get_data_rfk()
	{
		$this->db->select('s.id, k.nilai_kontrak, k.id as id_kontrak, k.no_kontrak, k.penyedia, p.uraian_pekerjaan, p.pagu, p.lokasi, SUM(pr.bobot_total) as fisik,
							k.jangka, k.mulai, k.selesai, sk.id as subkeg, kg.id as idk, pg.id as idp');
		$this->db->from('scope_konsultan as s');
		$this->db->join('kontrak as k', 'k.id = s.pekerjaan_id');
		$this->db->join('pagu as p', 'p.id = k.pagu_id');
		$this->db->join('rab as r', 'r.pekerjaan_id = s.id');
		$this->db->join('progress_report as pr', 'pr.rab_id = r.id');
		$this->db->join('subkegiatan as sk', 'sk.id = p.subkegiatan_id');
		$this->db->join('kegiatan as kg', 'kg.id = sk.kegiatan_id');
		$this->db->join('program as pg', 'pg.id = kg.program_id');
		$this->db->group_by('r.pekerjaan_id');
		return $this->db->get();
	}

	public function show_keuangan_data()
	{
		$this->db->select('k.*, p.uraian_pekerjaan as paket');
		$this->db->from('keuangan as k');
		$this->db->join('kontrak as r', 'r.id = k.kontrak_id');
		$this->db->join('pagu as p', 'p.id = r.pagu_id');
		return $this->db->get();
	}

	public function save_data_keuangan($data)
	{
		return $this->db->insert('keuangan', $data);
	}

	public function delete_realisasi($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('keuangan');
		if ($query) {
			return $this->db->query('ALTER TABLE keuangan AUTO_INCREMENT=1');
		} else {
			return false;
		}
	}

	public function get_keuangan_data()
	{
		$this->db->select('kontrak_id as id_kontrak, SUM(jumlah) as jumlah, SUM(persentase_kontrak) as persen_kontrak');
		$this->db->from('keuangan');
		$this->db->group_by('kontrak_id');
		return $this->db->get();
	}

	public function get_progres_data()
	{
		$this->db->select('k.id as id_kontrak, SUM(pr.bobot_total) as persen');
		$this->db->from('progress_report as pr');
		$this->db->join('rab as r', 'r.id = pr.rab_id');
		$this->db->join('scope_konsultan as sk', 'sk.id = r.pekerjaan_id');
		$this->db->join('kontrak as k', 'k.id = sk.pekerjaan_id');
		$this->db->group_by('pr.rab_id');
		return $this->db->get();
	}
}
