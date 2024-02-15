<?php
require_once(__DIR__ . '/../../lib/base/model.php'); 

class ToDoModel extends Model{

    protected array $arrayTasks;

    //Metodos para decodificar el archivo json
    private function loadData() { 
        $arrayTasks = json_decode(file_get_contents(__DIR__ . '/db/task.json')); //leo el archivo JSON
        return $this->arrayTasks = $arrayTasks; //Se decodifica el JSON y se devuelve el array
    }
    //CRUD
    //metodo crear tarea
    public function createTask($newTask){
        //primero convertir json en array (load data)
        $arrayTasks = $this->loadData();
        $newTask = [
            "taskId"=>$task->getTaskId(), 
            "taskName"=>$task->getTaskName(), 
            "createdBy"=>$task->getCreatedBy(), 
            "creationDate"=>$task->getCreationDate(), 
            "deadline"=>$task->getDeadline(), 
            "taskStatus"=>$task->getTaskStatus()
        ];
        $arrayTasks[]= $newTask; //agrego la nueva tarea
        $this->saveData($arrayTasks);       
    }

    //Metodo para obtener una tarea a traves de su id
    public function fetchOne($id) {
        $arrayTasks = $this->loadData(); //Se carga el archivo JSON
        foreach ($arrayTasks as $task) { //Se recorren todas las tareas, tarea por tarea
            if ($task['taskId'] == $id) { //Si se encuentra una tarea con el ID proporcionado
                return $task; // Se devuelve la tarea encontrada
            }
        }
        return "Impossible to find task id."; //En caso contrario se devuelve mensaje
    }
    //Metodo SaveTask
    public function save($task){
        $arrayTasks = $this->loadData(); //cargamos el archivo json primero
        $arrayTasks[]=$task; //agregamos la nueva task al array tasks
        $this->saveData($arrayTasks);// Se guarda el arreglo actualizado de tareas en el archivo JSON

    }
   
    //Metodo Delete Task por su id
    public function delete(int $taskId){
        $arrayTasks = $this->loadData();
        //inicicacion de variable
        $found = false;
        foreach($arrayTasks as $key => $task){
            if($task['ID']== $id){
                unset($arrayTasks[$key]); 
                $arrayTasks = array_values($arrayTasks);
                $this->saveData($arrayTasks);
                $found = true; //si se encuentra el id, found pasa a true
                break; 
            }
        }
        if (!$found) {
            return "Impossible to find task id.";//En caso contrario se devuelve mensaje
        }
        
    }
   
    //Metodos para codificar el archivo json actualizado
    private function saveData($data) { 
        file_put_contents(__DIR__ . '/db/task.json', json_encode($data, JSON_PRETTY_PRINT)); //Se pasa del array al json 
    }
}
















}