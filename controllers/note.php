<?php

$currentUserId = 2;
$config = require "config.php";
$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id', [
    "id" => $_GET['id'],

])->fetch();

if (! $note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}


$heading = "Note";
require "views/note.view.php";
