<?php

class Facebook {

    public function createPost() {
        return new Post();
    }

}

class Post {

    private $author, $message;

    public function __get($attr) {
        return $this->$attr;
    }
    public function __set($attr, $val) {
        $this->$attr = $val;
    }

}


?>