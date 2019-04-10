<?php

class Character {
    private $properties;

    public function setProperty($pname, $pvalue) {
        $this->properties[$pname] = $pvalue;
    }
    public function getAllProperties() {
        return $this->properties;
    }
}

interface BuilderInterface {
    public function createCharacter();
    public function addHelmet();
    public function addWeapon();
    public function addBoots();
    public function getChacaracter();
}

class MarioBuilder implements BuilderInterface {
    private $character;

    public function createCharacter() {
        $this->character = new Character();
    }

    public function addHelmet() {
        $this->character->setProperty("helmet", "red");
    }

    public function addWeapon() {
        $this->character->setProperty("lefthand", "cloves");
        $this->character->setProperty("righthand", "cloves");
    }
    public function addBoots() {
        $this->character->setProperty("leftboot", "black boot");
        $this->character->setProperty("rightboot", "black boot");
    }
    public function getChacaracter() {
        return $this->character;
    }
}

class LuigiBuilder implements BuilderInterface {
    private $character;

    public function createCharacter() {
        $this->character = new Character();
    }

    public function addHelmet() {
        $this->character->setProperty("helmet", "green");
    }

    public function addWeapon() {
        $this->character->setProperty("lefthand", "cloves");
        $this->character->setProperty("righthand", "cloves");
    }
    public function addBoots() {
        $this->character->setProperty("leftboot", "white boot");
        $this->character->setProperty("rightboot", "white boot");
    }
    public function getChacaracter() {
        return $this->character;
    }
}

class Director {
    public function build(BuilderInterface $builder) {
        $builder->createCharacter();
        $builder->addHelmet();
        $builder->addWeapon();
        $builder->addBoots();
        return $builder->getChacaracter();
    }
}

$mario = (new Director())->build(new MarioBuilder());
$luigi = (new Director())->build(new LuigiBuilder());

print_r($mario->getAllProperties());
print_r($luigi->getAllProperties());

?>