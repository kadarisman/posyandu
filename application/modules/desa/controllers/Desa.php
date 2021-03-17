 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Desa extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            check_login(); // this is a function in login_helper
        }
        //below the methods for managing the dosen table
        public function index()
        {
            $data['title'] = 'Semua Desa';
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['total_user'] = $this->Model_user->count_all_user();
            $data['all_user'] = $this->Model_user->get_all_user();
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_all_desa', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        }

        public function create_DB()
        {
            $this->form_validation->set_rules('nama_desa', 'Nama_desa', 'required|trim', [
                'required' => 'Nama Desa tidak boleh kosong..!'
            ]);

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Dashboard';
                $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $data['desa_data_login'] = $this->Model_login->desa_session();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('v_create_DB', $data);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                    'nama_desa' => htmlspecialchars($this->input->post('nama_desa', true)),
                    'created' => date('d-m-Y H:i:s')
                ];
                $this->Model_desa->create_DB($data);
                $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">Selamat! Database selesai. desa sduah siap !</div>');
                redirect('dashboard');
            }
        }
        public function add_dosen()
        {
            $this->form_validation->set_rules('NIDN', 'Nidn', 'required|trim|is_unique[dosen.NIDN]', [
                'is_unique' => 'Duplikat NIDN..!',
                'required' => 'NIDN tidak boleh kosong..!',
            ]);
            $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
                'required' => 'Kode Prodi tidak boleh kosong..!'
            ]);
            $this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required|trim', [
                'required' => 'Nama Dosen tidak boleh kosong..!'
            ]);
            $this->form_validation->set_rules('alamat_dosen', 'Alamat_dosen', 'required|trim', [
                'required' => 'Alamat Dosen tidak boleh kosong..!'
            ]);

            if ($this->form_validation->run() == false) {
                $errors = array(
                    'NIDN_error' => form_error('NIDN'),
                    'kd_prodi_error' => form_error('kd_prodi'),
                    'nama_dosen_error' => form_error('nama_dosen'),
                    'alamat_dosen_error' => form_error('alamat_dosen'),
                );
                echo json_encode(['error' => $errors]);
            } else {
                echo json_encode(['success' => 'Record added successfully.']);
                $data = [
                    'NIDN' => htmlspecialchars($this->input->post('NIDN', true)),
                    'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                    'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
                    'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
                    'status' => 1,
                    'foto' => 'default.jpg',
                    'created' => date('d-m-Y H:i:s')
                ];
                $this->Model_dosen->add_dosen($data, 'dosen');
                $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            }
        }

        public function edit_dosen()
        {
            $data = [
                'NIDN' => htmlspecialchars($this->input->post('NIDN_edit', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('selectProdi_edit', true)),
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen_edit', true)),
                'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen_edit', true)),
                'status' => htmlspecialchars($this->input->post('status_edit', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_dosen->edit_dosen($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Edit</div>');
            redirect('Dosen');
        }


        public function delete_dosen($id)
        {
            $this->Model_dosen->delete_dosen($id);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
            redirect('Dosen');
        }
        //end for managing the prodi table
    }