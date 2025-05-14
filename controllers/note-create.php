<?php
$config = require('config.php');
$heading = "Create a Note";
$db = new Database($config['database']);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query("INSERT INTO notes.notes (body, user_id) VALUES(:body, :user_id)", [
        "body" => $_POST['body'],
        "user_id" => 2
    ]);
}
require 'views/note-create.view.php';
