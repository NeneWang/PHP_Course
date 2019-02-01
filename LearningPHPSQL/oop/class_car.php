<?php
class Car{
    
    public $wheels=4;
    protected $hood=1; // Only available to this class oh its inheritance
    private $engine=1; // Only for this class, but not for the inheritance
    static $doors =4;
    
    function MoveWheels(){
     $tmpWheels=$this->wheels;
    echo "<br>THe ". strval($tmpWheels) ." Wheels move!";
        echo "<br> but 1 will got broken";
        $this->wheels = $tmpWheels-1;
        echo "<br> so there are ".$this->wheels." now... ";
    }
    
}

class Plane extends Car{
    function fly(){
        echo "<br>Its flying! <3";
    }
}

class customCar extends Car{
    function __construct($x){
        echo "<br>".$this->wheels=$x;
    }
    
    function ChangeStaticDoorsByInt($newDoorsVal){
        Car::$doors=$newDoorsVal;
        echo "<br>Quantitie of doors changed to : ". Car::$doors;
    }
}

//echo $myCar->doors; //This leads to an error
echo Car::$doors;
$myCar = new customCar(23);
$myCar->ChangeStaticDoorsByInt(2);
echo "<br>".Car::$doors;

?>