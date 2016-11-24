<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
		$this->load->model( 'filter_model' );
    }

    public function index()
	{
		$data['items'] = array();
		$data['current'] = $this->router->fetch_class();
		$this->load->view('content', $data);
	}
	
	public function ajaxSearch()
	{
		$response = array('success' => false);
        $results = $this->filter_model->read( $this->input->post() );
		
        if ( !empty( (array) $results ) )
        {
            $response['success'] = true;
			$response['data'] = $results;
        }
        
        $this->output
        	 ->set_content_type('application/json')
        	 ->set_output(json_encode($response));
	}

    public function header()
	{
		$this->load->view("header");
	}

	public function footer()
	{
		$this->load->view("footer");
	}
}