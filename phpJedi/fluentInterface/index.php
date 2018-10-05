<?php

class Person {

    private $name, $lasname, $age;

    public function setName($n) {
        $this->name = $n;
        return $this;
    }
    public function setLastName($n) {
        $this->lastname = $n;
        return $this;
    }

    public function setAge($n) {
        $this->age = $n;
    }

    public function getFullName() {
        return $this->name." ". $this->lastname ." = ". $this->age. " years";
    }

}

$person = new Person();
$person->setName("Edinei")->setLastName("Rodrigues")->setAge(19);

echo "Nome: ". $person->getFullName();

?>