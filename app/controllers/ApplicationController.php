<?php
require_once(__DIR__ . '/../../models/TaskModel.php');
require_once(__DIR__ . '/../../models/ToDoModel.php');
require_once(__DIR__ . '/../../lib/base/Controller.php');

class ApplicationController extends Controller {
    
    private $toDo;

    public function __construct(){
        $this->toDo = new ToDoModel();
    }

    // Acciones 
    public function deleteTaskAction(){
        if(isset($_GET["taskId"])) {
            $taskId = $_GET["taskId"];
            $toDo = $this->toDo;
    
            $toDo->delete($taskId);
    
            header("location: tasksList_View"); // Redirige a la vista de lista de tareas
        } else {
            echo "ERROR";
        }    
    }

    public function insertTaskAction(){
        if (isset($_POST["taskName"], $_POST["createdBy"], $_POST["creationDate"], $_POST["deadline"], $_POST["taskStatus"])) {
            $taskName = $_POST["taskName"];
            $createdBy = $_POST["createdBy"];
            $creationDate = $_POST["creationDate"];
            $deadline = $_POST["deadline"];
            $statusTask = $_POST["taskStatus"];

            $toDo = $this->toDo;
            $toDo->createTask(new Task($taskName, $createdBy, $creationDate, $deadline, $statusTask));

            // Redirige a la página de listado de tareas con los nuevos datos insertados
            header("location: tasksList_View");
        } else {
            echo "All data is mandatory";
        }
    }

    public function updateTask_viewAction(){
        if (isset($_GET["taskId"])) {
            $taskId = $_GET["taskId"];
            $tasksFound = $this->toDo->fetchOne($taskId); 
                
            return $tasksFound; // Devuelve para su visualización y posible edición
        }
    }

    public function updateTaskAction(){
        if(isset($_POST["taskId"])){    
            $toDo = $this->toDo;
            // Los valores ingresados por la vista se recogen
            $taskId = (int) $_POST["taskId"]; // Hacer casting de string a int
            $taskName = $_POST["taskName"];
            $createdBy = $_POST["createdBy"];
            $creationDate = $_POST["creationDate"];
            $deadline = $_POST["deadline"];
            $taskStatus = $_POST["taskStatus"];
    
            $updatedTask = [
                "taskId" => $taskId,
                "taskName" => $taskName,
                "createdBy" => $createdBy,
                "creationDate" => $creationDate,
                "deadline" => $deadline,
                "taskStatus" => $taskStatus
            ];

            $toDo->updateTask($updatedTask);

            header("location: tasksList_View");// Redirige a la vista de lista de tareas
        }
    }
}
