<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
		
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

		// Load form validation library
		$this->load->library('form_validation');
		$this->load->library('session');

		// Load captcha
		$this->load->helper('captcha');

		// Set various rules on each field
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('message','Message','trim|required');
		$this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
    	$userCaptcha = $this->input->post('userCaptcha');

		// if validation passed, send an email
		if($this->form_validation->run() == true){
			$this->load->library('email');
			$this->email->from($this->input->post('email'),$this->input->post('name'));
			$this->email->to('bryan@bryonics.com');
			$this->email->cc('maryanne.nghc@gmail.com');
			$this->email->subject('Message from Musicalysis!');
			$this->email->message($this->input->post('message'));
			$data['success'] = $this->email->send();
			$this->template->load('default','contact',$data);
		}else{
			// numeric random number for captcha
		    $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
		    // setting up captcha config
		    $vals = array(
		        'word' => $random_number,
		    	'img_path' => './captcha/',
		        'img_url' => base_url().'captcha/',
		        'img_width' => 140,
		        'img_height' => 32,
		        'expiration' => 7200
		    );
		    $data['captcha'] = create_captcha($vals);
		    $this->session->set_userdata('captchaWord',$data['captcha']['word']);
		    // $this->load->view('captcha', $data);
			// Else, reload page and show errors using form_error
			$this->template->load('default','contact',$data);
		}
	}

	public function check_captcha($str){
	    $word = $this->session->userdata('captchaWord');
	    if(strcmp(strtoupper($str),strtoupper($word)) == 0){
	      return true;
	    }
	    else{
	      $this->form_validation->set_message('check_captcha', 'Invalid captcha. Please check you have entered the words correctly.');
	      return false;
	  }
    }
}