<?php

use Core\Response;

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404) {
    http_response_code($code);
    require base_path("views/$code.php");
    exit();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}





// PHP Superglobals Referenz:

// 1. $_SERVER: Infos zu Server, URL und Request
// Beispiel: Aktuelle URL erhalten
// $currentUrl = $_SERVER['REQUEST_URI'];

// 2. $_GET: URL-Parameter (z.B. ?name=Max)
// Beispiel: URL-Parameter abrufen
// $name = $_GET['name'];

// 3. $_POST: Daten aus Formularen (bei POST-Methode)
// Beispiel: Formularfeld abrufen
// $email = $_POST['email'];

// 4. $_SESSION: Daten, die zwischen mehreren Seitenaufrufen gespeichert werden
// Beispiel: Wert in Session speichern und abrufen
// $_SESSION['user_id'] = 123;
// $userId = $_SESSION['user_id'];

// 5. $_COOKIE: Zugriff auf gespeicherte Cookies
// Beispiel: Cookie abrufen
// $loginToken = $_COOKIE['login_token'];

// 6. $_FILES: Infos über hochgeladene Dateien
// Beispiel: Name der hochgeladenen Datei abrufen
// $filename = $_FILES['my_file']['name'];


