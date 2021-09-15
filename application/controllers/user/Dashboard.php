<?php
class Dashboard extends CI_Controller
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
        $data['title'] = 'Dashboard';
        $user = $this->db->query('SELECT * FROM user');
        $data['user'] = $user->num_rows();
        $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $data['pegawai'] = $pegawai->num_rows();
        $jabatan = $this->db->query("SELECT * FROM data_pejabat");
        $data['jabatan'] = $jabatan->num_rows();


        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates_user/footer');
    }
}
