<?php

class M_data extends CI_Model
{

	// FUNGSI CRUD
	// fungsi untuk mengambil data dari database
	function get_data($table)
	{
		return $this->db->get($table);
	}

	//mobile
	function cek_login_mobile($where)
	{
		return $this->db->select('tm_karyawan.id, 
								tm_karyawan.username, 
								tm_karyawan.id_jabatan, 
								tm_jabatan.jabatan,
								th_jabatan.id_kecamatan,
								th_jabatan.id_gampong,
								th_jabatan.id_kelas,
								kecamatan.kecamatan,
								gampong.gampong,
								')
			->from('tm_karyawan')
			->where($where)
			->join('tm_jabatan', 'tm_jabatan.id=tm_karyawan.id_jabatan') //ambil data jabatan
			->join('th_jabatan', 'th_jabatan.id_karyawan=tm_karyawan.id') //ambil data kecamatan, gampong, kelas
			->join('kecamatan', 'kecamatan.id_kecamatan=th_jabatan.id_kecamatan') //ambil data kecamatan
			->join('gampong', 'gampong.id_gampong=th_jabatan.id_gampong') //ambil data gampong
			->get();
	}

	function count_jamaah()
	{
		// function count_jamaah($where){
		// $this->db->where('gampong',$where);
		return $this->db->count_all_results('anggota');
	}

	function count_jamaah_baru()
	{
		// $this->db->where('gampong',$where);
		return $this->db->count_all_results('baru');
	}

	function count_jamaah_meniggal()
	{
		// $this->db->where('gampong',$where);
		return $this->db->count_all_results('meninggal');
	}

	// function get_all_presensi($where){
	// 	return $this->db->query("SELECT * FROM `absensi`  WHERE (gampong = '$where' )  GROUP BY `ket_pengajian` ");}
	function get_all_presensi()
	{
		return $this->db->query("SELECT * FROM `absensi` GROUP BY `ket_pengajian` ");
	}

	// function get_all_jamaah(){
	// return $this->db->query("SELECT * from anggota");}
	function get_all_jamaah($where)
	{
		return $this->db->get_where("anggota", $where);
	}

	public function addData($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	function checkPresensi($table, $where, $time)
	{
		return $this->db->select('*')->from($table)->where($where)->like('time', $time)->get();
	}

	public function get_all_jamaah_meninggal()
	{
		return $this->db->query("SELECT * from meninggal order by tanggal_meninggal desc");
	}

	public function get_detail_presensi($ket_pengajian, $tanggal_mulai, $jam_pengajian)
	{
		return $this->db->query("SELECT absensi.id_anggota,absensi.absen,anggota.nama FROM `absensi` JOIN anggota ON anggota.id=absensi.id_anggota WHERE ket_pengajian = '$ket_pengajian' AND tanggal_mulai = '$tanggal_mulai' AND jam_pengajian = '$jam_pengajian'");
	}

	public function get_detail_iuran($nama)
	{
		return $this->db->query("SELECT * FROM `iuran`  WHERE nama = '$nama'");
	}

	function get_all_event()
	{
		return $this->db->query("SELECT * FROM `th_event`");
	}

	function get_all_presensi_event($id)
	{
		return $this->db->query("SELECT th_presensi_event.*,tm_karyawan.username,tm_status_presensi.status FROM `th_presensi_event` JOIN tm_karyawan ON tm_karyawan.id=th_presensi_event.id_karyawan JOIN tm_status_presensi ON tm_status_presensi.id=th_presensi_event.id_status WHERE id_event = '$id'");
	}

	function checkPresensiEvent($table, $where)
	{
		return $this->db->select('*')->from($table)->where($where)->get();
	}


	//website
	function get_data_anggota()
	{
		$query = $this->db->query("SELECT * from anggota order by no_anggota desc");
		return $query;
	}

	function get_data_ketua_kecamatan($table, $table2, $table3)
	{
		$query = $this->db->query("SELECT * from anggota WHERE (kecamatan = '$table' AND jenis_kelamin = '$table2') order by field (gampong,'$table3') desc, no_anggota asc");
		return $query;
	}

	function get_data_kelas_kembali($table)
	{
		$query = $this->db->query("SELECT * from anggota WHERE (id_kelas = '$table' ) order by id desc");
		return $query;
	}

	function get_data_jumlah_kecamatan($table)
	{
		$query = $this->db->query("SELECT * from anggota WHERE kecamatan = '$table'");
		return $query;
	}

	function get_data_kelas_id($table)
	{
		$query = $this->db->query("SELECT * from anggota WHERE  id_kelas IN('$table') order by nama desc");
		return $query;
	}

	function get_anggota($table)
	{
		$query = $this->db->query("SELECT * from anggota WHERE  id IN('$table')");
		return $query;
	}

	function get_data_peringatan()
	{
		$query = $this->db->query("SELECT anggota.id,anggota.nama,anggota.no_anggota, anggota.nama_ortu, kelas.majelis, anggota.jenis_kelamin, anggota.gampong, anggota.kecamatan,anggota.kabupaten from anggota inner join kelas on anggota.id_kelas = kelas.id and anggota.peringatan = 1 order by anggota.id ASC");
		return $query;
	}

	function get_data_pemberhentian()
	{
		$query = $this->db->query("SELECT anggota.id,anggota.nama,anggota.no_anggota, anggota.nama_ortu, kelas.majelis, anggota.jenis_kelamin, anggota.gampong, anggota.kecamatan,anggota.kabupaten from anggota inner join kelas on anggota.id_kelas = kelas.id and anggota.pemberhentian = 1 order by anggota.id ASC");
		return $query;
	}


	function get_data_kelas_id3($table, $table2)
	{
		$query = $this->db->query("SELECT * from anggota WHERE  (id_kelas = '$table' AND tanggal_mulai = '$table2') order by nama desc");
		return $query;
	}

	function get_data_kelas_id2($table)
	{
		$query = $this->db->query("SELECT * from kelas WHERE  id = '$table' ");
		return $query;
	}


	function get_data_ketua_gampong($table)
	{
		$query = $this->db->query("SELECT * from anggota WHERE gampong IN('$table')");
		return $query;
	}

	function get_data_tambah_kelas($table)
	{
		$query = $this->db->query("SELECT * from kelas WHERE kecamatan IN('$table')");
		return $query;
	}


	function get_data_kelas($table, $table2)
	{
		$query = $this->db->query("SELECT * from anggota WHERE (jenis_kelamin= '$table' AND gampong = '$table2')  order by id desc");
		return $query;
	}


	function get_data_kelas_meninggal($table, $table2)
	{
		$query = $this->db->query("SELECT * from meninggal WHERE (jenis_kelamin= '$table' AND gampong = '$table2')  order by id desc");
		return $query;
	}

	function get_data_meninggal_gampong($table2)
	{
		$query = $this->db->query("SELECT * from meninggal WHERE (gampong = '$table2')  order by id desc");
		return $query;
	}

	function get_data_meninggal_kecamatan($table2)
	{
		$query = $this->db->query("SELECT * from meninggal WHERE (kecamatan = '$table2')  order by id desc");
		return $query;
	}

	function get_data_ketua_gampong_iuran($table2)
	{
		$query = $this->db->query("SELECT * from ketua_gampong WHERE (kecamatan = '$table2')  order by id desc");
		return $query;
	}

	function get_data_ketuakec($table)
	{
		$query = $this->db->query("SELECT * from ketua_gampong WHERE kecamatan IN('$table') order by id desc");
		return $query;
	}

	function get_data_ketpen($table)
	{
		$query = $this->db->query("SELECT * from ketua_pengajian WHERE kecamatan IN('$table') order by id desc");
		return $query;
	}

	function get_data_tanggal($table)
	{
		$query = $this->db->query("SELECT * from absensi WHERE  tanggal_mulai IN ('$table') order by absensi_id desc");
		return $query;
	}

	function get_data_kelas_tanggal($table, $table2)
	{
		$query = $this->db->query("SELECT * from absensi inner join anggota on absensi.id_anggota = anggota.id and absensi.id_kelas = '$table'  AND tanggal_mulai = '$table2' order by absensi_id DESC");
		return $query;
	}


	function get_data_admin_tanggal($table, $table2, $table3)
	{
		$query = $this->db->query("SELECT * from absensi WHERE (gampong= '$table' AND kelas = '$table2' AND tanggal_mulai = '$table3')  order by absensi_id desc");
		return $query;
	}


	function get_data_absensi($table, $table2)
	{
		$query = $this->db->query("SELECT * from $table,$table2 WHERE absensi.absensi_id=anggota.id ");
		return $query;
	}

	function get_data_gampong($table)
	{
		return $this->db->get($table);
	}

	function get_data_user($table)
	{
		return $this->db->get($table);
	}

	// fungsi untuk menginput data ke database
	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function insert_meninggal($where, $data, $table)
	{
		$this->db->delete('anggota', $where);
		$this->db->insert($table, $data);
	}

	function insert_baru($where, $data, $table)
	{
		$this->db->delete('baru', $where);
		$this->db->insert($table, $data);
	}

	function insert_hapus($where, $data, $table)
	{
		$this->db->delete('anggota', $where);
		$this->db->insert($table, $data);
	}


	// fungsi untuk mengedit data
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function edit_data_seluruh($table)
	{
		return $this->db->get_where($table);
	}

	// fungsi untuk mengupdate atau mengubah data di database
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function update_data_absen($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	// fungsi untuk menghapus data dari database
	function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}
	// AKHIR FUNGSI CRUD

	public function save_batch($data)
	{
		return $this->db->insert_batch('absensi', $data);
	}

	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function view()
	{
		return $this->db->get('anggota')->result(); // Tampilkan semua data yang ada di tabel anggota
	}


	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function nama_anggota($id_anggota)
	{
		$this->db->select('nama')->from('anggota')->where('id', $id_anggota);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->nama;
		}
		return false;
	}

	public function nama_gampong($id_gampong)
	{
		$this->db->select('ketua_gampong')->from('ketua_gampong')->where('id', $id_gampong);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->ketua_gampong;
		}
		return false;
	}


