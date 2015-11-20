<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Pieces model for CRUD operations on pieces
 */
class Pieces_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        // Connect to database
        $this->load->database();
    }
    
    function get_pieces($params = null)
    {
    	if($params == null || empty($params)){
    		// Get all pieces
    		$query = $this->db->select('*')->from('pieces')->join('composers','pieces.composer_id = composers.composer_id')->get();
    	}else{
            $where_array = array(
                'pieces.piece_seo' => $params['piece'],
                'composers.composer_seo' => $params['composer'],
            );
    		// Get specific piece
            $query = $this->db->select('*')->from('pieces')->join('timings','pieces.piece_id = timings.piece_id')->join('composers','pieces.composer_id = composers.composer_id')->where($where_array)->get();
    	}
        return $query->result();
    }

    // function insert_entry()
    // {
    //     $this->title   = $_POST['title']; // please read the below note
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->insert('entries', $this);
    // }

    // function update_entry()
    // {
    //     $this->title   = $_POST['title'];
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->update('entries', $this, array('id' => $_POST['id']));
    // }

}