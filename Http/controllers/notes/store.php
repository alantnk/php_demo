<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$user = Session::get('user');
$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['body'], 1, 500)) {
    $errors['body'] = 'Body can not be empty or exceed 500 characters.';
}

if (! empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create a Note',
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO notes.notes (body, user_id) VALUES(:body, :user_id)", [
    "body" => $_POST['body'],
    "user_id" => $user['id']
]);

redirect('/notes');
