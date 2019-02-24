<?php
include_once '../model/User.php';

function login() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = User::findBy('username', $username);
    if($user['success']) {
        if ($user['results']) {
            $instance = $user['results'];
            if (password_verify($password, $instance['password'])) {
                setcookie('user', $username, time()+3600, "/");
                setcookie('password', $password, time()+3600, "/");
                header("location: /apply.php");
            }
        } else {
            $_SESSION['error'] = 'Incorrect username and/or password';
            header("location: /login.php");
        }
    }
}

function register() {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    //todo validation
    $data = [
        'username' => $username,
        'email' => $email
    ];
    $data['password'] = password_hash($password, PASSWORD_DEFAULT);
    $user = new User($data);
    if ($user->save($data)) {
        setcookie('user', $username, time()+3600, "/");
        setcookie('password', $password, time()+3600, "/");
        header("location: /apply.php");
        return;
    } else {
        $_SESSION['error'] = "We could not complete your registration. Please try later";
        header('location: /login.php#toregister');
    }
}

if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['form_type']) && ($_POST['form_type'] === "login")) {
        login();
    } else {
        register();
    }
} else {
    header("location: /login.php");
}