<?php
$config = require('config.php');
$heading = "Create a Note";
$db = new Database($config['database']);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'A body is required';
    }

    if (strlen($_POST['body']) > 500) {
        $errors['body'] = 'The body can not be more than 500 characters';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes.notes (body, user_id) VALUES(:body, :user_id)", [
            "body" => $_POST['body'],
            "user_id" => 2
        ]);
    }
}
require 'views/note-create.view.php';
