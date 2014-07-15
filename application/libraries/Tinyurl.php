<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Tinyurl Class
 *
 * Created shortened url from given (long) url.
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	yvesh@medadherence.com
 * @copyright       Medadherence, LLC
 * @link			http://medadherence.com
 */
class Tinyurl {

	function __construct($url = '')
	{
	}

	public function shorten($url) 
	{
		$curl = curl_init();
		$timeout = 5;  
		curl_setopt($curl,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);  
		curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,$timeout);  
		$shortented_url = curl_exec($curl);  
		curl_close($curl);  
		return $shortented_url; 
	}
}


// http://stageprocessor.careplanmanager.com/processvideo/aHR0cDovL3ZpZXcudnphYXIuY29tLzE2MTMzOTgvcGxheWVyCg==/999/123/

// /usr/bin/lynx -dump http://stageprocessor.careplanmanager.com/tinyurltest/getShortUrl/