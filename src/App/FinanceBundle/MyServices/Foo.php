<?php
namespace App\FinanceBundle\MyServices;

class Foo {
    
    public $name = "Hello, Evgeniy!";
    
    public function send(){
        return $this->name;
    }
}
