<?php

class God //Без конструктора
{
    public $name;
    public $power;

    public static $creatures = 0;

    public function create($anything)
    {
        if ($this->power == "infinity") {
            self::$creatures++;
            echo self::$creatures . "{$this->name} create {$anything}<br>";
        } else {
            echo "{$this->name} can't create {$anything}<br><br>";
        }
    }
}

class Animal //Создание с конструктором
{
    public $name;
    public $forse;
    public $atrocity;
    public $sound;

    function __construct($name, $forse, $atrocity, $sound)
    {
        $this->name = $name;
        $this->forse = $forse;
        $this->atrocity = $atrocity;
        $this->sound = $sound;
    }

    function voice()
    {
        echo "<br>$this->sound! I'am $this->name, $this->atrocity and $this->forse!!!<br><br>";
    }
}

class Human extends God //Наследование
{
    public $proud;
    public static $destroy = 0;
    protected $innerAnimal = null;
    function __construct()
    {
        $this->innerAnimal = new Animal("beast", "terrible", "cruel", "Oh my God");
    }
    function __call($funcName, $arg)
    {
        $this->innerAnimal->$funcName($arg); //Псевдонаследование от класса Animal
    }

    function destroy($anything){
        if($this->proud == "proud"){
            self::$destroy++;
            echo self::$destroy . " $this->name destroy $anything<br>";
        }
    }
    function say(){
        echo "<br>I'am $this->name, $this->power but $this->proud<br><br>";
    }

}


$god = new God();
$god->name = "GOD";
$god->power = "infinity";
$god->create("lignt");
$god->create("earth");
$god->create("plants");
$god->create("animals");

$dog = new Animal("dog", "strong", "brutal", "vuf-vuf");
$dog->voice();

$god->create("human");

$human = new Human();
$human->power = "week";
$human->name = "Adam";
$human->proud = "proud";
$human->say();
$human->create("animals");
$human->destroy("animals");
$human->destroy("plants");
$human->destroy("earth");
$human->voice();
echo "<br><br>";


echo "<br>-----------------------task 5---------------<br>";
//Дан код:Что он выведет на каждом шаге? Почему?
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A(); //Не выведет ничего, мы просто создали объект
$a2 = new A(); //Не выведет ничего, мы просто создали второй объект
$a1->foo(); //Вызвав функцию foo мы создаём статическую переменную x, принадлежащую этому классу,
//увеличиваем её на 1, а затем выводим на экран
$a2->foo(); //Выведет 2
//Статическая переменная принадлежит классу, а не объекту, а потому возрестёт и при вызове функции foo в другом объекте
$a1->foo(); //выведет 3
$a2->foo(); //выведет 4

echo "<br>-----------------------task 6---------------<br>";
//Немного изменим п.5:
//Объясните результаты в этом случае.
class C {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class D extends C {
}
$a1 = new C();
$b1 = new D(); //Код объектов А и В идентичен, но это разные классы
$a1->foo(); //выведет 1
$b1->foo(); //тоже выведет 1, т.к. у другого класса свои статические переменные
$a1->foo(); //выведет 2
$b1->foo(); //выведет 2

echo "<br>-----------------------task 7---------------<br>";

//7. *Дан код:
//Что он выведет на каждом шаге? Почему?
class E {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class F extends E {
}
$a1 = new E; //Вся разница что я вижу - отсутствие круглых скобок при создании объекта.
//Поскольку мы не передаём никаких параметров в функцию-конструктор это ни на что не влияет.
// Задание не понял, может где-то ошибка?
$b1 = new F;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
//Данное
