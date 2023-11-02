<?php 

class Pet {

    public $name;

    public function __construct() {
    $this->name = "Cat";
    }
    public function  tellMeYourName() 
    {  

        print "My name is Meow.";
    }
    public function makeSound($sound) {
        print $sound;
    }
    public function __destruct() {}
}


class Cat extends Pet {



  /*  public function  tellMeYourName() 
    {  

        print "My name is Suzi.";
    }
    */
}
$myPet= new Cat();
//print $myPet->name;
print $myPet->tellMeYourName(); //? Meow  //Suzi  ?My Name is Suzi


$myPet= new Pet();
//print $myPet->name;
print $myPet->tellMeYourName(); //? Meow ?My Name is Suzi 


//$myPet->makeSound("Meow");




?>