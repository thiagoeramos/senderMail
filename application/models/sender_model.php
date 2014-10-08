<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class sender_model extends CI_Model{

	var $tablename = "sendermail";

	public final function __construct()
	{
		parent::__construct();

	}
		
	
	public final function sendMail()
	{
		
			$this->db->select("*");
			$this->db->from($this->tablename);
			$this->db->where(array('sent'=>0,'status_id'=>1));
			$this->db->limit(100);
			$query=$this->db->get();
			
			if($query->num_rows()){
				
				$data_mails=$query->result_array();
				$emails=array();
				
				foreach($data_mails as $email){						
					$name=explode("@,",trim($email['email']));
				
					$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
					<html xmlns='http://www.w3.org/1999/xhtml'>
					<head>
					<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
					<title>Untitled Document</title>
					</head>
					
					<body>
					<a href='http://www.elkis18.com.br/mkt/elkis18_0010_apresentacao_250914.pdf' title='Apresentação Elkis18'>
					<img src='http://www.elkis18.com.br/mkt/elkis18_0035_emkt-apresentacao.jpg' alt='Apresentação Elkis18' width='800' height='1158' usemap='#Map' border='0' />
					<map name='Map' id='Map'>
					<area shape='rect' coords='1,-22,819,1144' href='http://www.elkis18.com.br/mkt/elkis18_0010_apresentacao_250914.pdf' target='_blank' />
					</map>
					</a>
					<br />
					<p>Olá ".$name[0]."! Caso você não queira mais receber esses e-mails favor responder ao remetente.</p>
					</body>
					</html>";
					
					if($this->email->envia(trim($email['email']), 'Elkis18 - ','Elkis18 - Mais que Promoção e Comunicação',$message)){
						
						if($this->db->where('id',$email['id'])->update($this->tablename, array('sent'=>1))){				
							continue;
						}
					}
				}
				
				return true;
				
			}
			
			
			return false;
			
	}
	
	
}
