<?php

// require_once __DIR__ ."/vendor/autoload.php";

// use BekEnd\Helper;

// $hai = new Helper;

// echo $hai->SayHello('Fajar');

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;
use Config\Database;


require_once __DIR__ ."/Config/Database.php";
require_once __DIR__ ."/Entity/Todolist.php";
require_once __DIR__ ."/Helper/InputHelper.php";
require_once __DIR__ ."/Service/TodolistService.php";
require_once __DIR__ ."/Repository/TodolistRepository.php";
require_once __DIR__ ."/view/TodolistView.php";

echo 'Aplikasi Todolist' .PHP_EOL;

$todolistRepository = new TodolistRepositoryImpl(Database::getConnection());

$todoListService = new TodolistServiceImpl($todolistRepository);

$todolistView = new TodolistView($todoListService);

$todolistView->showTodolist();
