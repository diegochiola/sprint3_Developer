<?php
require_once(__DIR__ . '/../../lib/base/model.php'); 
require_once(__DIR__ . '/../../enum/enum_status.php'); 

//llamamos al archivo model.php dentro de base para implementar metodos de este archivo

class TaskModel extends Model{
    
    //Atributos
    protected int $taskId;
    protected string $taskName;
    protected string $createdBy;
    protected string $creationDate;
    protected string $deadline;
    protected TaskStatus $taskStatus;


    //metodo Constructor
    public function __construct(int $taskId, string $taskName, string $createdBy, string $creationDate, string $deadline, TaskStatus $taskStatus){
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->createdBy = $createdBy;
        $this->creationDate = $creationDate;
        $this->deadline = $deadline;
        $this->taskStatus= $taskStatus;
    }
    
    //definicion de metodos getter/setter
    public function getTaskId(): int {
        return $this->taskId;
    } 
    public function setTaskId(int $taskId){
        $this->taskId = $taskId;
    }
   
    public function getTaskName(): string{
        return $this->taskName;
    }
    public function setTaskName(string $taskName){
        $this->taskName = $taskName;
    }

    public function getCreationDate(): string{
        return $this->creationDate;
    }
    public function setCreationDate($creationDate){
        $this->creationDate = $creationDate;
    }

    public function getDeadline(): string{
        return $this->deadline;
    }
    public function setDeadline($deadline){
        $this->deadline = $deadline;
    }

    public function getTaskStatus(): TaskStatus{
        return $this->taskStatus;
    }
    public function setTaskStatus(TaskStatus $taskStatus){
        $this->taskStatus = $taskStatus;
    }

    //metodo crear tarea
    public function createTask($newTask){
        //primero convertir json en array (load data)
        $arrayTasks = $this->loadData();
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
        return "Impossible to find task id."; //En caso contrario se devuelve mensaje
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
                unset($arrayTasks[$key]); 
                $arrayTasks = array_values($arrayTasks);
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







