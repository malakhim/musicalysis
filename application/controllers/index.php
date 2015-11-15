<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index extends CI_Controller {
		
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
		$this->load->helper('html');
		$this->load->helper('url');
		$data = array(
			// 'title' => 'Welcome to Musicalysis Web App',
			'js' => DEFAULT_ASSETS_DIRECTORY.'js/musicalysis.js',
			'css' => DEFAULT_ASSETS_DIRECTORY.'css/home.css',
			'header_vars' => array(
				link_tag(array(
					'rel'=>"stylesheet", 
					'href'=>"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css", 
					'integrity'=>"sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==", 
					'crossorigin'=>"anonymous")),
				link_tag(array(
					'rel'=>'stylesheet',
					'href'=>"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css",
					'integrity'=>"sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX", 
					'crossorigin'=>"anonymous")),
				script_tag('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous">'),
				),
		);
		$content_page = substr(request_uri(),1,strpos(request_uri(),'/',1)+1);
		var_dump($content_page);
		$this->template->load('default',$content_page,$data);
	}
}