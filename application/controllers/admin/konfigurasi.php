<?php
class konfigurasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '1') {
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
        $data['title'] = 'Konfigurasi Awal';

        $data['konf'] = $this->db->query("SELECT * FROM konfigurasi WHERE nomor = ''
        ")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/konfigurasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data($id)
    {
        $where = array('id' => $id);
        $data['title'] = 'Ubah Data Konfigurasi';
        $data['konf'] = $this->penggajianModel->get_data('konfigurasi')->result();
        $data['konf'] = $this->db->query("SELECT * FROM konfigurasi WHERE id='$id'")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_konfigurasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function ubah_data_aksi()
    {
        $id                 = $this->input->post('id');
        $satker             = $this->input->post('satker');
        $alamat             = $this->input->post('alamat');

        $data = array(
            'id' => $id,
            'satker' => $satker,
            'alamat' => $alamat,
        );

        $where = array(
            'id' => $id
        );

        $this->penggajianModel->update_data('konfigurasi', $data, $where);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil diubah</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
        );
        redirect('admin/konfigurasi');
    }
}
