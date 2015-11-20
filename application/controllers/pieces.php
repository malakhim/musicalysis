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

	public function playing($composer,$piece){
		$this->load->model('pieces_model','pm');
        $params['composer'] = $composer;
        $params['piece'] = $piece;
        if($params['piece'] != null && $params['composer'] != null){
        	$data['pieces'] = $this->pm->get_pieces($params);
        	if(empty($data['pieces'])){
        		redirect('/pieces');
        	}else{
        		$data['title'] = $data['pieces'][0]->piece_title;
        		$data['overview'] = $data['pieces'][0]->overview_text;
        		$data['trivia'] = $data['pieces'][0]->trivia_text;
        	}

        }
        else{
        	redirect('/pieces');
        }

        // var_dump($data['pieces']);
		$this->template->load('default','piece',$data);
	}
}