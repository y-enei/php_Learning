<?php

class User {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }

  public function sayHi() {
    echo "hi, i am $this->name!";
  }
}

class SuperUser extends User {
  public function sayHello(){
    echo "hello from SuperUser!";
  }
}

$tom = new User("Tom");
$tom->sayHi();

$bob = new SuperUser("Bob");
echo $bob->sayHi();
echo $bob->sayHello();
