<?php

require __DIR__ . '/vendor/autoload.php';
include_once("Book.php");
include_once("BookDao.php");

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('./templates');
$twig = new Environment($loader);

$bookDao = new BookDao();
$result = $bookDao->getData();

$books = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($books, new Book($row["author"], $row["title"], $row["releaseYear"]));
    }
}

echo $twig->render('index.twig', ['books' => $books]);

