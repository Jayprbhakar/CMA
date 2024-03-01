<?php

    echo "hello php";

    #data type

    $check = "money";
    echo "<br>";

    var_dump($check); #check data type and values
    echo "<br>";

    $intro = 9;
    var_dump($intro);
    echo "<br>";

    $pint = 23.1;
    var_dump($pint);
    echo "<br>";

    $vd4 = false;
    var_dump($vd4);
    echo "<br>";

    #array store multiple values in a single var
    $listName = array('Hooked','Indispesable leadership skills','Atomic Habit',23,90.23);
    var_dump($listName);

    echo "<br>";

    #php objects
    class bike {
        #properies
        public $engine;
        public $color;
        public $speed;
        public $brand;
        public function __construct($color, $speed) {
            return this->$color;

        }
    }


    #Null value
    $confirm = "";

    var_dump($confirm); 





?>