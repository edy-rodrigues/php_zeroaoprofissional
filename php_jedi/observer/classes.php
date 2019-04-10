<?php

class UsuarioObserver {

    public function update(Usuario $subject) {

        echo date("H:i")." - Alerta: Usuário alterado: ". $subject->getName();
        echo "<hr>";

    }

}

class Usuario {

    private $name, $observer = array();

    public function __construct($name) {
        $this->name = $name;
    }

    public function setName($name) {
        $this->name = $name;
        $this->notify();
    }

    public function getName() {
        return $this->name;
    }

    public function attach(UsuarioObserver $obs) {
        $this->observer[] = $obs;
    }

    public function detach(UsuarioObserver $obs) {
        foreach ($this->observer as $key => $value) {
            if($value == $obs) {
                unset($this->observer[$key]);
            }
        }
    }

    public function notify() {
        foreach ($this->observer as $o) {
            $o->update($this);
        }
    }

}

?>