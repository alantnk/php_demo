<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 6, 12)) {
    $errors['password'] = 'Please provide a password of at least six characters.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    Session::flash('errors', ['email' => 'This email is already in use.']);
    redirect("/register");
} else {
    $user = $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    (new Authenticator)->login(['email' => $email, 'id' => $user['id']]);

    redirect("/");
}
