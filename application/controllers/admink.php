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

	function index()
	{
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
		$this->load->view('admink/v_edit_gaji', $data);
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
		$this->load->view('admink/gaji_karyawan', $data);
		$this->load->view('admink/v_footer');
	}

	function tambahiuran()
	{
		$data['gampong'] = $this->gampongModel->viewBykec($this->session->userdata('ketua_kecamatan'));
		$data['kecamatan'] = $this->kecamatanModel->view();
		$this->load->view('admink/v_header');
		$this->load->view('admink/v_tambah_iuran', $data);
		$this->load->view('admink/v_footer');
	}
	function tambahiuranaksi()
	{
		$id_kecamatan = $this->input->post('kecamatan');
		$id_gampong = $this->input->post('gampong');
		$kecamatan = $this->kecamatanModel->kecamatan_name($id_kecamatan);
		$gampong = $this->persiswaModel->gampong_name4($id_gampong);
		$persiswa = $this->input->post('persiswa');
		$tanggal_iuran = $this->input->post('tanggal_iuran');
		$nama = $this->m_data->nama_anggota($persiswa);
		$kelas = $this->input->post('kelas');
		$jumlah_iuran = $this->input->post('jumlah_iuran');
		$data = array();


		$data = array(
			'nama' => $nama,
			'tanggal_iuran' => $tanggal_iuran,
			'id_kelas' => $id_gampong,
			'gampong' => $gampong,
			'kecamatan' => $kecamatan,
			'jumlah_iuran' => $jumlah_iuran,
		);

		// insert data ke database
		$this->m_data->insert_data($data, 'iuran');
		$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');

		// $this->session->set_userdata($data_session);
		// mengalihkan halaman ke halaman data absen
		redirect(base_url() . 'admink/tambahiuran');
	}

	function dataiuran()
	{
		$data['kecamatan'] = $this->kecamatanModel->view();
		$this->load->view('admink/v_header');
		$this->load->view('admink/v_data_iuran', $data);
		$this->load->view('admink/v_footer');
	}

	function listdataiuran()
	{
		$data['kecamatan'] = $this->kecamatanModel->view();
		$this->load->view('admink/v_header', $data);
		$this->load->view('admink/v_list_data_iuran');
		$this->load->view('admink/v_footer');
	}

	function iuranwajib()
	{
		$data['iuran'] = $this->m_data->select_data('tm_iuran_wajib')->result_array();
		$this->load->view('admink/v_header');
		$this->load->view('admink/v_iuran_wajib', $data);
		$this->load->view('admink/v_footer');
	}

	function editiuranwajib($id)

	{
		$where = array('id' => $id);
		$data['iuran'] = $this->m_data->edit_data($where, 'tm_iuran_wajib')->result();
		$this->load->view('admink/v_header');
		$this->load->view('admink/v_edit_iuran_wajib', $data);
		$this->load->view('admink/v_footer');
	}

	function editiuranwajibaksi()
	{
		$id = $this->input->post('id');
		$tahapsatu = $this->input->post('smt_satu');
		$tahapdua = $this->input->post('smt_dua');
		$where = array(
			'id' => $id
		);

		$data = array(
			'smt_satu' => $tahapsatu,

			'smt_dua' => $tahapdua
		);

		// update data ke database
		$this->m_data->update_data($where, $data, 'tm_iuran_wajib');

		// mengalihkan halaman ke halaman data kelas
		redirect(base_url() . 'admink/iuranwajib');
	}
}
