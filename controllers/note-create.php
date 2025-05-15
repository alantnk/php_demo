<?php
$config = require('config.php');
$heading = "Create a Note";
$db = new Database($config['database']);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];


    if (! Validator::string($_POST['body'], 500)) {
        $errors['body'] = 'Body can not be empty or exceed 500 characters.';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes.notes (body, user_id) VALUES(:body, :user_id)", [
            "body" => $_POST['body'],
            "user_id" => 2
        ]);
    }
}
require 'views/note-create.view.php';
