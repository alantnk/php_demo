<?php

$currentUserId = 2;
$config = require "config.php";
$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id', [
    "id" => $_GET['id'],

])->find();

authorize($note['user_id'] === $currentUserId);

$heading = "Note";
require "views/notes/show.view.php";
