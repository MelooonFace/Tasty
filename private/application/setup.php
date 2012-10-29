<?php

// Initiate the core classes
foreach(Loader::loaded() as $class)
{
	if( method_exists($class, 'init') )
		$class::init(); // Default initiate static method
}