	public function anggotadariid($table)
	{
		$no = 1;
		$query = $this->db->query("SELECT * from anggota where id = '$table'");

		if ($no < 2) {
			return $query;
		}
	}




	function get_data_kegam_kecam($table)
	{
		$query = $this->db->query("SELECT * from ketua_gampong WHERE kecamatan IN('$table')");
		return $query;
	}

	public function delete($id)
	{
		$this->db->where_in('id', $id);
		$this->db->delete('anggota');
	}


	function absensi_ketua_kelas($table)
	{
		$query = $this->db->query("SELECT * from ketua_gampong WHERE kecamatan IN('$table')");
		return $query;
	}



	//Absensi

	function absensi_harian()
	{
		$query = $this->db->select("*")
			->from("tm_karyawan")
			->join("anggota", "tm_karyawan.id_anggota=anggota.id")
			->join("tm_jabatan", "tm_karyawan.id_jabatan=tm_jabatan.id")
			->join('th_jabatan', 'th_jabatan.id_karyawan=tm_karyawan.id') //ambil data kecamatan, gampong, kelas
			->join('th_karyawan', 'tm_karyawan.id=th_karyawan.id_karyawan') //ambil data kecamatan, gampong, kelas
			->join('kecamatan', 'kecamatan.id_kecamatan=th_jabatan.id_kecamatan') //ambil data kecamatan
			->join('gampong', 'gampong.id_gampong=th_jabatan.id_gampong') //ambil data gampong
			->where('year(time) = year(now()) and month(time) = month(now()) and day(time) = day(now())')
			->get();
		return $query;
	}

