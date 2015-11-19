<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class piece extends CI_Controller {
		
	public function index()
	{
        $this->load->model('pieces');
		$this->template->load('default','piece');
	}
}