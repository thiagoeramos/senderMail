<?php defined('BASEPATH') OR exit('No direct script access allowed');

class cronjob extends CI_Controller {
	
	private $data;
	

	function __construct()
	{
		parent::__construct();
		
		
		$this->load->model('sender_model', 'dm');

		$this->data = array();
    }

	public final function render($method)
	{
		
		$this->load->view('common/topo', $this->data);
		$this->load->view($this->router->class.'/'.$method, $this->data);
		$this->load->view('common/rodape', $this->data);
	}
	
	
    public final function index()
    {

      $this->dm->sendMail();
	  
	$this->render($this->router->method);

    }
	
}
