<?php
interface VideoServiceInterface {
    public function getEMBED();
}

class Youtube implements VideoServiceInterface {
    
    private $url;

    public function __construct($url) {
        $this->url = $url;
    }

    public function getEMBED() {
        return "<iframe>". $this->url. "</iframe>";
    }

}

class Vimeo implements VideoServiceInterface {
    
    private $url;

    public function __construct($url) {
        $this->url = $url;
    }

    public function getEMBED() {
        return "<video>". $this->url. "</video>";
    }

}

class Wistia implements VideoServiceInterface {
    
    private $url;

    public function __construct($url) {
        $this->url = $url;
    }

    public function getEMBED() {
        return "<coisa>". $this->url. "</coisa>";
    }

}

class Aula {

    private $video;

    public function __construct(VideoServiceInterface $video) {
        $this->video = $video;
    }

    public function getVideoHTML() {
        return $this->video->getEMBED();
    }

}

$Aula = new Aula(new Wistia('url/123'));

echo "HTML: ". $Aula->getVideoHTML();



?>