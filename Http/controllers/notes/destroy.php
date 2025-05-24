<?php

use Core\App;
use Core\Database;
use Core\Session;

$user = Session::get('user');

$db = App::resolve(Database::class);



$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id'],

])->findOrFail();

authorize($note['user_id'] == $user['id']);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

redirect('/notes');
