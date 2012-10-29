<?php

/**
 * Tasty - Project Om Nom^2
 * A PHP Framework
 *
 * @version 1.0.1
 * @author Jacob Christian Marshall <jacob.christian.marshall@gmail.com>
 */


// Load up the loader, how ironic...
require_once( area('system') . 'loader.php' );

// Load the test (system) class
Loader::load('system', 'test');

// All the core classes to be loaded into memory
$classes = array(
	array(
		'system',
		'config'	// The config loader
	),
	array(
		'system',
		'route'		// The routing engine
	),
	array(
		'system',
		'request'	// The request class
	),
	array(
		'system',
		'response'	// The response class
	),
	array(
		'system',
		'event'		// The event class
	),
	array(
		'system',
		'view'		// The view helper class
	),
);

// Loop through all the core class'
foreach($classes as $info)
{
	Loader::load($info[0], $info[1]); // Load the file into the loader
}

unset($classes); // Get rid of that...

// All the 'pre loaded' configuration files
$configs = array(
	array(
		'status_code',
		'system'
	),
	array(
		'example',
		'application'
	),
);

// Look through each config and load them
foreach($configs as $config)
{
	Config::load($config[0], $config[1]);
}

unset($configs); // Get rid of this too...

// Load the Application setup
require_once( area('application') . 'setup.php' );

// Load the Application routing logic
require_once( area('application') . 'routes.php' );

// Handle the route
Route::call();

// Handle the repsonse
Response::respond();