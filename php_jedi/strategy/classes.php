<?php

interface OutputInterface {
    public function load($array);
}

class JsonOutput implements OutputInterface {
    public function load($array) {
        return json_encode($array);
    }
}

class ArrayOutput implements OutputInterface {
    public function load($array) {
        return $array;
    }
}

class Produto {

    private $array, $output;

    public function getLista() {
        $this->array = array(array("id" => 1, "nome" => "Edinei"), array("id" => 2, "nome" => "Bia"));
    }

    public function setOutput(OutputInterface $outputType) {
        $this->output = $outputType;
    }

    public function getOutput() {
        return $this->output->load($this->array);
    }

}

?>