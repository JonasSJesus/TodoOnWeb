<?php

use Todo\Entity\Task;

require_once 'Task.php';

$task = new Task('test', 'testando', 2, 'Estudo');
$task->setDueDate('2024-02-10');
$taskDate = $task->getDueDate();

$date = date('d/m/Y', strtotime($taskDate));
$timeStamp = date();

var_dump ($date);