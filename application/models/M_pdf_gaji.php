<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pdf_gaji extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get_gaji_kelas($start,$end)
    {
        $query =
			$this->db->select('*')
			->from('kelas')
			->join('iuran','kelas.id=iuran.id_kelas')
			->select_sum('jumlah_iuran', $alias = 'total')
			->where('tanggal_iuran BETWEEN "' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"')
			->group_by('id_kelas')
			->get();
		return $query;
    }

}