<?php
include_once 'includes/header.php';
include 'database.php';
include 'functions.php';

if (isset($_POST)) {
  $header = 'Location: /registration.php';
  if (
    empty($_POST['name']) ||
    empty($_POST['phone']) ||
    empty($_POST['email']) ||
    empty($_POST['password'])
  ) {
    header($header . '?error=Не все поля заполнены');
  } elseif (!is_numeric($_POST['phone'])) {
    header($header . '?error=Введите телефон в международном формате');
  } elseif ($_POST['password'] !== $_POST['confirmPassword']) {
    header($header . '?error=Пароли не совпадают');
  }
  $user = [
    'name' => $_POST['name'],
    'phone' => $_POST['phone'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
  ];
  $res = createUser($user);
  echo "<h1 class='text-center'>$res</h1";
}

include_once 'includes/footer.php';