	function lihat_absen()
	{
		$query = $this->db->query("SELECT * from th_karyawan where year(time) = year(now()) and month(time) = month(now()) and day(time) = day(now())  ");
		return $query->num_rows();
	}

	public function save_batch_karyawan($data)
	{
		return $this->db->insert_batch('th_karyawan', $data);
	}

	function ambil_harian($time)
	{
		$tanggal1 = explode('-', $time);
		$tahun = $tanggal1[0];
		$bulan =  $tanggal1[1];
		$hari =  $tanggal1[2];

		$query = $this->db->select("th_karyawan.id,tm_jabatan.jabatan,anggota.gampong,anggota.kecamatan,anggota.nama,tm_jabatan.jabatan,th_karyawan.id_status")
			->from("th_karyawan")
			->join("tm_karyawan", "th_karyawan.id_karyawan=tm_karyawan.id")
			->join("anggota", "tm_karyawan.id_anggota=anggota.id")
			->join("tm_jabatan", "tm_karyawan.id_jabatan=tm_jabatan.id")
			->where("year(time) = '$tahun' and month(time) = '$bulan' and day(time) = '$hari'")
			->get();
		return $query;
	}

	function ambil_harian_id($anggota, $time)
	{
		$tanggal1 = explode('-', $time);
		$tahun = $tanggal1[0];
		$bulan =  $tanggal1[1];
		$hari =  $tanggal1[2];

		$query = $this->db->select("th_karyawan.id,tm_jabatan.jabatan,anggota.gampong,anggota.kecamatan,anggota.nama,tm_jabatan.jabatan,th_karyawan.id_status")
			->from("th_karyawan")
			->join("tm_karyawan", "th_karyawan.id_karyawan=tm_karyawan.id")
			->join("anggota", "tm_karyawan.id_anggota=anggota.id")
			->join("tm_jabatan", "tm_karyawan.id_jabatan=tm_jabatan.id")
			->where("year(time) = '$tahun' and month(time) = '$bulan' and day(time) = '$hari'")
			->get();
		return $query;
	}

