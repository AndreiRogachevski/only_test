<?php
session_start();
include_once 'includes/header.php';
include 'functions.php';

if (isset($_POST)) {
  $header = 'Location: /profile.php';
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
  } else {
    $user = [
      'name' => $_POST['name'],
      'phone' => $_POST['phone'],
      'email' => $_POST['email'],
      'password' => $_POST['password']
    ];
    $res = updateUser($user, $_SESSION['token']);
    $result = login([$user['phone'], $user['password']]);

    foreach ($result as $key => $value) {
      $_SESSION[htmlspecialchars($key)] = htmlspecialchars($value);
    }

    header('Location: /profile.php?success='.$res);
  }
}

include_once 'includes/footer.php';
