<?php

class kelasJabatan extends CI_Controller
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
        $data['title'] = 'Data Kelas Jabatan';
        $data['jabatan'] = $this->db->query("SELECT * FROM kelas_jabatan ORDER BY kelas DESC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/kelas_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambah_data()
    {
        $data['title'] = 'Tambah Data Kelas Jabatan';
        $data['jabatan'] = $this->penggajianModel->get_data('kelas_jabatan')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_kelas_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $kelas                = $this->input->post('kelas');
            $tukin       = $this->input->post('tukin');

            $data = array(
                'kelas' => $kelas,
                'tukin' => $tukin,

            );

            $this->penggajianModel->insert_data($data, 'kelas_jabatan');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil ditambahkan</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/kelasJabatan');
        }
    }

    public function update_data($id)
    {
        $where = array('id' => $id);
        $data['title'] = 'Ubah Kelas Jabatan';
        $data['pejabat'] = $this->penggajianModel->get_data('kelas_jabatan')->result();
        $data['pejabat'] = $this->db->query("SELECT * FROM kelas_jabatan WHERE id='$id'")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_kelas_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function ubah_data_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $id                 = $this->input->post('id');
            $kelas              = $this->input->post('kelas');
            $tukin              = $this->input->post('tukin');

            $data = array(
                'id' => $id,
                'kelas' => $kelas,
                'tukin' => $tukin,
            );

            $where = array(
                'id' => $id
            );

            $this->penggajianModel->update_data('kelas_jabatan', $data, $where);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil diupdate</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/kelasJabatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kelas', 'Kelas Jabatan', 'required');
        $this->form_validation->set_rules('tukin', 'Tukin/Jabatan', 'required');
    }

    public function delete_data($id)
    {

        $where = array('id' => $id);
        $this->penggajianModel->delete_data($where, 'kelas_jabatan');

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect('admin/kelasJabatan');
    }
}
