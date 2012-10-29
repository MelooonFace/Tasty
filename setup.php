<?php

/**
 * Tasty - Project Om Nom^2
 * A PHP Framework
 *
 * @version 1.0.1
 * @author Jacob Christian Marshall <jacob.christian.marshall@gmail.com>
 */


// The system directory...
$_areas['system'] = 'private/system';

// The application directory...
$_areas['application'] = 'private/application';

// The public directory...
$_areas['public'] = 'public';


/* WARNING: Everything below this should not be touched */

// Lets set our root directory here...
chdir(__DIR__);

// Define the directory separator shortcut
define('DS', DIRECTORY_SEPARATOR);

// Define the php file extension shortcut
define('EXT', '.php');

// Define the space shortcut
define('SPACE', ' ');

/**
 * Sets an area to be later used globally
 *
 * @param	string	$name
 * @param	string	$path
 * @return	void
 */
function set_area($name, $path)
{
	if( ! isset($GLOBALS['tasty_areas'][$name]) )
		$GLOBALS['tasty_areas'][$name] = $path;
}

/**
 * Gets the file path of a defined area
 *
 * @param	string $name
 * @return	string
 */
function area($name)
{
	return $GLOBALS['tasty_areas'][$name];
}

// Loops through all of the paths and sets the accordingly
foreach( $_areas as $name => $path )
{
	set_area($name, realpath($path) . DS);
}

// Get rid of all evidence we were here...
unset($_areas);

require_once( area('system') . 'tasty.php' );