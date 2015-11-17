<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /**
  * Custom templating file
  */
    class Template 
    {
        var $ci;
         
        function __construct() 
        {
        	// Create CI instance for templating
            $this->ci =& get_instance();
        }

        function load($tpl_view, $body_view = null, $data = array()) 
			{
				// Check parameter is supplied
			    if ( ! is_null( $body_view ) ) 
			    {
			    	// Does template file exist?
			        if ( file_exists( APPPATH.'views/themes/'.$tpl_view.'/templates/'.$body_view ) ) 
			        {
			        	// Get path for template file
			            $body_view_path = 'themes/'.$tpl_view.'/templates/'.$body_view;
			        }
			        // What if programmer neglected to put .php extension?
			        else if ( file_exists( APPPATH.'views/themes/'.$tpl_view.'/templates/'.$body_view.'.php' ) ) 
			        {
			        	// Get path for template file
			            $body_view_path = 'themes/'.$tpl_view.'/templates/'.$body_view.'.php';
			        }
			        // Use default if theme not found
			        else if ( file_exists( APPPATH.'views/themes/default/templates/'.$body_view ) ) 
			        {
			        	// Get path for template file
			            $body_view_path = 'themes/default/templates/'.$body_view;
			        }
			        // Ditto for previous, but if coder forgot to put in .php at end of file name
			        else if ( file_exists( APPPATH.'views/themes/default/templates/'.$body_view.'.php' ) ) 
			        {
			        	// 
			            $body_view_path = 'themes/default/templates/'.$body_view.'.php';
			        }
			        else
			        {
			            show_error('Unable to load the requested file: ' . $tpl_view.'/templates/'.$body_view.'.php');
			        }

			        // Load the view into the body
			        $body = $this->ci->load->view($body_view_path, $data, TRUE);

			        // Extract title from page
					$dom = new DOMDocument;
					$dom->loadHTML($body);
					$title_hidden_div = $dom->getElementsByTagName('input')->item(0);

					if($title_hidden_div != null){
						$data['title'] = "Musicalysis | ".ucfirst($title_hidden_div->attributes->getNamedItem('value')->value);
					}else{
						$data['title'] = "Welcome to Musicalysis!";
					}
			         
			        if ( is_null($data) ) 
			        {
			            $data = array('body' => $body);
			        }
			        else if ( is_array($data) )
			        {
			            $data['body'] = $body;
			        }
			        else if ( is_object($data) )
			        {
			            $data->body = $body;
			        }
			    }

				$init_data = array(
					'template_name' => $body_view,
					'main_js' => DEFAULT_ASSETS_DIRECTORY.'js/main.js',
					'main_css' => DEFAULT_ASSETS_DIRECTORY.'css/main.css',
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
				$data = array_merge($data,$init_data);
			    $this->ci->load->view('themes/'.$tpl_view.'/templates/'.$tpl_view, $data);
			}
    }

