<?php 

namespace BekEnd;

class Helper{

    // private static ?string $result; 

    // static function checkGenap(?int $no) : string
    // {
    //     if($no % 2 == 0){
    //         self::$result = 'Genap';

    //         return self::$result;
    //     }
    // }
    
    private string $name;
    private string $result;

    public function SayHello(string $name):string
    {
        $this->name = $name;

        return 'Hello, ' .$this->name;
    }

    public function checkGenap(?int $no): string
    {
        if($no % 2 == 0){
            $this->result = 'Genap';

            return $this->result;
        }
    }

}



// $data = new Helper;


// echo Helper::checkGenap(10);

