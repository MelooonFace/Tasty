<?php

class View
{

	/**
	 * Renders a view... well, returns it
	 *
	 * @param	string	$view
	 * @return	mixed
	 */
	public static function render($view)
	{
		$path = str_replace('.', DS, $view); // Handle 'pretty' paths
	
		ob_start(); // Start the render buffer
		
		// Include the file, letting the contents render, but not print
		include( area('application') . 'views' . DS . $path . EXT );
		
		return ob_get_clean(); // Return the contents of the view
	}

}