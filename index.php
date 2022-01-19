<?php

interface Go {public function go();}
interface GoDown {public function goDown();}
interface Action{public function action();}

abstract class Technic implements Go, GoDown, Action
{
    public function go()
    {echo 'еду вперёд';}

    public function goDown()
    {echo 'еду назад';}

    public function action()
    {echo 'что-то делаю';} 
}

class Car extends Technic
{
    public function goCar() {$this->go();}
    public function actionCar() {$this->action();}
}


class Excavator extends Technic
{
    public function goCar() {$this->go();}
    public function actionCar() {$this->action();}
}



$car = new Car();

function testTechnic(Car $car) {
    $car->goCar();
    $car->actionCar();

}

testTechnic($car);
