<?php
require_once __DIR__ . "/../Config/Database.php";

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use Config\Database; 


function testShowTodolist(): void
{   
    $db = Database::getConnection();

    $todoListRepository = new TodolistRepositoryImpl($db);

    $todoListService = new TodolistServiceImpl($todoListRepository);

    // $todoListService->addTodolist("Belajar PHP Dasar");
    // $todoListService->addTodolist("Belajar PHP OOP");   
    // $todoListService->addTodolist("Belajar PHP Web");
    
    // $todoListService->updateTodolist(1,"Updated PHP");

    $todoListService->showTodolist();


}

function testAddTodolist(): void
{   
    $db = Database::getConnection();

    $todoListRepository = new TodolistRepositoryImpl($db);

    $todoListService = new TodolistServiceImpl($todoListRepository);

    $todoListService->addTodolist("Belajar PHP Dasar");
    $todoListService->addTodolist("Belajar PHP OOP");   
    $todoListService->addTodolist("Belajar PHP Web");
    
    // $todoListService->updateTodolist(1,"Updated PHP");

    // $todoListService->showTodolist();


}


function testRemoveTodolist(): void
{
    $db = Database::getConnection();
    
    $todoListRepository = new TodolistRepositoryImpl($db);

    $todoListService = new TodolistServiceImpl($todoListRepository);

    // $todoListService->addTodolist("Belajar PHP Dasar");
    // $todoListService->addTodolist("Belajar PHP OOP");   
    // $todoListService->addTodolist("Belajar PHP Web");
    

    // $todoListService->showTodolist();

    $todoListService->removeTodolist(1);
    $todoListService->removeTodolist(3);
    $todoListService->removeTodolist(2);


}


function testUpdateTodolist(): void
{
    $db = Database::getConnection();

    $todoListRepository = new TodolistRepositoryImpl($db);

    $todoListService = new TodolistServiceImpl($todoListRepository);

    // $todoListService->addTodolist("Belajar PHP Dasar");
    // $todoListService->addTodolist("Belajar PHP OOP");   
    // $todoListService->addTodolist("Belajar PHP Web");
    
    // $todoListService->updateTodolist(1,"Updated PHP");

    $todoListService->showTodolist();

    $todoListService->updateTodolist(5,"Belajar sssss123");

    // $todoListService->showTodolist();


}


testUpdateTodolist();