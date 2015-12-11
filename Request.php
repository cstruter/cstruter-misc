<?php

namespace CSTruter\Misc;

use CSTruter\Misc\Exceptions\ResponseException;

/**
 * Class for handling Web Requests
 *
 * @package CSTruter\Misc
 * @author Christoff Truter <christoff@cstruter.com>
 * @copyright 2005-2015 CS Truter
 * @version 0.0.1
*/
class Request
{
	protected $url;
	protected $ssl;
	
	public function __construct($url, $ssl = false)
	{
		$this->url = $url;
		$this->ssl = $ssl;
	}
	
	public function getResponse()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if ($this->ssl) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);		
		}
		$response = curl_exec($ch);
		if(curl_errno($ch)) {
			$errorMessage = curl_error($ch);
			curl_close($ch);
			throw new ResponseException($errorMessage);
		} 
		curl_close($ch);
		return $response;
	}
}

?>