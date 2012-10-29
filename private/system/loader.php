<?php

class Loader
{

	protected static $loaded = array(); // The class files that have been loaded

	/**
	 * Loads a specific file in an area
	 *
	 * @param	string	$area
	 * @param	string	$file
	 * @return	void
	 */
	public static function load($area, $file)
	{
		require_once( area($area) . $file . EXT );
		
		if(class_exists($file))
		{
			static::$loaded[] = $file;
		}
	}
	
	/**
	 * Gets all the loaded files (array)
	 *
	 * @return	array
	 */
	public static function loaded()
	{
		return static::$loaded;
	}

}