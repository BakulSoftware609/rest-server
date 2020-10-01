<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function getSiswa($id)
	{
		if ($id === null) {
			return $this->db->get('siswa')->result_array();
		}else{
			return $this->db->get_where('siswa',['id' => $id])->result_array();
		}
	}

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */