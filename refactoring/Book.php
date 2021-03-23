<?php

class Book
{
    public $author;
    public $title;
    public $year;

    function __construct($author, $title, $year)
    {
        $this->author = $author;
        $this->title = $title;
        $this->year = $year;
    }
}