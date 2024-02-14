<?php
require_once('app/models/task.php');

class ListTaskController{
  

    public function listTask(){
        $taskModel = new Task(); //instanciar la clase task
        return $taskModel->loadData(); //llamar al metodo load data para mostrar todas las tareas guardadas en el json
    }
}
?>