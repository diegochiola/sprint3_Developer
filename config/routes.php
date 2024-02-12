<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
$routes = array(
	'/' => 'task#index',
	'/create_task' => 'task#create_task',
	'/delete_task' => 'task#delete_task',
	'/update_task' => 'task#update_task',
	'/read_task' => 'task#read_task',
);
