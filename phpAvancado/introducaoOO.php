<?php

class Post {
    private $titulo, $data, $corpo, $comentario, $qtdeComentario;

    public function __construct($titulo, $data) {
        $this->titulo = $titulo;
        $this->data = $data;
    }

    public function __get($prop) {
        return $this->$prop; 
    }
    public function __set($prop, $value) {
        $this->$prop = $value;
    }

    public function addComentario($msg) {
        $this->comentario[] = $msg;
        $this->incrementComentario();
    }
    public function getCountComentario() {
        return $this->qtdeComentario;
    }

    private function incrementComentario() {
        $this->qtdeComentario++;
    }
}

$post = new Post("Titulo da Postagem", "15/03/2018");

$post->addComentario("Teste");
$post->addComentario("Teste 2");
$post->addComentario("Teste 3");
$post->addComentario("Teste 4");
$post->addComentario("Teste 5");

echo $post->getCountComentario();

echo "Titulo: ".$post->__get("titulo").", Data da Postagem: ".$post->__get("data");

?>