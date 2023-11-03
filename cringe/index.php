<?php
include 'basedata/bd.php';
var_dump($conn);
$path= $_SERVER['REQUEST_URI'];
$command=explode('/',$path);
match ($command[3]) {
    '' => include 'laouts/main.php',
    'about' => include 'laouts/about.php',
    'story' => include 'laouts/story.php',
    default => include 'laouts/error.php',
};

