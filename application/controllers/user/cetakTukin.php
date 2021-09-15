<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cetakTukin extends CI_Controller
{
    public function index()
    {

        $bank = $this->input->post('bank');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulantahun = $bulan . $tahun;

        $this->load->library('pdf');

        $data['title'] = 'Cetak Perhitungan Tukin Pegawai';
        $data['baris'] = 38;
        $data['jabatan'] = $this->db->query("SELECT * FROM data_pejabat WHERE jabatan ='PPTK'")->result();
        $data['konfigurasi'] = $this->db->query("SELECT * FROM konfigurasi WHERE nomor =''")->result();

        $data['cetak'] = $this->db->query("SELECT data_pegawai.*, data_kehadiran.*, kelas_jabatan.kelas, kelas_jabatan.tukin FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.nip=data_pegawai.nip INNER JOIN kelas_jabatan ON kelas_jabatan.kelas=data_pegawai.kelas_jabatan WHERE data_kehadiran.bulan='$bulantahun' AND data_pegawai.bank='$bank'")->result();

        $this->pdf->setPaper('Folio', 'landscape');
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('user/cetak_perhitungan_tukin', $data);
    }
}
