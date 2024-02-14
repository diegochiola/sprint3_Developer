<?php
require_once('app/models/task.php');
require_once('lib/base/Controller.php');

class ReadTaskController extends Controller{
  

    public function readTask(){
        $this->init();
        $taskModel = new Task(); //instanciar la clase task
        $arrayTasks = $taskModel->loadData(); //cargar tareas
        
        $this->view->tasks = $arrayTasks; //se le designa a una variable d ela vista
        $this->view->render('task/tasks.php'); //renderizamos la vista
    }
}
?>
