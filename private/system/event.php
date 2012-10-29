<?php

class Event
{

	private static $events = array(); // The event storage array
	
	/**
	 * Registers a new event with an event name
	 *
	 * @param	string	$event_name
	 * @return	void
	 */
	public static function handle($event_name, Closure $closure)
	{
		static::$events[] = array(
			'event' => $event_name,	// Register the event by its name
			'closure' => $closure	// Asign a closure to excecute
		);
	}
	
	/**
	 * Returns the list of registered events
	 *
	 * @return	array
	 */
	private static function events()
	{
		return static::$events;
	}
	
	/**
	 * Calls a specific event by its event_name
	 *
	 * @param	string	$event_name
	 * @return	mixed
	 */
	public static function call($event_name)
	{
		foreach( static::events() as $event )
		{
			if( $event['event'] == $event_name )
			{
				$closure = $event['closure'];
				return $closure();
			}
		}
		
		return Exception('<b>Severe:</b> Event \'{$event_name}\' not registered.<br />');
	}

}