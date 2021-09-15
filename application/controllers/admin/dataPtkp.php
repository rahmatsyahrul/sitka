<?php
class dataPtkp extends CI_Controller
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
        $data['title'] = 'Data PTKP per Tahun';
        $data['ptkp'] = $this->db->query("SELECT * FROM data_ptkp ORDER BY golongan DESC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_ptkp', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = 'Tambah Data PTKP';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_data_ptkp', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $golongan   = $this->input->post('golongan');
            $tarif     = $this->input->post('tarif');

            $data = array(
                'golongan' => $golongan,
                'tarif' => $tarif,
            );

            $this->penggajianModel->insert_data($data, 'data_ptkp');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil ditambahkan</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPtkp');
        }
    }

    public function update_data($id)
    {
        $where = array('id' => $id);
        $data['ptkp'] = $this->db->query("SELECT * FROM data_ptkp WHERE id='$id'")->result();
        $data['title'] = 'Ubah Data PTKP';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_ptkp', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $id             = $this->input->post('id');
            $golongan           = $this->input->post('golongan');
            $tarif       = $this->input->post('tarif');

            $data = array(
                'golongan' => $golongan,
                'tarif' => $tarif,
            );

            $where = array(
                'id' => $id
            );

            $this->penggajianModel->update_data('data_ptkp', $data, $where);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil diupdate</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPtkp');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('golongan', 'golongan ptkp', 'required');
        $this->form_validation->set_rules('tarif', 'tarif ptkp', 'required');
    }

    public function delete_data($id)
    {

        $where = array('id' => $id);
        $this->penggajianModel->delete_data($where, 'data_ptkp');

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect('admin/dataPtkp');
    }
}
