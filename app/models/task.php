<?php
require_once('lib/base/model.php'); 
//llamamos al archivo model.php dentro de base para implementar metodos de este archivo

class Task extends Model{
    
    //Atributos
    private $dataFile = 'data/tasks.json'; //donde ubicaremos el archivo json tasks

    //metodo Constructor
    public function __construct(){
        parent::__construct();
    } //lo dejamos vacio porque utilizaremos la conexion al archivo json
    
    //metodo crear tarea
    public function createTask($newTask){
        //primero convertir json en array (load data)
        $arrayTasks= $this->loadData();
        $arrayTasks[]= $newTask; //agrego la nueva tarea
        $this->saveData($arrayTasks);       
    }

    //Metodo para obtener una tarea a traves de su id
    public function fetchOne($id) {
        $arrayTasks = $this->loadData(); //Se carga el archivo JSON
        foreach ($arrayTasks as $task) { //Se recorren todas las tareas, tarea por tarea
            if ($task['ID'] == $id) { //Si se encuentra una tarea con el ID proporcionado
                return $task; // Se devuelve la tarea encontrada
            }
        }
        return null; //En caso contrario, se devuelve null
    }
    //Metodo SaveTask
    public function save($task){
        $arrayTasks = $this->loadData(); //cargamos el archivo json primero
        $arrayTasks[]=$task; //agregamos la nueva task al array tasks
        $this->saveData($arrayTasks);// Se guarda el arreglo actualizado de tareas en el archivo JSON

    }
   
    //Metodo Delete Task por su id
    public function delete($id){
        $arrayTasks = $this->loadData();
        foreach($arrayTasks as $key => $task){
            if($task['ID']== $id){
               unset($tasks[$key]); //se elimina mediante unset del arreglo tasks
               $arrayTasks = array_values($arrayTasks); // array values reorganiza indice
               $this->saveData($arrayTasks);
               return; 
            }
        }
    }
   
    //Metodos para codificar y decodificar el archivo json
   
    //metodo para cargar la data al archivo json
    private function loadData() { 
        $data = file_get_contents($this->dataFile); //leo el archivo JSON
        return json_decode($data, true); //Se decodifica el JSON y se devuelve el array
    }
    //metodo para guardar la data en el archivo JSON
    private function saveData($data) { 
        file_put_contents($this->dataFile, json_encode($data, JSON_PRETTY_PRINT)); //Se pasa del array al json 
    }
}







