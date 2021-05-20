<?php defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login(); // this is a function in login_helper
    }

    public function get_all_posyandu() //balita
    {
        $data['title'] = 'Posyandu';
        //$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
        $data['posyandu'] = $this->Model_posyandu->get_all_posyandu();
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['panitia_data_login'] = $this->Model_login->panitia_session();
        $data['peserta_data_login'] = $this->Model_login->panitia_session();
        $data['total_admin'] = $this->Model_user->count_admin_user();
        $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
        $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita        
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
        // $data['hitung_coba'] = $this->Model_user->hitung_coba();//nyo controller 
        $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
        $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
        $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
        $data['total_desa'] = $this->Model_desa->count_all_desa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_posyandu', $data);
        $this->load->view('templates/footer');
    }

    public function get_posyandu_desa() //balita
    {
        $data['title'] = 'Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['posyandu_desa'] = $this->Model_posyandu->get_all_posyandu_balita_desa();
        $data['panitia_data_login'] = $this->Model_login->panitia_session();
        $data['peserta_data_login'] = $this->Model_login->panitia_session();
        $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
        $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil
        $data['total_admin'] = $this->Model_user->count_admin_user();
        $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
        $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
        // $data['hitung_coba'] = $this->Model_user->hitung_coba();//nyo controller 
        $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
        $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
        $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
        $data['total_desa'] = $this->Model_desa->count_all_desa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_posyandu_desa', $data);
        $this->load->view('templates/footer');
    }

    public function add_posyandu()
    {
        $this->form_validation->set_rules('id_user', 'Id_user', 'required|trim', [
            'required' => 'User harus dipilih..!'
        ]);
        $this->form_validation->set_rules('berat_badan', 'Berat_badan', 'required|trim', [
            'required' => 'Berat badan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('tinggi_badan', 'Tinggi_badan', 'required|trim', [
            'required' => 'Tinggi badan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', [
            'required' => 'Umur tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('PSG', 'Psg', 'required|trim', [
            'required' => 'PSG tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim', [
            'required' => 'Bulan harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Posyandu';
            //$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
            $data['posyandu'] = $this->Model_posyandu->get_all_posyandu();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['panitia_data_login'] = $this->Model_login->panitia_session();
            $data['peserta_data_login'] = $this->Model_login->panitia_session();
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
            $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil
            // $data['hitung_coba'] = $this->Model_user->hitung_coba();//nyo controller 
            $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
            $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['user_peserta_desa'] = $this->Model_user->get_all_user_peserta_desa();
            $data['user_peserta'] = $this->Model_user->get_all_user_peserta();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_add_posyandu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'berat_badan' => htmlspecialchars($this->input->post('berat_badan', true)),
                'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
                'PSG' => htmlspecialchars($this->input->post('PSG', true)),
                'bulan' => htmlspecialchars($this->input->post('bulan', true)),
                'tahun' => date('Y'),
            ];
            $this->Model_posyandu->add_posyandu($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
            if ($this->session->userdata('level') == "desa" || $this->session->userdata('level') == "panitia") {
                redirect('posyandu-desa');
            } else {
                redirect('posyandu');
            }
        }
    }

    public function edit_posyandu($id_posyandu)
    {
        $this->form_validation->set_rules('id_user', 'Id_user', 'required|trim', [
            'required' => 'User harus dipilih..!'
        ]);
        $this->form_validation->set_rules('berat_badan', 'Berat_badan', 'required|trim', [
            'required' => 'Berat badan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('tinggi_badan', 'Tinggi_badan', 'required|trim', [
            'required' => 'Tinggi badan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('PSG', 'Psg', 'required|trim', [
            'required' => 'PSG tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim', [
            'required' => 'Bulan harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Posyandu';
            //$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
            $data['posyandu'] = $this->Model_posyandu->get_all_posyandu();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['panitia_data_login'] = $this->Model_login->panitia_session();
            $data['peserta_data_login'] = $this->Model_login->panitia_session();
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
            $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil
            // $data['hitung_coba'] = $this->Model_user->hitung_coba();//nyo controller 
            $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
            $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['user_peserta_desa'] = $this->Model_user->get_all_user_peserta_desa();
            $data['user_peserta'] = $this->Model_user->get_all_user_peserta();

            $data['posyandu_e'] = $this->Model_posyandu->get_posyandu_by_id($id_posyandu);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_edit_posyandu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_posyandu' => htmlspecialchars($this->input->post('id_posyandu', true)),
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'berat_badan' => htmlspecialchars($this->input->post('berat_badan', true)),
                'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', true)),
                'PSG' => htmlspecialchars($this->input->post('PSG', true)),
                'bulan' => htmlspecialchars($this->input->post('bulan', true)),
                'tahun' => date('Y'),
            ];
            $this->Model_posyandu->edit_posyandu($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            if ($this->session->userdata('level') == "desa" || $this->session->userdata('level') == "panitia") {
                redirect('posyandu-desa');
            } else {
                redirect('posyandu');
            }
        }
    }

    public function delete_posyandu($id_posyandu)
    {
        $this->Model_posyandu->delete_posyandu($id_posyandu);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        if ($this->session->userdata('level') == "desa" || $this->session->userdata('level') == "panitia") {
            redirect('posyandu-desa');
        } else {
            redirect('posyandu');
        }
    }

    public function rekap_balita_desa()
    {
        $data['title'] = 'Rekap Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_balita_desa'] = $this->Model_posyandu->rekap_balita_desa();
        $data['panitia_data_login'] = $this->Model_login->panitia_session();
        $data['peserta_data_login'] = $this->Model_login->panitia_session();
        $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
        $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil
        $data['total_admin'] = $this->Model_user->count_admin_user();
        $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
        $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
        // $data['hitung_coba'] = $this->Model_user->hitung_coba();//nyo controller 
        $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
        $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
        $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
        $data['total_desa'] = $this->Model_desa->count_all_desa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_rekap_balita_desa', $data);
        $this->load->view('templates/footer');
    }
}