	function ambil_perbulan($anggota, $bulan, $tahun)
	{

		$query = $this->db->select("*")
			->from("th_karyawan")
			->join("tm_karyawan", "th_karyawan.id_karyawan=tm_karyawan.id")
			->join("anggota", "tm_karyawan.id_anggota=anggota.id")
			->join("tm_jabatan", "tm_karyawan.id_jabatan=tm_jabatan.id")
			->where("year(time) = '$tahun' and month(time) = '$bulan' and id_anggota = '$anggota'")
			->get();
		return $query;
	}

	function ambil_perbulan_all($bulan, $tahun)
	{
		$query = $this->db->select("*")
			->from("th_karyawan")
			->join("tm_karyawan", "th_karyawan.id_karyawan=tm_karyawan.id")
			->join("anggota", "tm_karyawan.id_anggota=anggota.id")
			->join("tm_jabatan", "tm_karyawan.id_jabatan=tm_jabatan.id")
			->where("year(time) = '$tahun' and month(time) = '$bulan'")
			->get();
		return $query;
	}

	function ambil_pertahun($tahun, $anggota)
	{

		$query = $this->db->select("*")
			->from("th_karyawan")
			->join("tm_karyawan", "th_karyawan.id_karyawan=tm_karyawan.id")
			->join("anggota", "tm_karyawan.id_anggota=anggota.id")
			->join("tm_jabatan", "tm_karyawan.id_jabatan=tm_jabatan.id")
			->where("year(time) = '$tahun' and id_karyawan = '$anggota'")
			->get();
		return $query;
	}

	function ambil_pertahun_all($tahun)
	{

		$query = $this->db->select("*")
			->from("th_karyawan")
			->join("tm_karyawan", "th_karyawan.id_karyawan=tm_karyawan.id")
			->join("anggota", "tm_karyawan.id_anggota=anggota.id")
			->join("tm_jabatan", "tm_karyawan.id_jabatan=tm_jabatan.id")
			->where("year(time) = '$tahun'")
			->get();
		return $query;
	}



	function get_rekap_judul($id)
	{

		$query = $this->db->select("*")
			->from("th_event")
			->where("id = '$id'")
			->get();
		return $query;
	}

	function get_rekap_event($id)
	{

		$query = $this->db->select("*")
			->from("th_event")
			->join("th_presensi_event", "th_presensi_event.id_event=th_event.id")
			->join("tm_karyawan", "tm_karyawan.id=th_presensi_event.id_karyawan")
			->join("tm_jabatan", "tm_jabatan.id=tm_karyawan.id_jabatan")
			->join("anggota", "anggota.id=tm_karyawan.id_anggota")
			->join("tm_status_presensi", "tm_status_presensi.id=th_presensi_event.id_status")
			->where("id_event = '$id'")
			->get();
		return $query;
	}
}
