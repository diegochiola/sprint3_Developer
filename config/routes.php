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
    '/' => 'task#index', // Ruta a página de inicio de tareas
    '/create_task' => 'task#create_task', // Ruta crear una nueva tarea
    '/delete_task' => 'task#delete_task', // Ruta para eliminar una tarea
    '/update_task' => 'task#update_task', // Ruta para actualizar una tarea
    '/read_task' => 'task#read_task' // Ruta para leer una tarea
    
);
