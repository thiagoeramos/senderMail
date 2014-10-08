<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Email extends CI_Email
{
 	public function __construct()
    {
        parent::__construct();
    }

	public function envia($email, $assunto, $mensagem, $bcc = false)
	{
		$CI =& get_instance();
		
		$this->clear();
		$email='thiagoevangelista.contato@gmail.com';
		
		$this->to($email);
			
		$senders=array('elkis18@elkis18.com.br','atendimento1@elkis18.com.br','atendimento2@elkis18.com.br');
		$sender_sorted = array_rand($senders, 1);
		
		$this->initialize(email_config());
			
		$this->set_mailtype('html');
		$this->from($senders[$sender_sorted], 'Atendimento Elkis18');
		$this->subject($assunto);
		$this->message($mensagem);
			
		if($this->send()){
			return true;
		}
		
		return false;
	}
}