<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = 'Beranda';
		$data['desa'] = $this->Model_desa->get_all_desa();
		//$data['peserta_desa'] = $this->Model_desa->count_peserta_desa();

		// if (($this->session->userdata('level') == "desa")) { // nyoe pat error??
		//$data['hitung_coba'] = $this->Model_user->hitung_coba();
		// } else {
		// }


		$this->load->view('v_beranda', $data);
	}

	public function view_desa($id_desa)
	{
		//$data['title'] = 'Desa';
		$data['desa'] = $this->Model_desa->get_desa_name($id_desa);
		$data['peserta_balita_desa'] = $this->Model_user->count_peserta_balita_desa_b($id_desa);
		$data['peserta_bumil_desa'] = $this->Model_user->count_peserta_bumil_desa_b($id_desa);
		$data['all_peserta_desa'] = $this->Model_user->get_all_peserta_desa_b($id_desa);
		$data['posyandu_balita_desa'] = $this->Model_posyandu->get_all_posyandu_balita_b($id_desa);
		$data['posyandu_bumil_desa'] = $this->Model_posyandu->get_all_posyandu_bumil_b($id_desa);
		$this->load->view('v_desa', $data);
	}
}