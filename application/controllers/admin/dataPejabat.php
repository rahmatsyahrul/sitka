<?php

class dataPejabat extends CI_Controller
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
        $data['title'] = 'Data Pejabat';
        $data['jabatan'] = $this->penggajianModel->get_data('data_pejabat')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_pejabat', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambah_data()
    {
        $data['title'] = 'Tambah Data Pejabat';
        $data['jabatan'] = $this->penggajianModel->get_data('data_pejabat')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_data_pejabat', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $nip                = $this->input->post('nip');
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $jabatan            = $this->input->post('jabatan');

            $data = array(
                'nip' => $nip,
                'nama_pegawai' => $nama_pegawai,
                'jabatan' => $jabatan,
            );

            $this->penggajianModel->insert_data($data, 'data_pejabat');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil ditambahkan</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPejabat');
        }
    }

    public function update_data($id)
    {
        $where = array('id' => $id);
        $data['title'] = 'Ubah Data Pejabat';
        $data['pejabat'] = $this->penggajianModel->get_data('data_pejabat')->result();
        $data['pejabat'] = $this->db->query("SELECT * FROM data_pejabat WHERE id='$id'")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_pejabat', $data);
        $this->load->view('templates_admin/footer');
    }

    public function ubah_data_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $id                 = $this->input->post('id');
            $nip                = $this->input->post('nip');
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $jabatan            = $this->input->post('jabatan');

            $data = array(
                'id' => $id,
                'nip' => $nip,
                'nama_pegawai' => $nama_pegawai,
                'jabatan' => $jabatan,
            );

            $where = array(
                'id' => $id
            );

            $this->penggajianModel->update_data('data_pejabat', $data, $where);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil diupdate</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPejabat');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pejabat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    }

    public function delete_data($id)
    {

        $where = array('id' => $id);
        $this->penggajianModel->delete_data($where, 'data_Pejabat');

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect('admin/dataPejabat');
    }
}
