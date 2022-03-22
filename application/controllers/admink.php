<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admink extends CI_Controller
{
    private $limit = 10;
	var $module_name = 'anggota';

	function __construct()
	{
		parent::__construct();

		// cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "admink") {
			redirect(base_url() . 'login?alert=belum_login');
		}
		$this->load->model('kecamatanModel');
		$this->load->model('ketgamModel');
		$this->load->model('gampongModel');
		$this->load->model('persiswaModel');
		$this->load->helper('rupiah_helper');

		$this->load->model('SiswaModel'); // Load model SiswaModel.php yang ada di folder models
		$this->load->model(array('M_pdfanggota' => 'anggota'));
		$this->load->model('Modelanggota', 'anggota2');
	}

    function index(){
        $this->load->view('admink/v_header');
        $this->load->view('admink/dashboard');
        $this->load->view('admink/v_footer');
    }

	function gaji()
	{
		$data['jabatan'] = $this->m_data->get_data('tm_jabatan')->result();
		$this->load->view('admink/v_header');
		$this->load->view('admink/v_gaji', $data);
		$this->load->view('admink/v_footer');
	}

	function editgaji($id)
	{
		$where = array('id' => $id);
		$data['jabatan'] = $this->m_data->edit_data($where, 'tm_jabatan')->result();
		$this->load->view('admink/v_header');
		$this->load->view('admink/v_edit_gaji',$data);
		$this->load->view('admink/v_footer');
	}

	function updategaji()
	{
		$id = $this->input->post('id');
		$jabatan = $this->input->post('jabatan');

		$gaji = $this->input->post('gaji');

		$where = array(
			'id' => $id
		);

		$data = array(
			'jabatan' => $jabatan,

			'gaji' => $gaji
		);

		// update data ke database
		$this->m_data->update_data($where, $data, 'tm_jabatan');

		// mengalihkan halaman ke halaman data kelas
		redirect(base_url() . 'admink/gaji');
	}

	function karyawan()
	{
		$data['jabatan'] = $this->m_data->get_data('tm_jabatan')->result();
		$data['karyawan'] = $this->m_data->get_data('tm_karyawan')->result();
		$data['gaji'] = $this->m_data->gajikaryawan()->result();
		$this->load->view('admink/v_header');
		$this->load->view('admink/gaji_karyawan',$data);
		$this->load->view('admink/v_footer');
	}
}