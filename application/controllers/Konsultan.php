<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konsultan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = [
            'title' => 'Home',
            'breadcrumb' => '',
            'pekerjaan' => $this->Konsultan_model->get_penugasan($_SESSION['id'])->result_array()
        ];

        $this->template->load('template/master', 'konsultan/home', $data, false);
    }

    public function rab()
    {
        // ambil sektor
        $sektor = $this->Konsultan_model->get_scope_sektor($_SESSION['id'])->row();
        $data = [
            'title' => 'RAB',
            'breadcrumb' => 'RAB',
            'paket' => $this->Konsultan_model->get_paket_data($_SESSION['id']),
            'rab' => $this->Konsultan_model->get_rab_data($_SESSION['id'], $sektor->sektor_id),
            'header' => $this->Konsultan_model->get_header_tabel($_SESSION['id'])->result(),
            'cabang' => $this->Konsultan_model->get_cabang_seksi($_SESSION['id'], $sektor->sektor_id)->result(),
            'jumlah' => $this->Konsultan_model->get_total_harga($_SESSION['id'])->result(),
            'total' => $this->Konsultan_model->get_total($_SESSION['id'])->row()
        ];

        // print_r($data['cabang']);
        // die();

        $pekerjaan = $this->Konsultan_model->get_penugasan($_SESSION['id'])->row_array();
        $sektor = $pekerjaan['sektor_id'];
        $data['pekerjaan'] = $pekerjaan;
        $data['divisi'] = $this->Konsultan_model->get_divisi($sektor)->result_array();

        $this->template->load('template/master', 'konsultan/rab', $data, false);
    }

    public function get_nama_seksi()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id', true);
            $data = $this->Konsultan_model->get_list_lain($id)->row();
            $nama_seksi = $data->nama_seksi;
            echo json_encode($nama_seksi);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function add_rab()
    {
        if ($this->input->is_ajax_request()) {
            $harga_satuan = str_replace(".", "", $this->input->post('harga', true));
            $volume = str_replace(".", "", $this->input->post('volume', true));
            $jumlah = str_replace(".", "", $this->input->post('jumlah', true));
            $bobot = str_replace(".", "", $this->input->post('bobot', true));
            $anak_uraian = $_POST['anak_uraian'];
            if ($anak_uraian == 1) {
                $data = [
                    'konsultan_id' => $_SESSION['id'],
                    'pekerjaan_id' => $this->input->post('pekerjaan', true),
                    'divisi_id' => $this->input->post('jenis', true),
                    'seksi_id' => $this->input->post('uraian', true),
                    'seksi_lain' => $this->input->post('seksi_lain', true) ?? NULL,
                    'cabang_seksi_lain' => $this->input->post('input_anak_uraian', true),
                    'volume' => str_replace(',', '.', $volume),
                    'satuan' => $this->input->post('satuan', true),
                    'harga_satuan' => str_replace(',', '.', $harga_satuan),
                    'jumlah' => str_replace(',', '.', $jumlah),
                    'bobot' => str_replace(',', '.', $bobot),
                    'tanggal' => date('Y-m-d H:i:s')
                ];
            } else {
                $data = [
                    'konsultan_id' => $_SESSION['id'],
                    'pekerjaan_id' => $this->input->post('pekerjaan', true),
                    'divisi_id' => $this->input->post('jenis', true),
                    'seksi_id' => $this->input->post('uraian', true),
                    'seksi_lain' => $this->input->post('seksi_lain', true) ?? NULL,
                    'cabang_seksi_lain' => NULL,
                    'volume' => str_replace(',', '.', $volume),
                    'satuan' => $this->input->post('satuan', true),
                    'harga_satuan' => str_replace(',', '.', $harga_satuan),
                    'jumlah' => str_replace(',', '.', $jumlah),
                    'bobot' => $this->input->post('bobot', true),
                    'tanggal' => date('Y-m-d H:i:s')
                ];
            }

            $simpan = $this->Konsultan_model->store_rab($data);
            if ($simpan) :
                $ajax = ['status' => 'sukses', 'pesan' => 'Data RAB berhasil disimpan'];
            else :
                $ajax = ['status' => 'gagal', 'pesan' => 'Data RAB gagal disimpan'];
            endif;
            echo json_encode($ajax);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function hapus_rab()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id', true);
            $hapus = $this->Konsultan_model->delete_rab_data($id);
            if ($hapus) {
                $ajax = ['title' => 'sukses', 'pesan' => 'Data RAB berhasil dihapus'];
            } else {
                $ajax = ['title' => 'gagal', 'pesan' => 'Data RAB gagal dihapus'];
            }
            echo json_encode($ajax);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function divisi_rab()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id', true);
            $data = $this->Konsultan_model->get_divisi_rab($id)->result_array();
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function seksi_rab()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id', true);
            $data = $this->Konsultan_model->get_seksi_rab($id)->result_array();
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function get_progres()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id', true);
            $data = [
                'header' => $this->Konsultan_model->get_header_rab($_SESSION['id'])->result_array(),
                'progres' => $this->Konsultan_model->get_progres_data($_SESSION['id'], $id)->result_array(),
                'jumlah' => $this->Konsultan_model->get_jumlah_progres_by($_SESSION['id'], $id)->result_array(),
                'total' => $this->Konsultan_model->get_total_progres_by($_SESSION['id'], $id)->row_array(),
            ];
            // var_dump($data);
            // die();
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function progres()
    {
        // ambil sektor
        $sektor = $this->Konsultan_model->get_scope_sektor($_SESSION['id'])->row();
        $data = [
            'title' => 'Progress Report',
            'breadcrumb' => 'Progress Report',
            'divisi' => $this->Konsultan_model->get_divisi_progres()->result_array(),
            'pekerjaan' => $this->Konsultan_model->get_rab_awal($_SESSION['id'])->result(),
            'rab' => $this->Konsultan_model->get_rab_data($_SESSION['id'], $sektor->sektor_id),
            // 'header' => $this->Konsultan_model->get_header_rab($_SESSION['id'])->result(),
            // 'progres' => $this->Konsultan_model->get_progres_data($_SESSION['id'])->result()
        ];

        $this->template->load('template/master', 'konsultan/progres', $data, false);
    }

    public function get_seksi()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id', true);
            $datas = $this->Konsultan_model->get_seksi($id)->result_array();
            echo json_encode($datas);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function get_rab_id()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id', true);
            $idp = $this->input->post('idp', true);
            $seksi = $this->input->post('seksi', true);
            $cek = $this->Konsultan_model->get_data_rab_id($id, $idp, $seksi)->row();
            echo json_encode($cek);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function ambil_progres()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id', true);
            $bulan = $this->input->post('bulan', true);
            $b = $bulan - 1;
            $result = $this->Konsultan_model->get_old_progres($id, $b);
            if ($result->num_rows() > 0) {
                $cek = $result->row();
                $data = [
                    'vol' => $cek->vol_total,
                    'harga' => $cek->harga_total,
                    'bobot' => $cek->bobot_total
                ];
            } else {
                $data = [
                    'vol' => 0,
                    'harga' => 0,
                    'bobot' => 0
                ];
            }
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function add_progress()
    {
        if ($this->input->is_ajax_request()) {
            $harga = str_replace('.', '', $this->input->post('jumlah', true));
            $bobot = str_replace(',', '.', $this->input->post('bobot', true));
            $vol_sebelum = $this->input->post('vol_sebelum', true) == '' ? 0 : $this->input->post('vol_sebelum', true);
            $harga_sebelum = $this->input->post('harga_sebelum', true) == '' ? 0 : $this->input->post('harga_sebelum', true);
            $bobot_sebelum = $this->input->post('bobot_sebelum', true) == '' ? 0 : $this->input->post('bobot_sebelum', true);
            $vol_skrg = str_replace(',', '.', $this->input->post('volume', true));
            $harga_skrg = str_replace(',', '.', $harga);
            $vol_tot = $vol_sebelum + $vol_skrg;
            $harga_tot = $harga_sebelum + $harga_skrg;
            $bobot_tot = $bobot_sebelum + $bobot;
            $data = [
                'konsultan_id' => $_SESSION['id'],
                'rab_id' => $this->input->post('rab_id', true),
                'bulan' => $this->input->post('bulan', true),
                'bulan' => $this->input->post('bulan', true),
                'vol_sebelum' => $vol_sebelum,
                'jlh_harga_sebelum' => $harga_sebelum,
                'bobot_sebelum' => $bobot_sebelum,
                'vol_sekarang' => $vol_skrg,
                'jlh_harga_sekarang' => $harga_skrg,
                'bobot_sekarang' => $bobot,
                'vol_total' => $vol_tot,
                'harga_total' => $harga_tot,
                'bobot_total' => $bobot_tot,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $simpan = $this->Konsultan_model->store_progress($data);
            if ($simpan) {
                $ajax = ['status' => 'sukses', 'pesan' => 'Data progress berhasil disimpan'];
            } else {
                $ajax = ['status' => 'gagal', 'pesan' => 'Data progress gagal disimpan'];
            }
            echo json_encode($ajax);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function adendum()
    {
        $data = ['title' => 'Adendum', 'breadcrumb' => 'Adendum'];
        // ambil data sektor
        $sektor = $this->Konsultan_model->get_scope_sektor($_SESSION['id'])->row();
        $ids = $sektor->sektor_id;
        // ambil data rab berdasarkan sektor
        $data['rab_data'] = $this->Konsultan_model->get_rab_data_sektor($ids, get_id_pekerjaan())->result();
        $data['adendum'] = $this->Konsultan_model->get_adendum_data($_SESSION['id'])->result();
        // print_r($data['adendum']);
        // die();
        $this->template->load('template/master', 'konsultan/adendum', $data, false);
    }

    public function get_rab_adendum()
    {
        if ($this->input->is_ajax_request()) {
            $id = $_POST['id'];
            // var_dump($id);
            // die();
            $data = $this->Konsultan_model->get_data_rab_adendum($id)->row();
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }

    public function store_adendum()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('rab_id', 'Uraian', 'trim|required');
            $this->form_validation->set_rules('vol_baru', 'Volume', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $ajax = ['status' => 'error', 'pesan' => validation_errors()];
            } else {
                $id_rab = htmlspecialchars($this->input->post('rab_id', true));
                $data_rab = [
                    'volume' => str_replace(',', '.', htmlspecialchars($this->input->post('vol_baru', true))),
                    'jumlah' => str_replace('.', '', htmlspecialchars($this->input->post('harga_adendum', true))),
                    'status' => 1
                ];
                $data = [
                    'rab_id' => $id_rab,
                    'volume_lama' => htmlspecialchars($this->input->post('vol_lama', true)),
                    'volume_baru' => str_replace(',', '.', htmlspecialchars($this->input->post('vol_baru', true))),
                    'harga_lama' => htmlspecialchars($this->input->post('jumlah_lama', true)),
                    'harga_baru' => str_replace('.', '', htmlspecialchars($this->input->post('harga_adendum', true))),
                    'bobot_baru' => str_replace(',', '.', htmlspecialchars($this->input->post('bobot_baru', true))),
                    'konsultan_id' => $_SESSION['id'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ];

                $simpan = $this->Konsultan_model->store_adendum_data($id_rab, $data_rab, $data);
                if ($simpan) {
                    $ajax = ['status' => 'sukses', 'pesan' => 'Data adendum berhasil disimpan'];
                } else {
                    $ajax = ['status' => 'gagal', 'pesan' => 'Data adendum gagal disimpan'];
                }
            }
            echo json_encode($ajax);
        } else {
            echo "No direct script access allowed";
        }
    }
}

/* End of file Konsultan.php and path /application/controllers/Konsultan.php */
