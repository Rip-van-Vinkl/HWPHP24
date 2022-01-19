<?php

interface Go {public function go();}
interface GoBack {public function goBack();}
interface Action{public function action();}

interface Signal{public function signal();}
interface Wipers{public function wipers();}

abstract class Technic implements Go, GoBack, Action
{
    public function go()
    {echo 'еду вперёд';}

    public function goBack()
    {echo 'еду назад';}

    public function action()
    {echo $this->action;}

    public function signal()
    {echo 'биб-бип';}

    public function wipers()
    {echo 'мою стекло';}
}

class Car extends Technic
{
    protected $action = 'турбо-ускорение';
    protected $individual = 'могу ездить на спирте';
    public function goCar() {$this->go();}
    public function goBackCar() {$this->goBack();}
    public function actionCar() {$this->action();}

    public function signalCar() {$this->signal();}
    public function wipersCar() {$this->wipers();}
}

class Excavator extends Technic
{
    protected $action = 'машу ковшом';
    protected $individual = 'умею закапываться в землю за минуту';
    public function goExcavator() {$this->go();}
    public function goBackExcavator() {$this->goBack();}
    public function actionExcavator() {$this->action();}

    public function signalExcavator() {$this->signal();}
    public function wipersExcavator() {$this->wipers();}
}



$car1 = new Car();
$go1 = 1;
$car2 = new Excavator();
$go2 = -2;

function testTechnic($technic, $go){
    if ($technic instanceof Car) {
        if ($go > 0){
            $technic->goCar();
        } elseif ($go < 0) {
            $technic->goBackCar();
        } else {
            echo 'стоп машина';
        }
        $technic->actionCar();
        $technic->signalCar();
        $technic->wipersCar();

    } elseif ($technic instanceof Excavator) {
        if ($go > 0){
            $technic->goExcavator();
        } elseif ($go < 0) {
            $technic->goBackExcavator();
        } else {
            echo 'стоп машина';
        }
        $technic->actionExcavator();
        $technic->signalExcavator();
        $technic->wipersExcavator();

    } else {
        echo 'что-то пошло не так';
    }
}

testTechnic($car1, $go1);
testTechnic($car2, $go2);