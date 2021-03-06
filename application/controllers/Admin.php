<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
	}

	public function index()
	{
		$data = [
			'title' => 'Dinas PUPR - Home',
			'breadcrumb' => ''
		];
		$this->template->load('template/master', 'admin/home', $data, false);
	}

	public function program()
	{
		$data = [
			'title' => 'Admin - List Program',
			'breadcrumb' => 'Program'
		];

		$data['program'] = $this->Admin_model->show_dataProgram()->result_array();
		$this->template->load('template/master', 'admin/program', $data, false);
	}

	public function simpan_program()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'kode_program' => $_POST['kode'],
				'nama_program' => $_POST['program'],
				'tgl' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Admin_model->store_program($data);

			if ($simpan) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Data program berhasil disimpan'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Data program gagal disimpan'
				];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function hapus_program()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			$hapus = $this->Admin_model->delete_program($id);
			if ($hapus) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Data program berhasil dihapus'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Data program gagal dihapus'
				];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function kegiatan()
	{
		$data = [
			'title' => 'Admin - List Kegiatan',
			'breadcrumb' => 'Kegiatan'
		];

		// ambil data program
		$data['program'] = $this->Admin_model->show_dataProgram()->result_array();

		// tampilkan data
		$data['kegiatan'] = $this->Admin_model->show_dataKegiatan()->result_array();
		$this->template->load('template/master', 'admin/kegiatan', $data, false);
	}

	public function simpan_kegiatan()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'kode_kegiatan' => $_POST['kode'],
				'nama_kegiatan' => $_POST['kegiatan'],
				'program_id' => $_POST['program'],
				'tgl' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Admin_model->store_kegiatan($data);

			if ($simpan) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Data kegiatan berhasil disimpan'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Data kegiatan gagal disimpan'
				];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function hapus_kegiatan()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			$hapus = $this->Admin_model->delete_kegiatan($id);
			if ($hapus) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Data kegiatan berhasil dihapus'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Data kegiatan gagal dihapus'
				];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function subkegiatan()
	{
		$data = [
			'title' => 'Admin - List Sub Kegiatan',
			'breadcrumb' => 'Sub Kegiatan'
		];

		$data['kegiatan'] = $this->Admin_model->show_dataKegiatan()->result_array();
		$data['subkegiatan'] = $this->Admin_model->show_subkegiatan()->result_array();

		$this->template->load('template/master', 'admin/subkegiatan', $data, false);
	}

	public function simpan_subkegiatan()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'kode_subkegiatan' => $_POST['kode'],
				'nama_subkegiatan' => $_POST['subkegiatan'],
				'kegiatan_id' => $_POST['kegiatan'],
				'tgl' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Admin_model->store_subkegiatan($data);

			if ($simpan) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Data sub kegiatan berhasil disimpan'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Data sub kegiatan gagal disimpan'
				];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	// ajax call
	public function get_kegiatan()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			//cek data
			$result = $this->Admin_model->ajax_kegiatan($id)->result_array();
			foreach ($result as $key => $r) {
				$data[] = [
					'id' => $r['id'],
					'nama_kegiatan' => $r['nama_kegiatan']
				];
			}
			echo json_encode($data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function get_subkegiatan()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			//cek data
			$result = $this->Admin_model->ajax_subkegiatan($id)->result_array();
			foreach ($result as $key => $r) {
				$data[] = [
					'id' => $r['id'],
					'subkegiatan' => $r['nama_subkegiatan']
				];
			}
			echo json_encode($data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function get_data_detil()
	{
		if ($this->input->is_ajax_request()) {
			$sub = $_POST['id'];
			// cek data
			$cek = $this->Admin_model->get_data_program($sub)->row_array();
			$data_ajax = [
				'id' => $cek['id'],
				'kode_p' => $cek['kode_program'],
				'nm_p' => $cek['nama_program'],
				'kode_k' => $cek['kode_kegiatan'],
				'nm_k' => $cek['nama_kegiatan'],
				'kode_sub' => $cek['kode_sub'],
				'nama_sub' => $cek['nama_sub'],
			];
			echo json_encode($data_ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function satuan()
	{
		$data = [
			'title' => 'Dinas PUPR - Daftar Satuan',
			'breadcrumb' => 'Satuan'
		];

		$data['satuan'] = $this->Admin_model->get_satuan()->result_array();
		$this->template->load('template/master', 'admin/satuan', $data, false);
	}

	public function add_satuan()
	{
		if ($this->input->is_ajax_request()) {
			$data = ['nama_satuan' => $_POST['satuan']];
			$simpan = $this->Admin_model->store_satuan($data);
			if ($simpan) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Data satuan berhasil disimpan'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Data satuan gagal disimpan'
				];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function user_list()
	{
		$data = ['title' => 'Dinas PUPR - List User', 'breadcrumb' => 'List User'];

		$data['role'] = $this->Admin_model->get_role_data()->result_array();
		$data['user'] = $this->Admin_model->get_user_data()->result_array();
		$this->template->load('template/master', 'admin/user', $data, false);
	}

	public function add_user()
	{
		if ($this->input->is_ajax_request()) {
			$data_user = [
				'nama'		=> htmlspecialchars($_POST['nama'], true),
				'email' 	=> htmlspecialchars($_POST['email'], true),
				'password'	=> password_hash($_POST['password'], PASSWORD_DEFAULT),
				'pass'		=> htmlspecialchars($_POST['password'], true)
			];
			$data_role = ['role_id' => htmlspecialchars($_POST['role'], true)];

			$simpan = $this->Admin_model->store_user($data_user, $data_role);
			if ($simpan) :
				$ajax = ['status' => 'sukses', 'pesan' => 'Data user berhasil disimpan'];
			else :
				$ajax = ['status' => 'gagal', 'pesan' => 'Data user gagal disimpan'];
			endif;
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function hapus_user()
	{
		if ($this->input->is_ajax_request()) {
			$id = htmlspecialchars($_POST['id']);
			$hapus = $this->Admin_model->delete_user($id);
			if ($hapus) :
				$ajax = ['status' => 'sukses', 'pesan' => 'Data user berhasil dihapus'];
			else :
				$ajax = ['status' => 'gagal', 'pesan' => 'Data user gagal dihapus'];
			endif;
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function role()
	{
		$data = ['title' => 'Dinas PUPR - List Role', 'breadcrumb' => 'List Role'];

		$data['role'] = $this->Admin_model->get_role_data()->result_array();
		$this->template->load('template/master', 'admin/role', $data, false);
	}

	public function add_role()
	{
		if ($this->input->is_ajax_request()) {
			$table = 'role';
			$data = [
				'nama_role' => $_POST['nama'],
				'tgl' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Admin_model->store_data($data, $table);
			if ($simpan) :
				$ajax = ['status' => 'sukses', 'pesan' => 'Data role berhasil disimpan'];
			else :
				$ajax = ['status' => 'gagal', 'pesan' => 'Data role gagal disimpan'];
			endif;
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function get_role()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			$cek = $this->Admin_model->get_role_byID($id)->row_array();
			echo json_encode($cek);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function update_role()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			$table = 'role';
			$data = [
				'nama_role' => $_POST['nama_role'],
				'date' => date('Y-m-d H:i:s')
			];
			$update = $this->Admin_model->update_data($id, $data, $table);
			if ($update) :
				$ajax = ['status' => 'sukses', 'pesan' => 'Data role berhasil diperbaharui'];
			else :
				$ajax = ['status' => 'gagal', 'pesan' => 'Data role gagal diperbaharui'];
			endif;
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function hapus_role()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			$table = 'role';
			$hapus = $this->Admin_model->delete_data($id, $table);
			if ($hapus) :
				$ajax = ['status' => 'sukses', 'pesan' => 'Data role berhasil dihapus'];
			else :
				$ajax = ['status' => 'gagal', 'pesan' => 'Data role gagal dihapus'];
			endif;
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function pagu()
	{
		$data = [
			'title' => 'Admin - Kegiatan',
			'breadcrumb' => 'Pagu',
			'program' => $this->Admin_model->show_dataProgram()->result_array(),
		];

		$data['subkegiatan'] = $this->Admin_model->get_subkegiatan()->result_array();
		$data['pagu'] = $this->Admin_model->show_pagu_data()->result_array();
		$data['satuan'] = $this->Admin_model->get_satuan()->result_array();
		$this->template->load('template/master', 'admin/pagu', $data, false);
	}

	public function add_pagu()
	{
		if ($this->input->is_ajax_request()) {
			$array = array('.', ',');
			$data = [
				'subkegiatan_id' => $_POST['subkegiatan'],
				'uraian_pekerjaan' => $_POST['pekerjaan'],
				'lokasi' => $_POST['lokasi'],
				'volume' => $_POST['volume'],
				'satuan_id' => $_POST['satuan'],
				'pagu' => str_replace($array, '', $_POST['pagu']),
				'jenis_id' => $_POST['jenis'],
				'tanggal' => date('Y-m-d H:i:s')
			];
			/*var_dump($data);die();*/
			$simpan = $this->Admin_model->store_pagu($data);
			if ($simpan) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Data pagu berhasil disimpan'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Data pagu gagal disimpan'
				];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function edit_pagu()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			$cari = $this->Admin_model->get_pagu_data($id)->row_array();
			$data = [
				'id' => $id,
				'sub_keg' => $cari['subkegiatan_id'],
				'uraian' => $cari['uraian_pekerjaan'],
				'lokasi' => $cari['lokasi'],
				'volume' => $cari['volume'],
				'satuan' => $cari['satuan_id'],
				'pagu' => $cari['pagu'],
				'jenis' => $cari['jenis_id'],
			];
			/*var_dump($data);die();*/
			echo json_encode($data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function update_pagu()
	{
		if ($this->input->is_ajax_request()) {
			$array = array('.', ',');
			$id_pagu = $_POST['id_pagu'];
			$data = [
				'subkegiatan_id' => $_POST['subkegiatan'],
				'uraian_pekerjaan' => $_POST['pekerjaan'],
				'lokasi' => $_POST['lokasi'],
				'volume' => $_POST['volume'],
				'satuan_id' => $_POST['satuan'],
				'pagu' => str_replace($array, '', $_POST['pagu']),
				'jenis_id' => $_POST['jenis'],
				'tanggal' => date('Y-m-d H:i:s')
			];
			/*var_dump($data);die();*/
			$update = $this->Admin_model->update_pagu($id_pagu, $data);
			if ($update) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Data pagu berhasil diperbaharui'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Data pagu gagal diperbaharui'
				];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function delete_pagu()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id', true);
			$hapus = $this->Admin_model->delete_pagu_data($id);
			if ($hapus) {
				$ajax = ['status' => 'sukses', 'pesan' => 'Data pagu berhasil dihapus'];
			} else {
				$ajax = ['status' => 'gagal', 'pesan' => 'Data pagu gagal dihapus'];
			}
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function get_pagu_data()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			$cari = $this->Admin_model->ambil_data_pagu($id)->row_array();
			$data = [
				'program' => $cari['program'],
				'kegiatan' => $cari['kegiatan'],
				'pagu' => $cari['pagu'],
				'sub' => $cari['sub'],
			];

			echo json_encode($data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function kontrak()
	{
		$data = [
			'title' => 'Admin - Kontrak',
			'breadcrumb' => 'Kontrak',
			'pagu' => $this->Admin_model->show_pagu_data()->result_array()
		];

		$data['kontrak'] = $this->Admin_model->get_kontrak_data()->result_array();
		$this->template->load('template/master', 'admin/kontrak', $data, false);
	}

	public function store_kontrak()
	{
		if ($this->input->is_ajax_request()) {
			$array = array('.', ',');
			$data = [
				'pagu_id' => $_POST['uraian'],
				'nilai_kontrak' => str_replace($array, '', $_POST['nilai']),
				'no_kontrak' => $_POST['nomor'],
				'tgl_kontrak' => $_POST['tanggal'],
				'jangka' => $_POST['waktu'],
				'mulai' => $_POST['mulai'],
				'selesai' => $_POST['selesai'],
				'penyedia' => $_POST['penyedia'],
				'created_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Admin_model->store_data_kontrak($data);
			if ($simpan) {
				$ajax = ['status' => 'sukses', 'pesan' => 'Data kontrak berhasil disimpan'];
			} else {
				$ajax = ['status' => 'gagal', 'pesan' => 'Data kontrak gagal disimpan'];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function ambil_kontrak()
	{
		$id = $_POST['id'];
		$cek = $this->Admin_model->ambil_data_kontrak_pagu($id)->row_array();
		$data = [
			'kontrak' => $cek['kontrak'],
			'pagu' => $cek['pagu'],
		];
		echo json_encode($data);
	}

	public function realisasi()
	{
		$data = [
			'title' => 'Admin - Realisasi',
			'breadcrumb' => 'Realisasi',
			'kontrak' => $this->Admin_model->get_kontrak_data()->result_array()
		];

		$this->template->load('template/master', 'admin/realisasi', $data, false);
	}

	public function fisik()
	{
		$data = [
			'title' => 'Admin - Realisasi Fisik',
			'breadcrumb' => 'Realisasi Fisik',
			'kontrak' => $this->Admin_model->get_kontrak_data()->result_array()
		];

		$this->template->load('template/master', 'admin/fisik', $data, false);
	}

	public function sektor()
	{
		$data = [
			'title' => 'Sektor',
			'breadcrumb' => 'Sektor',
			'sektor' => $this->Admin_model->get_sektor_data()->result()
		];

		$this->template->load('template/master', 'admin/sektor', $data, false);
	}

	public function add_sektor()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nama_sektor', 'Nama Sektor', 'trim|required|min_length[2]|is_unique[sektor.nama_sektor]');

			if ($this->form_validation->run() == FALSE) {
				$ajax = ['status' => 'error', 'pesan' => form_error('nama_sektor')];
			} else {
				$data = [
					'nama_sektor' => htmlspecialchars($this->input->post('nama_sektor', true)),
					'created_at' => date('Y-m-d H:i:s')
				];
				$simpan = $this->Admin_model->store_sektor($data);
				if ($simpan) {
					$ajax = ['status' => 'sukses', 'pesan' => 'Data berhasil disimpan'];
				} else {
					$ajax = ['status' => 'gagal', 'pesan' => 'Data gagal disimpan'];
				}
			}
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function delete_sektor()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id', true);
			$hapus = $this->Admin_model->delete_sektor($id);
			if ($hapus) {
				$ajax = ['status' => 'sukses', 'pesan' => 'Data sektor berhasil dihapus'];
			} else {
				$ajax = ['status' => 'error', 'pesan' => 'Data sektor gagal dihapus'];
			}
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function divisi()
	{
		$data = [
			'title' => 'e-Mon | Divisi',
			'breadcrumb' => 'Divisi',
			'divisi' => $this->Admin_model->get_divisi()->result_array(),
			'sektor' => $this->Admin_model->get_sektor_data()->result()
		];

		$this->template->load('template/master', 'admin/divisi', $data, false);
	}

	public function add_divisi()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nama', 'Nama Divisi', 'trim|required|min_length[3]');

			if ($this->form_validation->run() == FALSE) {
				$ajax = ['status' => 'error', 'pesan' => form_error('nama')];
			} else {
				$data = [
					'nama_divisi' => htmlspecialchars($this->input->post('nama', true)),
					'sektor_id' => htmlspecialchars($this->input->post('sektor', true)),
					'tanggal' => date('Y-m-d H:i:s')
				];
				$simpan = $this->Admin_model->store_divisi($data);
				if ($simpan) {
					$ajax = ['status' => 'sukses', 'pesan' => 'Data berhasil disimpan'];
				} else {
					$ajax = ['status' => 'gagal', 'pesan' => 'Data gagal disimpan'];
				}
			}
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function seksi()
	{
		$data = [
			'title' => 'e-Mon | Seksi',
			'breadcrumb' => 'Seksi',
			'divisi' => $this->Admin_model->get_divisi()->result_array(),
			'seksi' => $this->Admin_model->get_seksi()->result_array()
		];

		$this->template->load('template/master', 'admin/seksi', $data, false);
	}

	public function add_seksi()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'divisi_id' => $this->input->post('divisi', true),
				'nama_seksi' => $this->input->post('nama', true),
				'tanggal' => date('Y-m-d H:i:s')
			];
			$simpan = $this->Admin_model->save_seksi_data($data);
			if ($simpan) {
				$ajax = ['status' => 'sukses', 'pesan' => 'Data berhasil disimpan'];
			} else {
				$ajax = ['status' => 'gagal', 'pesan' => 'Data gagal disimpan'];
			}
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function del_seksi()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id', true);
			$hapus = $this->Admin_model->delete_seksi($id);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function penugasan()
	{
		$data = [
			'title' => 'e-Mon | Penugasan',
			'breadcrumb' => 'Penugasan',
			'pekerjaan' => $this->Admin_model->get_pekerjaan()->result_array(),
			'konsultan' => $this->Admin_model->get_konsultan()->result_array(),
			'riwayat' => $this->Admin_model->get_riwayat()->result_array()
		];
		$this->template->load('template/master', 'admin/penugasan', $data, false);
	}

	public function add_penugasan()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'user_id' => $this->input->post('konsultan', true),
				'pekerjaan_id' => $this->input->post('pekerjaan', true),
				'tanggal' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Admin_model->store_penugasan($data);
			if ($simpan) :
				$ajax = ['status' => 'sukses', 'pesan' => 'Data penugasan berhasil disimpan'];
			else :
				$ajax = ['status' => 'gagal', 'pesan' => 'Data penugasan gagal disimpan'];
			endif;
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function hapus_penugasan()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id', true);
			$hapus = $this->Admin_model->delete_penugasan_data($id);
			if ($hapus) {
				$ajax = ['status' => 'sukses', 'pesan' => 'Data penugasan berhasil dihapus'];
			} else {
				$ajax = ['status' => 'gagal', 'pesan' => 'Data penugasan gagal dihapus'];
			}
			echo json_encode($ajax);
		} else {
			echo "No direct script access allowed";
		}
	}
}
