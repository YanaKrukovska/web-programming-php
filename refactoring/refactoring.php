<?php

require __DIR__ . '/vendor/autoload.php';
include_once("Book.php");

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('./templates');
$twig = new Environment($loader);

$books = array();

$result = getData();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($books, new Book($row["author"], $row["title"], $row["releaseYear"]));
    }
} else {
    echo "0 results";
}

echo $twig->render('index.twig', ['books' => $books]);

function getData()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "mysql";

    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `books`";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}
