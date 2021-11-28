<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konsultan_model extends CI_Model
{
    public function get_penugasan($id)
    {
        $this->db->select('k.id, p.uraian_pekerjaan as pekerjaan, s.sektor_id, s.tanggal');
        $this->db->from('scope_konsultan as s');
        $this->db->join('kontrak as k', 'k.id = s.pekerjaan_id', 'left');
        $this->db->join('pagu as p', 'p.id = k.pagu_id', 'left');
        $this->db->where('s.user_id', $id);
        return $this->db->get();
    }

    public function get_divisi($id)
    {
        $this->db->where('sektor_id', $id);
        return $this->db->get('divisi');
    }

    public function get_divisi_progres()
    {
        return $this->db->get('divisi');
    }

    public function get_seksi($id)
    {
        return $this->db->get_where('seksi', ['divisi_id' => $id]);
    }

    public function get_paket_data($id)
    {
        $this->db->select('s.id as ids, p.uraian_pekerjaan as uraian, p.lokasi, k.no_kontrak, k.mulai, k.penyedia');
        $this->db->from('scope_konsultan as s');
        $this->db->join('kontrak as k', 'k.id = s.pekerjaan_id', 'left');
        $this->db->join('pagu as p', 'p.id = k.pagu_id', 'left');
        $this->db->where('s.user_id', $id);
        return $this->db->get();
    }

    public function get_rab_data($id, $sektor)
    {
        $this->db->select('r.*, d.nama_divisi, o.sektor_id, s.nama_seksi, r.seksi_lain, k.no_kontrak, k.penyedia, k.mulai, p.lokasi, p.uraian_pekerjaan as uraian');
        $this->db->from('rab as r');
        $this->db->join('scope_konsultan as o', 'o.pekerjaan_id = r.pekerjaan_id', 'left');
        $this->db->join('kontrak as k', 'k.id = r.pekerjaan_id', 'left');
        $this->db->join('pagu as p', 'p.id = k.pagu_id', 'left');
        $this->db->join('divisi as d', 'd.id = r.divisi_id', 'left');
        $this->db->join('seksi as s', 's.id = r.seksi_id', 'left');
        $this->db->where('r.konsultan_id', $id);
        if ($sektor == 2) {
            $this->db->group_by('r.seksi_lain');
        }
        $this->db->order_by('r.id', 'asc');

        return $this->db->get();
    }

    public function store_rab($data)
    {
        return $this->db->insert('rab', $data);
    }

    public function delete_rab_data($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('rab');
        if ($query) {
            return $this->db->query('ALTER TABLE rab AUTO_INCREMENT=1');
        } else {
            return false;
        }
    }

    public function get_rab_awal($id)
    {
        $this->db->select('r.pekerjaan_id as id, p.uraian_pekerjaan');
        $this->db->from('rab as r');
        $this->db->join('scope_konsultan as c', 'c.id = r.pekerjaan_id', 'left');
        $this->db->join('kontrak as k', 'k.id = c.pekerjaan_id', 'left');
        $this->db->join('pagu as p', 'p.id = k.pagu_id', 'left');
        $this->db->where('r.konsultan_id', $id);
        $this->db->group_by('r.pekerjaan_id');
        return $this->db->get();
    }

    public function get_divisi_rab($id)
    {
        $this->db->select('d.id, d.nama_divisi');
        $this->db->from('rab as r');
        $this->db->join('divisi as d', 'd.id = r.divisi_id', 'left');
        $this->db->where('r.pekerjaan_id', $id);
        $this->db->group_by('r.divisi_id');
        return $this->db->get();
    }

    public function get_seksi_rab($id)
    {
        $this->db->select('s.id, r.id as idr, s.nama_seksi, r.seksi_lain, r.cabang_seksi_lain');
        $this->db->from('rab as r');
        $this->db->join('seksi as s', 's.id = r.seksi_id', 'left');
        $this->db->where('r.divisi_id', $id);
        $this->db->order_by('r.seksi_lain', 'asc');
        return $this->db->get();
    }

    public function get_data_rab_id($id, $idp, $seksi)
    {
        $this->db->where('seksi_id', $id);
        $this->db->where('pekerjaan_id', $idp);
        if (in_array($id, [70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82])) {
            $this->db->like('seksi_lain', $seksi, 'both');
        }
        return $this->db->get('rab');
    }

    public function get_old_progres($id, $bulan)
    {
        $this->db->where('rab_id', $id);
        $this->db->where('bulan', $bulan);
        return $this->db->get('progress_report');
    }

    public function store_progress($data)
    {
        return $this->db->insert('progress_report', $data);
    }

    public function get_header_rab($id)
    {
        $this->db->select('d.id, d.nama_divisi as divisi');
        $this->db->from('rab as r');
        $this->db->join('divisi as d', 'd.id = r.divisi_id', 'left');
        $this->db->where('r.konsultan_id', $id);
        $this->db->group_by('r.divisi_id');
        return $this->db->get();
    }

    public function get_progres_data($id, $bulan)
    {
        $this->db->select('p.id, ROUND(p.vol_sebelum, 2) as vol_sebelum, ROUND(p.jlh_harga_sebelum, 2) as jlh_harga_sebelum, 
                            ROUND(p.bobot_sebelum, 2) as bobot_sebelum, ROUND(p.vol_sekarang, 2) as vol_sekarang, 
                            ROUND(p.jlh_harga_sekarang, 2) as jlh_harga_sekarang, ROUND(p.bobot_sekarang, 2) as bobot_sekarang, 
                            ROUND(p.vol_total, 2) as vol_total, ROUND(p.harga_total, 2) as harga_total, ROUND(p.bobot_total, 2) as bobot_total, 
                            r.divisi_id, r.satuan, r.seksi_id, s.nama_seksi, r.seksi_lain, r.cabang_seksi_lain');
        $this->db->from('progress_report as p');
        $this->db->join('rab as r', 'r.id = p.rab_id', 'left');
        $this->db->join('seksi as s', 's.id = r.seksi_id', 'left');
        $this->db->join('divisi as d', 'd.id = r.divisi_id', 'left');
        $this->db->where('p.konsultan_id', $id);
        $this->db->where('p.bulan', $bulan);
        return $this->db->get();
    }

    public function get_jumlah_progres_by($id, $bulan)
    {
        return $this->db->query("
        SELECT p.id, COALESCE(d.id, 100) as idd, ROUND(SUM(p.jlh_harga_sekarang), 2) as total_sekarang, ROUND(SUM(p.vol_sekarang), 2) as vol_tot_skrg,
        ROUND(SUM(p.bobot_sekarang), 2) as bobot_tot_skrg
        FROM progress_report as p
        JOIN rab as r ON r.id = p.rab_id
        JOIN divisi as d ON d.id = r.divisi_id
        JOIN seksi as s ON s.id = r.seksi_id
        WHERE p.bulan = $bulan and p.konsultan_id = $id
        GROUP BY d.id WITH ROLLUP
        ");
    }

    public function get_total_progres_by($id, $bulan)
    {
        return $this->db->query("
        SELECT p.id, COALESCE( d.id, 'total') as idd, ROUND(SUM(p.jlh_harga_sekarang), 2) as total_akhir
        FROM progress_report as p
        JOIN rab as r ON r.id = p.rab_id
        JOIN divisi as d ON d.id = r.divisi_id
        JOIN seksi as s ON s.id = r.seksi_id
        WHERE p.bulan = $bulan and p.konsultan_id = $id
        GROUP BY p.bulan
        ");
    }

    public function get_list_lain($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('seksi');
    }

    public function get_scope_sektor($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('scope_konsultan');
    }

    public function get_header_tabel($id)
    {
        $this->db->select('d.nama_divisi, r.*, s.id as ids, k.sektor_id');
        $this->db->from('rab as r');
        $this->db->join('divisi as d', 'd.id = r.divisi_id', 'left');
        $this->db->join('scope_konsultan as k', 'k.pekerjaan_id = r.pekerjaan_id', 'left');
        $this->db->join('sektor as s', 's.id = k.sektor_id', 'left');
        $this->db->where('r.konsultan_id', $id);
        $this->db->group_by('r.divisi_id');
        return $this->db->get();
    }
    public function get_cabang_seksi($id, $sektor)
    {
        $this->db->select('r.*');
        $this->db->from('rab as r');
        $this->db->join('scope_konsultan as s', 's.pekerjaan_id = r.pekerjaan_id', 'left');
        $this->db->where('r.konsultan_id', $id);
        $this->db->where('s.sektor_id', $sektor);
        return $this->db->get();
    }

    public function get_total_harga($id)
    {
        $this->db->select('divisi_id, SUM(jumlah) as jumlah, SUM(bobot) as bobot');
        $this->db->from('rab');
        $this->db->where('konsultan_id', $id);
        $this->db->group_by('divisi_id');
        return $this->db->get();
    }

    public function get_total($id)
    {
        $this->db->select('SUM(r.jumlah) as total_final, s.sektor_id');
        $this->db->from('rab as r');
        $this->db->join('scope_konsultan as s', 's.pekerjaan_id = r.pekerjaan_id', 'left');
        $this->db->where('r.konsultan_id', $id);
        $this->db->group_by('r.konsultan_id');
        return $this->db->get();
    }

    public function get_rab_data_sektor($ids, $idp)
    {
        $this->db->select('r.*, s.nama_seksi as seksi');
        $this->db->from('rab as r');
        $this->db->join('seksi as s', 's.id = r.seksi_id');
        $this->db->where('r.pekerjaan_id', $idp);
        return $this->db->get();
    }

    public function get_data_rab_adendum($id)
    {
        return $this->db->get_where('rab', ['id' => $id]);
    }

    public function store_adendum_data($id_rab, $data_rab, $data)
    {
        $this->db->where('id', $id_rab);
        $query = $this->db->update('rab', $data_rab);
        if ($query) {
            return $this->db->insert('adendum', $data);
        } else {
            return false;
        }
    }

    public function get_adendum_data($id)
    {
        $this->db->select('a.id as ida, a.*, r.*, s.sektor_id, i.nama_seksi as seksi');
        $this->db->from('adendum as a');
        $this->db->join('rab as r', 'r.id = a.rab_id');
        $this->db->join('scope_konsultan as s', 's.id = r.pekerjaan_id');
        $this->db->join('seksi as i', 'i.id = r.seksi_id');
        $this->db->where('a.konsultan_id', $id);
        return $this->db->get();
    }
}


/* End of file Konsultan_model.php and path /application/models/Konsultan_model.php */
