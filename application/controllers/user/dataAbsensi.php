<?php
class dataAbsensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Anda belum login</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = 'Perhitungan Tukin Pegawai';

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, data_pegawai.nip, data_pegawai.nama_pegawai
        FROM data_kehadiran
        INNER JOIN data_pegawai ON data_kehadiran.nip = data_pegawai.nip
        WHERE data_kehadiran.bulan = '$bulantahun'
        ORDER BY data_pegawai.nama_pegawai ASC
        ")->result();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/data_absensi', $data);
        $this->load->view('templates_user/footer');
    }

    public function inputAbsensi()
    {

        if ($this->input->post('submit', TRUE) == 'submit') {
            $post = $this->input->post();
            foreach ($post['bulan'] as $key => $value) {
                if ($post['bulan'][$key] != '' || $post['nip'][$key] != '') {
                    $simpan[] = array(
                        'bulan'                 => $post['bulan'][$key],
                        'nip'                   => $post['nip'][$key],
                        'nama_pegawai'          => $post['nama_pegawai'][$key],
                        'tmk'                   => $post['tmk'][$key],
                        'tbtt'                  => $post['tbtt'][$key],
                        'tl_1'                  => $post['tl_1'][$key],
                        'tl_2'                  => $post['tl_2'][$key],
                        'tl_3'                  => $post['tl_3'][$key],
                        'tl_4'                  => $post['tl_4'][$key],
                        'psw_1'                 => $post['psw_1'][$key],
                        'psw_2'                 => $post['psw_2'][$key],
                        'psw_3'                 => $post['psw_3'][$key],
                        'psw_4'                 => $post['psw_4'][$key],
                    );
                }
            }

            $this->penggajianModel->insert_batch('data_kehadiran', $simpan);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil ditambahkan</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );

            $bulan = $post['bulan'];
            $bulantahun = $bulan['1'];

            $bulan = substr($bulantahun, 0, 2);
            $tahun = substr($bulantahun, 2, 4);

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                    <strong>Data berhasil disimpan</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );

            redirect('user/dataAbsensi?bulan=' . $bulan . '&tahun=' . $tahun);
        }

        $data['title'] = 'Form Input Absensi';

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $data['input_absensi'] = $this->db->query("SELECT * FROM data_pegawai 
        WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan='$bulantahun'
        AND data_pegawai.nip=data_kehadiran.nip) ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/input_absensi', $data);
        $this->load->view('templates_user/footer');
    }

    public function delete_data($bulantahun)
    {

        $where = array('bulan' => $bulantahun);
        $this->penggajianModel->delete_data($where, 'data_kehadiran');
        $bulan = substr($bulantahun, 0, 2);
        $tahun = substr($bulantahun, 2, 4);


        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect('user/dataAbsensi?bulan=' . $bulan . '&tahun=' . $tahun);
    }
}
