<?php

interface HTMLElementInterface {
    public function render();
}

class Form implements HTMLElementInterface {
    private $elements;

    public function addElement(HTMLElementInterface $element) {
        $this->elements[] = $element;
    }

    public function render() {
        $html = "<form>";
        foreach($this->elements as $el) {
            $html .= $el->render();
        }
        $html .= "</form>";
        return $html;
    }
}

class Label implements HTMLElementInterface {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }
    
    public function render() {
        return "<label>". $this->text ."</label><br>";
    }
}

class InputText implements HTMLElementInterface {
    private $name, $type;

    public function __construct($name, $type = "text") {
        $this->name = $name;
        $this->type = $type;
    }
    
    public function render() {
        return "<input type='". $this->type ."' name='". $this->name ."'><br>";
    }
}

class SubmitButton implements HTMLElementInterface {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }
    
    public function render() {
        return "<input type='submit' value='". $this->text ."'><br>";
    }
}

?>