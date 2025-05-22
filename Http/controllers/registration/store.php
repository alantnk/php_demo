<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form inputs
$errors = [];
if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($password, 6, 12)) {
    $errors['password'] = 'Please provide a 6-12 length password.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}



// Check if the resource already exists

$user = $db->query('select * from users where email = :email', ['email' => $email])->find();
if ($user) {
    // If yes, redirect to login page
    header('location: /');
    die();
} else {
    // If not, save one to the database, then log user in, and the redirect
    $db->query('INSERT INTO notes.users (email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);
    header('location: /');
    die();
}
