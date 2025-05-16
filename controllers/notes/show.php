<?php

$currentUserId = 2;
$config = require base_path("config.php");
$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id', [
    "id" => $_GET['id'],

])->find();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", ['heading' => 'Note', 'note' => $note]);
