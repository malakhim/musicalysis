<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pieces extends CI_Controller {

	public function index()
	{
        $this->load->model('pieces_model','pm');
        $pieces = $this->pm->get_pieces();
        $data['pieces'] = $pieces;
		$this->template->load('default','pieces',$data);
	}
}