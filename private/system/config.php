<?php

class Config
{

	private static $data = array(); // The configuration storage array
	
	/**
	 * Load a specific configuration file from area
	 *
	 * @param	string	$file_name
	 * @param	string	$area
	 * @return	void
	 */
	public static function load($file_name, $area = 'application')
	{
		static::$data[$file_name] = include( area($area) . 'config' . DS . $file_name . EXT );
	}
	
	/**
	 * Gets a conifguration item by key
	 *
	 * Example:
	 * 		Config::get('example', 'hello');
	 *		-> /config/example.php => ['hello']
	 *
	 * @param	dynamic
	 * @return	mixed
	 */
	public static function get()
	{
		$args = func_get_args(); // Get the function arguments
		$config = static::$data;
		
		// Loop through each argument
		foreach( $args as $arg )
		{
			$config = $config[$arg]; // Get the next piece
		}
		
		return $config;
	}

}