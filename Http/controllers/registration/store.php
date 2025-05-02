<?php


use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];

$password = $_POST['password'];

// validate the form inputs
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 8, 255)) {
    $errors['password'] = 'Password must be at least 8 characters.';
}

if (!empty($errors)) {
    // if there are errors, redirect back to the registration form with the errors
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
    exit();
}


// check if the account already exists

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // if the user exists, then someone already registered with this email
    redirect('/');
} else {

// if the user does not exist, then create a new user
    $db->query('insert into users (email, password) values (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);



    (new Authenticator())->login([
        'email' => $email
    ]);

   redirect('/');

}






