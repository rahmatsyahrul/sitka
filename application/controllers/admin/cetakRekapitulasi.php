<?php



defined('BASEPATH') or exit('No direct script access allowed');

class cetakRekapitulasi extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/fungsi.php');

        $bank = $this->input->post('bank');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulantahun = $bulan . $tahun;

        $this->load->library('pdf');

        $data['title'] = 'Cetak Data Rekapitulasi';
        $data['jabatan'] = $this->db->query("SELECT * FROM data_pejabat WHERE jabatan ='BENDAHARA'")->result();
        $data['jabatan2'] = $this->db->query("SELECT * FROM data_pejabat WHERE jabatan ='PPK'")->result();
        $data['konfigurasi'] = $this->db->query("SELECT * FROM konfigurasi WHERE nomor =''")->result();

        $data['cetak'] = $this->db->query("SELECT data_pegawai.kelas_jabatan, count(data_pegawai.kelas_jabatan) AS jumlah FROM data_pegawai  WHERE data_pegawai.bank='$bank' GROUP BY data_pegawai.kelas_jabatan")->result();

        $data['tot_jml_penerima'] = 0;
        $data['tot_tukin'] = 0;
        $data['tot_tunjangan'] = 0;
        $data['tot_pajak'] = 0;
        $data['tot_bruto'] = 0;
        $data['tot_bruto'] = 0;

        foreach ($data['cetak'] as $key => $ct) {
            $data_jabatan = $this->db->get_where('kelas_jabatan', ['kelas' => $ct->kelas_jabatan])->row();
            $data['tukin'][$key] = $data_jabatan->tukin;
            $data['jml_tunjangan'][$key] = $data_jabatan->tukin * $ct->jumlah;

            $data_pegawai = $this->db->query("SELECT SUM(IF(kelas_jabatan = $data_jabatan->kelas, tptukin, FALSE)) AS tptukin
            FROM data_pegawai WHERE data_pegawai.bank='$bank'")->row();

            $data['pajak'][$key] = $data_pegawai->tptukin;

            $data['tot_tukin'] += $data['tukin'][$key];
            $data['tot_jml_penerima'] += $ct->jumlah;
            $data['tot_tunjangan'] += $data['jml_tunjangan'][$key];
            $data['tot_pajak'] += $data['pajak'][$key];
            $data['tot_bruto'] += $data['jml_tunjangan'][$key] + $data['pajak'][$key];
        }

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('admin/cetak_data_rekapitulasi', $data);
    }
}
