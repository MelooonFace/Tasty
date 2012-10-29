<?php

class Response
{

	private static $headers = array(); // The headers array, storage for the header arguments
	
	/**
	 * Sets a response header value
	 *
	 * @param	string	$header
	 * @param	string	$value
	 * @return	void
	 */
	public static function put($header)
	{
		static::$headers[] = $header;
	}
	
	/**
	 * Returns the array of headers set
	 *
	 * @return	array
	 */
	public static function headers()
	{
		return static::$headers;
	}
	
	/**
	 * Responds to the connection with the headers
	 *
	 * @return	void
	 */
	public static function respond()
	{
		foreach( static::headers() as $header )
		{
			header("{$header}\n");
		}
	}
	
	/**
	 * HELPER: Status
	 * Sends the correct status code to the browser, without
	 * having to send two headers manually.
	 *
	 * @param	string	$code
	 * @return	void
	 */
	public static function status($code)
	{
		$status = $code . SPACE . Config::get('status_code', $code);
		
		static::put("Status: {$status}");
		static::put("HTTP/1.0 {$status}");
	}

}