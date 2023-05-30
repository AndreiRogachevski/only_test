<?php
session_start();
include_once 'includes/header.php';
include 'functions.php';

if (isset($_POST)) {
  if (
    empty($_POST['authData']) ||
    empty($_POST['authPassword'])
  ) {
    header('Location: /auth.php?error=Не все поля заполнены');
    exit;
  }
  $user = [
    'authData' => $_POST['authData'],
    'authPassword' => $_POST['authPassword']
  ];
  $result = login($user);
  if (is_string($result)) {
    header("Location: /auth.php?fail=$result");
  } else {
    foreach ($result as $key => $value) {
      $_SESSION[$key] = $value;
    }
    header('Location: /');
  }
}

include_once 'includes/footer.php';
