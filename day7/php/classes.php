<?php 
// Create a university
$apu = new University("APU");

// Create a class
$webDevelopmentClass = new Classroom("Web Development Class");
$phpClass = new Classroom("PHP Development Class");

// Add the class to the university
$apu->addClass($webDevelopmentClass);
$apu->addClass($phpClass);

// Create students
$john = new Student("John", $apu);
$alice = new Student("Alice", $apu);
$user1 = new Student("User1", $apu);

// Enroll students in the class
$webDevelopmentClass->enrollStudent($john);
$webDevelopmentClass->enrollStudent($alice);
$webDevelopmentClass->enrollStudent($user1);
$phpClass->enrollStudent($alice);
echo "University: " . $apu->name . "<br>";
echo "Classes in " . $apu->name . ":<br>";

foreach ($apu->classes as $class) {
    echo "- " . $class->name . "<br>";
    echo "  Students enrolled:<br>";
    foreach ($class->students as $student) {
        echo "  - " . $student->name . "<br>";
    }
}


















class University {
    public $name;
    public $classes = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addClass($class) {
        $this->classes[] = $class;
    }
}



class Classroom {
    public $name;
    public $students = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function enrollStudent($student) {
        $this->students[] = $student;
    }
}


class Student {
    public $name;
    public $university;

    public function __construct($name, $university) {
        $this->name = $name;
        $this->university = $university;
    }
}


