<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {
		
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->load->library('email');

			$this->email->from($this->input->post('email'),$this->input->post('name'));
			$this->email->to('bryan@bryonics.com');
			$this->email->cc('maryanne.nghc@gmail.com');
			$this->email->subject('Message from Musicalysis!');
			$this->email->message($this->input->post('message'));
			$data['success'] = $this->email->send();
			echo $this->email->print_debugger();
			$this->template->load('default','contact',$data);
		}else{
			$this->template->load('default','contact');
		}
	}
}