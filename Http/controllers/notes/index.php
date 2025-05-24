<?php

use Core\App;
use Core\Database;
use Core\Session;

$user = Session::get('user');
$db = App::resolve(Database::class);

$notes = $db->query(
    'select * from notes where user_id = :user_id',
    ['user_id' => $user['id']]
)->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
