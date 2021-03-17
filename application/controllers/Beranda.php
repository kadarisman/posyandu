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
		$this->load->view('v_beranda', $data);
	}

	public function view_desa($id_desa)
	{
		//$data['title'] = 'Desa';
		$data['desa'] = $this->Model_desa->get_desa_name($id_desa);
		//$data['peserta_desa'] = $this->Model_desa->count_peserta_desa();
		//$data['all_peserta'] = $this->Model_peserta->get_all_peserta();
		$this->load->view('v_desa', $data);
	}
}