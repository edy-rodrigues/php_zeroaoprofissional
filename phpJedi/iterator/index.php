<?php
require_once "classes.php";

$book1 = new Book("Fulano1", "Livro Teste1");
$book2 = new Book("Fulano2", "Livro Teste2");
$book3 = new Book("Fulano3", "Livro Teste3");

$booklist = new BookList();
$booklist->addBook($book1);
$booklist->addBook($book2);
$booklist->addBook($book3);

while($booklist->valid()) {
    $livro = $booklist->current();

    echo "Titulo: ". $livro->getTitle(). " - ", $livro->getAuthor()."<br>";

    $booklist->next();
}

?>