<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function load($id)
	{
        $data['id'] = $id;

		$this->load->view('download', $data);
	}
}