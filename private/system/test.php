<?php

interface Initialisable
{

	// The init function
	static function init();

}

class Test implements Initialisable
{

	/**
	 * A simple 'Hello World' example
	 */
	public static function init()
	{
		// echo "Hello World!";
	}

}