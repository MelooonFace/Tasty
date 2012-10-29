<?php

class Route
{

	protected static $routes = array(); // The route storage
	
	/**
	 * Registers a request closure to a specific route
	 *
	 * @param	string	$request_type
	 * @param	string	$request
	 * @param	Closure	$closure
	 */
	public static function register($request_type, $request, Closure $closure)
	{
		static::$routes[] = array(
			'type' => $request_type,
			'request' => $request,
			'closure' => $closure
		);
	}
	
	/**
	 * Gets the routes array (private)
	 *
	 * @return	array
	 */
	private static function routes()
	{
		return static::$routes;
	}
	
	/**
	 * Calls upon a request closure to excecute
	 *
	 * @param	string	$request
	 * @param	boolean	$auto
	 * @return	mixed
	 */
	public static function call($request = null, $auto = false)
	{
		$closure = null; // So we definatly catch a null if not selected
		
		foreach( static::routes() as $route )
		{
		
			/*
			 * If the request is specificly defined
			 */
			if( ! is_null($request) )
			{
				if($request == $route['request']) // The match/mismatch logic
				{
					$closure = $route['closure'];
					break;
				}
			}
			
			/*
			 * If we need to automaticly select the route
			 */
			else
			{
				if($route['request'] == Request::uri() && $route['type'] == Request::type()) // Select the default route
				{
					$closure = $route['closure'];
					break;
				}
			}
			
		}
		
		// If we catch a closure, make sure to excecute it
		if( ! is_null($closure) )
			$exc = $closure();
		
		// If not, get the 404 event handler
		else
			$exc = Event::call('404'); // 404 Not Found
		
		
		// Handle the reponse from the closure(s)
		if( ! is_null($exc) )
		{
			echo $exc;	// Echo out the contents of the closure,
						// because we know the route returned the contents
						// to display.
		}
		else
		{
			return $exc;
		}
	}

}