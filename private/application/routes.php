<?php

/**
 * Route Handling, handles specific registered requests...
 */

Route::register('GET', '/home', function ()
{
	return View::render('home.index');	
});


/**
 * Event Handling, handles specific events, when called by system logic...
 */

Event::handle('404', function ()
{
	Response::status(404);
	return View::render('errors.404');
});