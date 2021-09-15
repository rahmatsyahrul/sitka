<?php
class dataUser extends CI_Controller
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
        $data['title'] = 'Data User';
        $data['user'] = $this->penggajianModel->get_data('user')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = 'Tambah User';
        $data['user'] = $this->penggajianModel->get_data('user')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_data_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi()
    {
        $nama_pegawai       = $this->input->post('nama_pegawai');
        $user            = $this->input->post('user');
        $password               = md5($this->input->post('pass'));
        $hak_akses            = $this->input->post('hak_akses');

        $data = array(
            'nama_pegawai' => $nama_pegawai,
            'username' => $user,
            'password' => $password,
            'hak_akses' => $hak_akses,
        );

        $this->penggajianModel->insert_data($data, 'user');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil ditambahkan</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
        );
        redirect('admin/dataUser');
    }

    public function update_data($id)
    {
        $where = array('id' => $id);
        $data['title'] = 'Ubah Data User';
        $data['user'] = $this->penggajianModel->get_data('user')->result();
        $data['user'] = $this->db->query("SELECT * FROM user WHERE id='$id'")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data_aksi()
    {
        $id                 = $this->input->post('id');
        $nama_pegawai       = $this->input->post('nama_pegawai');
        $user            = $this->input->post('username');
        $password               = md5($this->input->post('pass'));
        $hak_akses            = $this->input->post('hak_akses');

        $data = array(
            'id' => $id,
            'nama_pegawai' => $nama_pegawai,
            'username' => $user,
            'password' => $password,
            'hak_akses' => $hak_akses,
        );

        $where = array(
            'id' => $id
        );

        $this->penggajianModel->update_data('user', $data, $where);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil diupdate</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
        );
        redirect('admin/dataUser');
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
            redirect('ubahPassword');
        } else {
            $data   = array('password' => md5($passBaru));
            $id     = array('id_pegawai' => $this->session->userdata('id_pegawai'));

            $this->penggajianModel->update_data('data_pegawai', $data, $id);
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
