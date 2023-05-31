<?php
include 'database.php';

function generateToken($length = 8)
{
  $string = '';
  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890';
  $numChars =  strlen($chars);
  for ($i = 0; $i < $length; $i++) {
    $string .= substr($chars, rand(1, $numChars) - 1, 1);
  }
  return $string;
};

function createUser($userInfo)
{
  global $link;

  $name = mysqli_real_escape_string($link, $userInfo['name']);
  $phone = mysqli_real_escape_string($link, $userInfo['phone']);
  $email = mysqli_real_escape_string($link, $userInfo['email']);
  $password = mysqli_real_escape_string($link, $userInfo['password']);
  $token = generateToken();

  $query = "SELECT * FROM users WHERE (name = '$name') OR (phone = '$phone') OR (email = '$email')";
  $result = mysqli_query($link, $query);

  if (!mysqli_num_rows($result)) {
    $sql = "INSERT INTO users (name, phone, email, password, token)
    VALUE ('$name', '$phone', '$email', '$password','$token')";
    $result = mysqli_query($link, $sql);
    return $result ? 'Успешная регистрация' : 'Ошибка регистрации';
  } else {
    return 'Такой пользователь уже существует';
  }
}

function login($authData)
{
  global $link;

  $login = [];
  foreach ($authData as $key => $value) {
    $key = mysqli_escape_string($link, $value);
    array_push($login, $key);
  }
  $query = "SELECT * FROM users WHERE phone = '$login[0]' OR email = '$login[0]'
    AND password = '$login[1]'";
  $result = mysqli_query($link, $query);

  if (!mysqli_num_rows($result)) {
    return 'Неверный логин или пароль';
  }
  return mysqli_fetch_assoc($result);
}

function updateUser($userInfo, $token)
{
  global $link;

  $name = mysqli_real_escape_string($link, $userInfo['name']);
  $phone = mysqli_real_escape_string($link, $userInfo['phone']);
  $email = mysqli_real_escape_string($link, $userInfo['email']);
  $password = mysqli_real_escape_string($link, $userInfo['password']);

  $sql = "UPDATE users
    SET name = '$name',
        phone = '$phone',
        email = '$email',
        password = '$password'
    WHERE token = '$token'";
  $result = mysqli_query($link, $sql);
  return $result ? 'Данные успешно изменены' : 'Ошибка';
}
