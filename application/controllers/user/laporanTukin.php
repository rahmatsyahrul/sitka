<?php
class laporanTukin extends CI_Controller
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
        $data['title'] = 'Filter Perhitungan Tukin';
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/filter_perhitungan_tukin', $data);
        $this->load->view('templates_user/footer');
    }

    public function cetak()
    {
        $data['title'] = 'Cetak Perhitungan Tukin Pegawai';
        $data['baris'] = 38;

        $bank = $this->input->post('bank');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulantahun = $bulan . $tahun;

        $data['cetak'] = $this->db->query("SELECT data_pegawai.*, data_kehadiran.*, kelas_jabatan.kelas, kelas_jabatan.tukin FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.nip=data_pegawai.nip INNER JOIN kelas_jabatan ON kelas_jabatan.kelas=data_pegawai.kelas_jabatan WHERE data_kehadiran.bulan='$bulantahun' AND data_pegawai.bank='$bank'")->result();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/tampil_perhitungan_tukin', $data);
        $this->load->view('templates_user/footer');
    }
}
