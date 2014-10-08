<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Config extends CI_Config {
    
	function __construct()
	{
		$this->config =& get_config();
	}

	/**
	 * Base URL
	 * Returns base_url [. uri_string]
	 *
	 * @access public
	 * @param string $uri
	 * @return string
	 */
	function base_url($uri = '')
	{
		$url    = ltrim($this->_uri_string($uri),'/');
		
		$ext    = pathinfo(getcwd()."/".$url, PATHINFO_EXTENSION);
		
		if(in_array($ext,get_extCache())){
            
			$splits = explode('/',$url);
			
			if(isset($splits[0]) &&  is_file(getcwd()."/".$uri)){
                
                ob_start();
                $content    = file_get_contents(getcwd()."/".$uri);
                ob_end_clean();
                
				$url    = str_replace($splits[0]."/",$splits[0]."/".md5($content)."/",$url);
				$url    = ltrim($url,'/');
			}
		}
        
		return site_url($url);
	}
}