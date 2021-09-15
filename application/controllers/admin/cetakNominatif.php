<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cetakNominatif extends CI_Controller
{
    public function index()
    {

        $bank = $this->input->post('bank');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulantahun = $bulan . $tahun;

        $this->load->library('pdf');

        $data['title'] = 'Cetak Daftar Nominatif';
        $data['baris'] = 38;
        $data['jabatan'] = $this->db->query("SELECT * FROM data_pejabat WHERE jabatan ='PPK'")->result();
        $data['konfigurasi'] = $this->db->query("SELECT * FROM konfigurasi WHERE nomor =''")->result();

        $data['cetak'] = $this->db->query("SELECT data_pegawai.*, data_kehadiran.*, kelas_jabatan.kelas, kelas_jabatan.tukin, data_ptkp.tarif FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.nip=data_pegawai.nip INNER JOIN kelas_jabatan ON kelas_jabatan.kelas=data_pegawai.kelas_jabatan INNER JOIN data_ptkp ON data_ptkp.golongan=data_pegawai.statuswp WHERE data_kehadiran.bulan='$bulantahun' AND data_pegawai.bank='$bank'")->result();

        $this->pdf->setPaper('Folio', 'landscape');
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('admin/cetak_daftar_nominatif', $data);
    }
}
