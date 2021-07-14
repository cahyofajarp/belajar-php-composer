<?php

require_once __DIR__. "/../Entity/Todolist.php";
require_once __DIR__. "/../Repository/TodolistRepository.php";
require_once __DIR__. "/../Service/TodolistService.php";
require_once __DIR__. "/../view/TodolistView.php";
require_once __DIR__. "/../Helper/InputHelper.php";


Use Entity\Todolist;
use View\TodolistView;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testViewShowTodoList():void
{
    $todoListRepository = new TodolistRepositoryImpl;
    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListView = new TodolistView($todoListService);

    
    $todoListService->addTodolist("Belajar PHP Dasar");
    $todoListService->addTodolist("Belajar PHP OOP");   
    $todoListService->addTodolist("Belajar PHP Web");
    

    $todoListView->showTodolist();
}


function testViewAddTodoList():void
{
    $todoListRepository = new TodolistRepositoryImpl;

    $todoListService = new TodolistServiceImpl($todoListRepository);

    $todoListView = new TodolistView($todoListService);

    
    // $todoListService->addTodolist("Belajar PHP Dasar");
    // $todoListService->addTodolist("Belajar PHP OOP");   
    // $todoListService->addTodolist("Belajar PHP Web");
    
    $todoListView->addTodoList();

    $todoListService->showTodolist();
}

function testViewRemoveTodoList():void
{
    $todoListRepository = new TodolistRepositoryImpl;

    $todoListService = new TodolistServiceImpl($todoListRepository);

    $todoListView = new TodolistView($todoListService);

    
    $todoListService->addTodolist("Belajar PHP Dasar");
    $todoListService->addTodolist("Belajar PHP OOP");   
    $todoListService->addTodolist("Belajar PHP Web");
    
    $todoListService->showTodolist();
    
    $todoListView->removeTodoList();

    $todoListService->showTodolist();
}

testViewRemoveTodoList();