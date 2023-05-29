<?php

function createUser($userInfo)
{
  global $link;

  $name = mysqli_real_escape_string($link, $userInfo['name']);
  $phone = mysqli_real_escape_string($link, $userInfo['phone']);
  $email = mysqli_real_escape_string($link, $userInfo['email']);
  $password = mysqli_real_escape_string($link, $userInfo['password']);

  $query = "SELECT * FROM users WHERE (name = '$name') OR (phone = '$phone') OR (email = '$email')";
  $result = mysqli_query($link, $query);

  if (!mysqli_num_rows($result)) {
    $sql = "INSERT INTO users (name, phone, email, password)
    VALUE ('$name', '$phone', '$email', '$password')";
    $result = mysqli_query($link, $sql);
    return $result ? 'Успешная регистрация' : 'Ошибка регистрации';
  } else {
    return 'Такой пользователь уже существует';
  }
}
