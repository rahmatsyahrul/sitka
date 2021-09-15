<?php
class ubahPassword extends CI_Controller
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
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->penggajianModel->get_data('user')->result();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/ubah_password', $data);
        $this->load->view('templates_user/footer');
    }

    public function upa()
    {
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        if ($passBaru != $ulangPass) {
            $this->session->set_flashdata(
                'pesan',
                '<p class="text-lowercase text-danger font-italic">*Password tidak cocok </p>'
            );
            redirect('user/ubahPassword');
        } else {
            $data   = array('password' => md5($passBaru));
            $username     = array('username' => $this->session->userdata('username'));

            $this->penggajianModel->update_data('user', $data, $username);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil diupdate</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('welcome');
        }
    }
}
