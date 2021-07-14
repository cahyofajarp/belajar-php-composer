<?php

namespace Service {

    use Entity\Todolist;
    use Repository\TodolistRepository;
    
    interface TodolistService{

        function showTodolist():void;

        function addTodolist(string $todo): void;

        function updateTodolist(int $number,string $newTodo): void;

        function removeTodolist(int $number):void;
    }

    class TodolistServiceImpl implements TodolistService{
        
        private TodolistRepository $todoListRepository;

        public function __construct(TodolistRepository $todoListRepository)
        {
            $this->todoListRepository = $todoListRepository;
        }
        
        function showTodolist():void
        {
            echo 'TODOLIST' . PHP_EOL;
            // echo '<br>';
            $todoList = $this->todoListRepository->findAll();

            foreach($todoList as $no => $list){
                echo ($list->getId()).".".$list->getTodo() . PHP_EOL;
            }

        }

        function addTodolist(string $todo): void
        {
            $todolist = new Todolist($todo);

            $this->todoListRepository->save($todolist);

            echo "Your data has been added in Database" . PHP_EOL;
        }

        function updateTodolist(int $number,string $newTodo): void
        {

            $todolist = new Todolist($newTodo);

            $success = $this->todoListRepository->update($number,$todolist);
            
            if($success){
                echo "Your data has been updated in Database" . PHP_EOL;
            }else{
                echo "There is no number $number" . PHP_EOL;
            }
        }
        
        function removeTodolist(?int $number):void
        {
            if($this->todoListRepository->remove($number)){
                echo "Sukses Menghapus Todolist" .PHP_EOL;
            }
            else if(is_null($number)){
                echo "Data Tidak boleh kosong" . PHP_EOL;
            }
            else{
                echo "Data Tidak ada" .PHP_EOL;
            }
        }

        function data():void
        {

        } 
    }
}

