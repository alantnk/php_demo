<?php

$config = require "config.php";
$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id', ["id" => $_GET['id']])->fetch();



$heading = "Note";
require "views/note.view.php";
