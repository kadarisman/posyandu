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
        $data['posyandu_balita'] = $this->Model_posyandu->get_all_posyandu_balita();
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
        $this->load->view('balita/v_posyandu', $data);
        $this->load->view('templates/footer');
    }

    public function get_all_posyandu_bumil() //balita
    {
        $data['title'] = 'Posyandu';
        //$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
        $data['posyandu_bumil'] = $this->Model_posyandu->get_all_posyandu_bumil();
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


        $data['cari_posyandu_bumil'] = $this->Model_posyandu->get_all_posyandu_bumil_group();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bumil/v_posyandu_bumil', $data);
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
        $this->load->view('balita/v_posyandu_desa', $data);
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
            'required' => 'Umur Balita harus dipilih..!'
        ]);
        $this->form_validation->set_rules('PSG', 'Psg', 'required|trim', [
            'required' => 'PSG tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('GKN', 'Gkn', 'required|trim', [
            'required' => 'GKN harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Posyandu';
            //$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
            //$data['posyandu'] = $this->Model_posyandu->get_all_posyandu();
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
            $data['user_peserta_desa_balita'] = $this->Model_user->get_all_user_peserta_desa_balita();
            $data['user_peserta_desa_bumil'] = $this->Model_user->get_all_user_peserta_desa_bumil();
            $data['user_peserta_balita'] = $this->Model_user->get_all_user_peserta_balita();
            $data['user_peserta_bumil'] = $this->Model_user->get_all_user_peserta_bumil();
            $data['total_desa'] = $this->Model_desa->count_all_desa();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('balita/v_add_posyandu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'berat_badan' => htmlspecialchars($this->input->post('berat_badan', true)),
                'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
                'PSG' => htmlspecialchars($this->input->post('PSG', true)),
                'GKN' => htmlspecialchars($this->input->post('GKN', true)),
                'bulan' =>  date('F'),
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
        $this->form_validation->set_rules('GKN', 'Gkn', 'required|trim', [
            'required' => 'GKN harus dipilih..!'
        ]);
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', [
            'required' => 'Umur tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Posyandu';
            //$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
            // $data['posyandu'] = $this->Model_posyandu->get_all_posyandu();
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
            $data['user_peserta_desa_balita'] = $this->Model_user->get_all_user_peserta_desa_balita();
            $data['user_peserta_desa_bumil'] = $this->Model_user->get_all_user_peserta_desa_bumil();
            $data['user_peserta_balita'] = $this->Model_user->get_all_user_peserta_balita();
            $data['user_peserta_bumil'] = $this->Model_user->get_all_user_peserta_bumil();


            $data['total_desa'] = $this->Model_desa->count_all_desa();

            $data['posyandu_e'] = $this->Model_posyandu->get_posyandu_by_id($id_posyandu);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('balita/v_edit_posyandu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_posyandu' => htmlspecialchars($this->input->post('id_posyandu', true)),
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'berat_badan' => htmlspecialchars($this->input->post('berat_badan', true)),
                'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', true)),
                'PSG' => htmlspecialchars($this->input->post('PSG', true)),
                'GKN' => htmlspecialchars($this->input->post('GKN', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
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

    public function delete_posyandu_bumil($id_posyandu)
    {
        $this->Model_posyandu->delete_posyandu($id_posyandu);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        if ($this->session->userdata('level') == "desa" || $this->session->userdata('level') == "panitia") {
            redirect('posyandu-desa-bumil');
        } else {
            redirect('posyandu-bumil');
        }
    }

    public function rekap_balita()
    {
        $data['title'] = 'Rekap Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_balita'] = $this->Model_posyandu->rekap_balita();
        //$data['rekap_balita_desa_januari'] = $this->Model_posyandu->rekap_balita_desa_group_januari();
        //$data['rekap_balita_desa_februari'] = $this->Model_posyandu->rekap_balita_desa_group_februari();
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


        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita        
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('balita/v_rekap_balita', $data);
        $this->load->view('templates/footer');
    }

    public function rekap_balita_desa()
    {
        $data['title'] = 'Rekap Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_balita_desa'] = $this->Model_posyandu->rekap_balita_desa();
        //$data['rekap_balita_desa_januari'] = $this->Model_posyandu->rekap_balita_desa_group_januari();
        //$data['rekap_balita_desa_februari'] = $this->Model_posyandu->rekap_balita_desa_group_februari();
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
        $this->load->view('balita/v_rekap_balita_desa', $data);
        $this->load->view('templates/footer');
    }

    public function filter_tahun_balita()
    {
        $data['title'] = 'Filter Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_balita'] = $this->Model_posyandu->rekap_balita();
        // $data['rekap_balita_desa_januari'] = $this->Model_posyandu->rekap_balita_desa_group_januari();
        // $data['rekap_balita_desa_februari'] = $this->Model_posyandu->rekap_balita_desa_group_februari();
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


        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita        
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil



        $tahun = $this->input->post('tahun', true);


        $data['filter_tahun1'] = $this->Model_posyandu->filter_tahun_balita($tahun);
        $data['th'] = $tahun;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('balita/v_filter_tahun_posyandu', $data);
        $this->load->view('templates/footer');
    }
    public function filter_tahun_balita_desa()
    {
        $data['title'] = 'Filter Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_balita_desa'] = $this->Model_posyandu->rekap_balita_desa();
        // $data['rekap_balita_desa_januari'] = $this->Model_posyandu->rekap_balita_desa_group_januari();
        // $data['rekap_balita_desa_februari'] = $this->Model_posyandu->rekap_balita_desa_group_februari();
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


        $tahun = $this->input->post('tahun', true);


        $data['filter_tahun1'] = $this->Model_posyandu->filter_tahun_balita_desa($tahun);
        $data['th'] = $tahun;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('balita/v_filter_tahun_posyandu_desa', $data);
        $this->load->view('templates/footer');
    }

    //bumil
    public function get_posyandu_bumil_desa() //balita
    {
        $data['title'] = 'Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['posyandu_bumil_desa'] = $this->Model_posyandu->get_all_posyandu_bumil_desa();
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


        $data['cari_posyandu_bumil_desa'] = $this->Model_posyandu->get_all_posyandu_bumil_desa_group();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bumil/v_posyandu_bumil_desa', $data);
        $this->load->view('templates/footer');
    }

    public function add_posyandu_bumil()
    {
        $this->form_validation->set_rules('id_user', 'Id_user', 'required|trim', [
            'required' => 'User harus dipilih..!'
        ]);
        $this->form_validation->set_rules('HPHT', 'Hpht', 'required|trim', [
            'required' => 'HPHT tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('TTP', 'Ttp', 'required|trim', [
            'required' => 'TTP tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', [
            'required' => 'Umur kandungan harus dipilih..!'
        ]);
        $this->form_validation->set_rules('hamil_ke', 'Hamil_ke', 'required|trim', [
            'required' => ' Hamil ke harus dipilih..!'
        ]);
        $this->form_validation->set_rules('berat_badan', 'Berat_badan', 'required|trim', [
            'required' => 'Berat badan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('tinggi_badan', 'Tinggi_badan', 'required|trim', [
            'required' => 'Tinggi badan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('HB', 'Hb', 'required|trim', [
            'required' => 'HB tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('kunjugan_ke', 'Kunjugan_ke', 'required|trim', [
            'required' => 'Kunjugan Ke, harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Posyandu';
            //$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
            //       $data['posyandu'] = $this->Model_posyandu->get_all_posyandu();
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
            $data['user_peserta_desa_balita'] = $this->Model_user->get_all_user_peserta_desa_balita();
            $data['user_peserta_desa_bumil'] = $this->Model_user->get_all_user_peserta_desa_bumil();
            $data['user_peserta_balita'] = $this->Model_user->get_all_user_peserta_balita();
            $data['user_peserta_bumil'] = $this->Model_user->get_all_user_peserta_bumil();

            $data['total_desa'] = $this->Model_desa->count_all_desa();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bumil/v_add_posyandu_bumil', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'HPHT' => htmlspecialchars($this->input->post('HPHT', true)),
                'TTP' => htmlspecialchars($this->input->post('TTP', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
                'hamil_ke' => htmlspecialchars($this->input->post('hamil_ke', true)),
                'berat_badan' => htmlspecialchars($this->input->post('berat_badan', true)),
                'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', true)),
                'HB' => htmlspecialchars($this->input->post('HB', true)),
                'kunjungan_ke' => htmlspecialchars($this->input->post('kunjungan_ke', true)),
                'bulan' =>  date('F'),
                'tahun' => date('Y'),
            ];
            $this->Model_posyandu->add_posyandu($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
            if ($this->session->userdata('level') == "desa" || $this->session->userdata('level') == "panitia") {
                redirect('posyandu-desa-bumil');
            } else {
                redirect('posyandu-bumil');
            }
        }
    }

    public function add_posyandu_bumil_lanjutan($id_posyandu)
    {
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', [
            'required' => 'Umur kandungan harus dipilih..!'
        ]);
        $this->form_validation->set_rules('berat_badan', 'Berat_badan', 'required|trim', [
            'required' => 'Berat badan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('kunjungan_ke', 'Kunjungan_ke', 'required|trim', [
            'required' => 'Kunjugan Ke, harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Posyandu Lanjutan';
            //$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
            //       $data['posyandu'] = $this->Model_posyandu->get_all_posyandu();
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
            $data['user_peserta_desa_balita'] = $this->Model_user->get_all_user_peserta_desa_balita();
            $data['user_peserta_desa_bumil'] = $this->Model_user->get_all_user_peserta_desa_bumil();
            $data['user_peserta_balita'] = $this->Model_user->get_all_user_peserta_balita();
            $data['user_peserta_bumil'] = $this->Model_user->get_all_user_peserta_bumil();

            $data['total_desa'] = $this->Model_desa->count_all_desa();

            $data['posyandu_e'] = $this->Model_posyandu->get_posyandu_by_id($id_posyandu);
            // $id_posyandu = $this->input->post('id_posyandu', true);

            // $data['cari_posyandu_bumil_desa'] = $this->Model_posyandu->get_all_posyandu_bumil_desa_group();
            // $data['cari_posyandu_bumil'] = $this->Model_posyandu->get_all_posyandu_bumil_group();

            // $data['posyandu_bumil'] = $this->Model_posyandu->cari_posyandu_bumil($id_posyandu);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bumil/v_add_posyandu_bumil_lanjutan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'HPHT' => htmlspecialchars($this->input->post('HPHT', true)),
                'TTP' => htmlspecialchars($this->input->post('TTP', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
                'hamil_ke' => htmlspecialchars($this->input->post('hamil_ke', true)),
                'berat_badan' => htmlspecialchars($this->input->post('berat_badan', true)),
                'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', true)),
                'HB' => htmlspecialchars($this->input->post('HB', true)),
                'kunjungan_ke' => htmlspecialchars($this->input->post('kunjungan_ke', true)),
                'bulan' =>  date('F'),
                'tahun' => date('Y'),
            ];
            $this->Model_posyandu->add_posyandu($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
            if ($this->session->userdata('level') == "desa" || $this->session->userdata('level') == "panitia") {
                redirect('posyandu-desa-bumil');
            } else {
                redirect('posyandu-bumil');
            }
        }
    }

    public function edit_posyandu_bumil($id_posyandu)
    {
        $this->form_validation->set_rules('id_user', 'Id_user', 'required|trim', [
            'required' => 'User harus dipilih..!'
        ]);
        $this->form_validation->set_rules('HPHT', 'Hpht', 'required|trim', [
            'required' => 'HPHT tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('TTP', 'Ttp', 'required|trim', [
            'required' => 'TTP tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', [
            'required' => 'Umur kandungan harus dipilih..!'
        ]);
        $this->form_validation->set_rules('hamil_ke', 'Hamil_ke', 'required|trim', [
            'required' => ' Hamil ke harus dipilih..!'
        ]);
        $this->form_validation->set_rules('berat_badan', 'Berat_badan', 'required|trim', [
            'required' => 'Berat badan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('tinggi_badan', 'Tinggi_badan', 'required|trim', [
            'required' => 'Tinggi badan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('HB', 'Hb', 'required|trim', [
            'required' => 'HB tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('kunjugan_ke', 'Kunjugan_ke', 'required|trim', [
            'required' => 'Kunjugan Ke, harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Posyandu';
            //$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
            // $data['posyandu'] = $this->Model_posyandu->get_all_posyandu();
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
            $data['user_peserta_desa_balita'] = $this->Model_user->get_all_user_peserta_desa_balita();
            $data['user_peserta_desa_bumil'] = $this->Model_user->get_all_user_peserta_desa_bumil();
            $data['user_peserta_balita'] = $this->Model_user->get_all_user_peserta_balita();
            $data['user_peserta_bumil'] = $this->Model_user->get_all_user_peserta_bumil();

            $data['total_desa'] = $this->Model_desa->count_all_desa();

            //$data['posyandu_e_bumil'] = $this->Model_posyandu->get_posyandu_by_id($id_posyandu);

            $data['posyandu_e'] = $this->Model_posyandu->get_posyandu_by_id($id_posyandu);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bumil/v_edit_posyandu_bumil', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_posyandu' => htmlspecialchars($this->input->post('id_posyandu', true)),
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'HPHT' => htmlspecialchars($this->input->post('HPHT', true)),
                'TTP' => htmlspecialchars($this->input->post('TTP', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
                'hamil_ke' => htmlspecialchars($this->input->post('hamil_ke', true)),
                'berat_badan' => htmlspecialchars($this->input->post('berat_badan', true)),
                'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', true)),
                'HB' => htmlspecialchars($this->input->post('HB', true)),
                'kunjungan_ke' => htmlspecialchars($this->input->post('kunjungan_ke', true)),
            ];
            $this->Model_posyandu->edit_posyandu($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            if ($this->session->userdata('level') == "desa" || $this->session->userdata('level') == "panitia") {
                redirect('posyandu-desa-bumil');
            } else {
                redirect('posyandu-bumil');
            }
        }
    }
    public function rekap_bumil()
    {
        $data['title'] = 'Rekap Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_bumil'] = $this->Model_posyandu->rekap_bumil();
        //$data['rekap_balita_desa_januari'] = $this->Model_posyandu->rekap_balita_desa_group_januari();
        //$data['rekap_balita_desa_februari'] = $this->Model_posyandu->rekap_balita_desa_group_februari();
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

        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita        
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bumil/v_rekap_ibu_hamil', $data);
        $this->load->view('templates/footer');
    }
    public function rekap_bumil_desa()
    {
        $data['title'] = 'Rekap Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_bumil_desa'] = $this->Model_posyandu->rekap_bumil_desa();
        //$data['rekap_balita_desa_januari'] = $this->Model_posyandu->rekap_balita_desa_group_januari();
        //$data['rekap_balita_desa_februari'] = $this->Model_posyandu->rekap_balita_desa_group_februari();
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
        $this->load->view('bumil/v_rekap_ibu_hamil_desa', $data);
        $this->load->view('templates/footer');
    }

    public function filter_tahun_bumil()
    {
        $data['title'] = 'Filter Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_balita_desa'] = $this->Model_posyandu->rekap_balita_desa();
        // $data['rekap_balita_desa_januari'] = $this->Model_posyandu->rekap_balita_desa_group_januari();
        // $data['rekap_balita_desa_februari'] = $this->Model_posyandu->rekap_balita_desa_group_februari();
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

        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita        
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil


        $tahun = $this->input->post('tahun', true);
        $data['filter_bumil_tahun1'] = $this->Model_posyandu->filter_tahun_bumil($tahun);
        $data['th'] = $tahun;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bumil/v_filter_tahun_posyandu_bumil', $data);
        $this->load->view('templates/footer');
    }

    public function filter_tahun_bumil_desa()
    {
        $data['title'] = 'Filter Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_balita_desa'] = $this->Model_posyandu->rekap_balita_desa();
        // $data['rekap_balita_desa_januari'] = $this->Model_posyandu->rekap_balita_desa_group_januari();
        // $data['rekap_balita_desa_februari'] = $this->Model_posyandu->rekap_balita_desa_group_februari();
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


        $tahun = $this->input->post('tahun', true);


        $data['filter_bumil_tahun1'] = $this->Model_posyandu->filter_tahun_bumil_desa($tahun);
        $data['th'] = $tahun;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bumil/v_filter_tahun_posyandu_bumil_desa', $data);
        $this->load->view('templates/footer');
    }

    public function get_posyandu_ku()
    {
        $data['title'] = 'Posyandu';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['rekap_balita_desa'] = $this->Model_posyandu->rekap_balita_desa();

        $data['total_posyandu_ku'] = $this->Model_posyandu->count_data_posyandu_ku();
        $data['posyandu_ku'] = $this->Model_posyandu->get_all_posyandu_ku();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        if ($this->session->userdata('kriteria') == 'Balita') {
            $this->load->view('v_posyandu_ku_balita', $data);
        } else {
            $this->load->view('v_posyandu_ku_bumil', $data);
        }
        $this->load->view('templates/footer');
    }
}