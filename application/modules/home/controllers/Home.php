<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
		$this->load->model( 'home_model' );
    }

    public function index()
	{
		$data['items'] = $this->home_model->read();
        $data['current'] = $this->router->fetch_class();
		$this->load->view('content', $data);
	}
    
    public function edit()
    {
        $id = $this->uri->segment(3);
        $result_arr = $this->home_model->read( $id );
        $response = array('empty' => true);
        
        if ( !empty( $result_arr ) )
        {
            $response = $result_arr;
        }
        
        $this->output
        	 ->set_content_type('application/json')
        	 ->set_output( json_encode( $response ) );
    }

	public function ajaxCreate()
	{
		$response = array('success' => false);
        $result = $this->home_model->create( $this->input->post() );

		if ( $result[0] )
		{
			$response['success'] = true;
            $response['id'] = $result[1];
		}

		$this->output
        	 ->set_content_type('application/json')
        	 ->set_output( json_encode( $response ) );
	}
    
    public function ajaxUpdate()
	{
		$response = array('success' => false);

		if ( $this->home_model->update( $this->input->post() ) )
		{
			$response['success'] = true;
		}

		$this->output
        	 ->set_content_type('application/json')
        	 ->set_output( json_encode( $response ) );
	}
    
    public function ajaxDelete()
    {
        $response = array('success' => false);
        
        if ( $this->home_model->delete( $this->input->post('id') ) )
        {
            $response['success'] = true;
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