<?php

class Request implements Initialisable
{

	public static $uri;
	public static $type;

	/**
	 * The initial logic, finds the required information
	 * about the current request.
	 *
	 * @return	void
	 */
	public static function init()
	{
			
		// The request URI/request directory
		static::$uri = ( static::server('PATH_INFO') ) ? static::server('PATH_INFO') : DS . 'home';
		
		// The request type (examples: GET, POST)
		static::$type = static::server('REQUEST_METHOD');
		
	}
	
	/**
	 * Gets an item value from the $_SERVER global
	 *
	 * @param	string	$item
	 * @return	mixed
	 */
	public static function server($item = null)
	{
		// If you're requesting just Request::server()
		if( is_null($item) )
		{
			return $_SERVER; // The entire global
		}
		
		// If you're after a specific key
		else
		{
			if( isset($_SERVER[$item]) )
				return $_SERVER[$item]; // The item, we know is there...
		}
	}
	
	/**
	 * Gets the static $uri request variable
	 *
	 * @return	string
	 */
	public static function uri()
	{
		return static::$uri;
	}
	
	/**
	 * Gets the static $type request type variable
	 */
	public static function type()
	{
		return static::$type;
	}

}