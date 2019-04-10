<?php

abstract class AbstractFactory {
    abstract public function createPlayer($url);
}

abstract class Video {
    abstract public function render();
}

class HTMLFactory extends AbstractFactory {
    public function createPlayer($url) {
        return new HTMLPlayer($url);
    } 
}

class HTMLPlayer extends Video {
    private $url;

    public function __construct($url) {
        $this->url = $url;
    }

    public function render() {
        echo "<video>". $this->url ."</video>";
    }
}

class FlashFactory extends AbstractFactory {
    public function createPlayer($url) {
        return new FlashPlayer($url);
    }
}

class FlashPlayer extends Video {
    private $url;
    public function __construct($url) {
        $this->url = $url;
    }

    public function render() {
        echo "<object>". $this->url ."</object>";
    }
}

$fac = new FlashFactory();
// $fac = new HTMLFactory();
$player = $fac->createPlayer("123/url");
$player->render();

?>