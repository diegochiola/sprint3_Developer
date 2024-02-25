<?php

require_once(__DIR__ . '/enum/enum_status.php'); 

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

    