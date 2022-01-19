<?php

interface Go
{
    public static function go();
}
interface GoBack
{
    public static function goBack();
}
interface Action
{
    public function action();
}
interface Signal
{
    public static function signal();
}
interface Wipers
{
    public static function wipers();
}

abstract class Technic implements Go, GoBack, Action, Signal, Wipers
{
    public static function go()
    {
        echo 'еду вперёд' . "<br>";
    }
    public static function goBack()
    {
        echo 'еду назад' . "<br>";
    }
    public function action()
    {
        echo $this->action . "<br>";
    }
    public static function signal()
    {
        echo 'биб-бип' . "<br>";
    }
    public static function wipers()
    {
        echo 'мою стекло' . "<br>";
    }
}

class Car extends Technic
{
    protected static $type = 'машина';
    protected $action = 'турбо-ускорение';
    protected $individual = 'могу ездить на спирте';
    public function actionTechnic()
    {
        $this->action();
    }
    public function individual()
    {
        echo $this->individual . "<br>";
    }
}

class Excavator extends Technic
{
    protected static $type = 'экскаватор';
    protected $action = 'машу ковшом';
    protected $individual = 'умею закапываться в землю за минуту';
    public function actionTechnic()
    {
        $this->action();
    }
    public function individual()
    {
        echo $this->individual . "<br>";
    }
}

$car1 = new Car();
$go1 = 1;
$car2 = new Excavator();
$go2 = -2;

function testTechnic($technic, $go)
{
    $go > 0 ? $technic::go() : $technic::goBack();
    $technic->actionTechnic();
    $technic::signal();
    $technic::wipers();
    $technic->individual();
    echo "<br>";
}

testTechnic($car1, $go1);
testTechnic($car2, $go2);
