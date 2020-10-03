<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Siswa extends REST_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model','siswa');
	}

	public function index_get($id = null)
	{
		$siswa = $this->siswa->getSiswa($id);
		// Check if the users data store contains users (in case the database result returns NULL)
        if ($siswa)
        {
            // Set the response and exit
            $this->response($siswa, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'Data Siswa Tak DItemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/api/Mahasiswa.php */