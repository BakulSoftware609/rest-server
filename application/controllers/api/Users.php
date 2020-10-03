<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Users extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model','users');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id == null) {
			$users = $this->users->getUsers();
		}else{
			$users = $this->users->getUsers($id);

		}

		if ($users){
            // Set the response and exit
            $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'Data User Tak Ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/api/Users.php */