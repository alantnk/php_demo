<?php

use Core\App;
use Core\Database;
use Core\Validator;

$currentUserId = 2;


$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id'],

])->findOrFail();

authorize($note['user_id'] === $currentUserId);
$errors = [];

if (! Validator::string($_POST['body'], 1, 500)) {
    $errors['body'] = 'Body can not be empty or exceed 500 characters.';
}

if (count($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Edit note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);

header('location: /notes');
die();
