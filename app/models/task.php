<?php
requiere_once('lib/base/model.php'); 
//llamamos al archivo model.php dentro de base para implementar metodos de este archivo

class Task extends Model{
   
    //Atributos
    private $dataFile = 'data/tasks.json'; //donde ubicaremos el archivo json tasks

    //metodo Constructor
    public function __construct(){} //lo dejamos vacio porque utilizaremos la conexion al archivo json
    //Metodo Save Task
    
    //Metodo para obtener una tarea a travez de su id
    public function fetchOne($id) {
        $tasks = $this->loadData(); //Se carga el archivo JSON
        foreach ($tasks as $task) { //Se recorren todas las tareas, tarea por tarea
            if ($task['ID'] == $id) { //Si se encuentra una tarea con el ID proporcionado
                return $task; // Se devuelve la tarea encontrada
            }
        }
        return null; //En caso contrario, se devuelve null
    }
    
    public function saveTask(){}
    //Metodo Upload/Edit Task
    public function uploadTask(){}
    //Metodo Delete Task
    public function deleteTask(){}






}


