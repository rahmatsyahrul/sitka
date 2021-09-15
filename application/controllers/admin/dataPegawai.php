<?php

class dataPegawai extends CI_Controller
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
        $data['title'] = 'Data Pegawai';
        $data['jabatan'] = $this->penggajianModel->get_data('data_pegawai')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_pegawai', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambah_data()
    {
        $data['title'] = 'Tambah Data Pegawai';
        $data['jabatan'] = $this->penggajianModel->get_data('data_pegawai')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_data_pegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();
        $this->load->view('admin/fungsi.php');
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $pangkat            = $this->input->post('pangkat');
            $nip                = $this->input->post('nip');
            $npwp               = $this->input->post('npwp');
            $status             = $this->input->post('status');
            $statuswp           = $this->input->post('statuswp');
            $no_sk              = $this->input->post('no_sk');
            $tgl_sk             = $this->input->post('tgl_sk');
            $nama_jabatan       = $this->input->post('nama_jabatan');
            $kelas_jabatan      = $this->input->post('kelas_jabatan');
            $bank               = $this->input->post('bank');
            $rekening           = $this->input->post('rekening');
            $gaji               = $this->input->post('gaji');
            $tpg               = $this->input->post('tpg');

            // pkp
            $jml_tukin = $this->db->get_where('kelas_jabatan', ['kelas' => $kelas_jabatan])->row();
            $jml_ptkp = $this->db->get_where('data_ptkp', ['golongan' => $statuswp])->row();
            $tukin              = $jml_tukin->tukin;
            $ptkp               = $jml_ptkp->tarif;
            $pkp                = ($gaji * 12) + ($tukin * 12) - ($ptkp);

            // tunjangan Pajak Tukin
            $pajaktukin = pajak($pkp);
            $tp_tukin =  $pkp * ($pajaktukin / 100) / 12;

            $data = array(
                'nama_pegawai' => $nama_pegawai,
                'pangkat' => $pangkat,
                'nip' => $nip,
                'npwp' => $npwp,
                'status' => $status,
                'statuswp' => $statuswp,
                'no_sk' => $no_sk,
                'tgl_sk' => $tgl_sk,
                'nama_jabatan' => $nama_jabatan,
                'kelas_jabatan' => $kelas_jabatan,
                'bank' => $bank,
                'rekening' => $rekening,
                'gaji' => $gaji,
                'tpg' => $tpg,
                'pkp' => $pkp,
                'tptukin' => $tp_tukin,
            );

            $this->penggajianModel->insert_data($data, 'data_pegawai');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil ditambahkan</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPegawai');
        }
    }

    public function update_data($id)
    {
        $where = array('id' => $id);
        $data['title'] = 'Ubah Data Pegawai';
        $data['pejabat'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $data['pejabat'] = $this->db->query("SELECT * FROM data_pegawai WHERE id='$id'")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_pegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();
        $this->load->view('admin/fungsi.php');
        if ($this->form_validation->run() == FALSE) {
            var_dump($this->form_validation);
            die;
            $this->tambah_data();
        } else {
            $id                 = $this->input->post('id');
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $pangkat            = $this->input->post('pangkat');
            $nip                = $this->input->post('nip');
            $npwp               = $this->input->post('npwp');
            $status             = $this->input->post('status');
            $statuswp           = $this->input->post('statuswp');
            $no_sk              = $this->input->post('no_sk');
            $tgl_sk             = $this->input->post('tgl_sk');
            $nama_jabatan       = $this->input->post('nama_jabatan');
            $kelas_jabatan      = $this->input->post('kelas_jabatan');
            $bank               = $this->input->post('bank');
            $rekening           = $this->input->post('rekening');
            $gaji               = $this->input->post('gaji');
            $tpg                = $this->input->post('tpg');

            // pkp
            $jml_tukin = $this->db->get_where('kelas_jabatan', ['kelas' => $kelas_jabatan])->row();
            $jml_ptkp = $this->db->get_where('data_ptkp', ['golongan' => $statuswp])->row();
            $tukin              = $jml_tukin->tukin;
            $ptkp               = $jml_ptkp->tarif;
            $pkp                = ($gaji * 12) + ($tukin * 12) - ($ptkp);

            // tunjangan Pajak Tukin
            $pajaktukin = pajak($pkp);
            $tp_tukin =  $pkp * ($pajaktukin / 100) / 12;


            $data = array(
                'id' => $id,
                'nama_pegawai' => $nama_pegawai,
                'pangkat' => $pangkat,
                'nip' => $nip,
                'npwp' => $npwp,
                'status' => $status,
                'statuswp' => $statuswp,
                'no_sk' => $no_sk,
                'tgl_sk' => $tgl_sk,
                'nama_jabatan' => $nama_jabatan,
                'kelas_jabatan' => $kelas_jabatan,
                'bank' => $bank,
                'rekening' => $rekening,
                'gaji' => $gaji,
                'tpg' => $tpg,
                'pkp' => $pkp,
                'tptukin' => $tp_tukin,
            );

            $where = array(
                'id' => $id
            );

            $this->penggajianModel->update_data('data_pegawai', $data, $where);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data berhasil diupdate</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPegawai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('npwp', 'NPWP', 'required');
        $this->form_validation->set_rules('status', 'Status Pegawai', 'required');
        $this->form_validation->set_rules('statuswp', 'Status Wajib Pajak', 'required');
        $this->form_validation->set_rules('no_sk', 'Nomor SK', 'required');
        $this->form_validation->set_rules('tgl_sk', 'Tanggal SK', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('kelas_jabatan', 'Kelas Jabatan', 'required');
        $this->form_validation->set_rules('bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('rekening', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('gaji', 'Gaji Bersih', 'required');
    }

    public function delete_data($id)
    {

        $where = array('id' => $id);
        $this->penggajianModel->delete_data($where, 'data_pegawai');

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect('admin/dataPegawai');
    }
}
