<?php defined('BASEPATH') OR exit('No direct script access allowed');

class cronjob extends CI_Controller {
	
	private $data;
	

	function __construct()
	{
		parent::__construct();
		
		
		$this->load->model('sender_model', 'dm');

		$this->data = array();
    }

	
    public final function index()
    {

      $this->dm->sendMail();

    }
	
}
