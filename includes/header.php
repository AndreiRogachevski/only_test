<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer>
  </script>
  <title>Test ONLY</title>
</head>

<body>
  <header class="border-bottom mb-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container py-3">
        <a href="/" class="d-flex align-items-center col-4 mb-2 mb-md-0 text-dark text-decoration-none">
          <h3>ONLY</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav col-6 mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">На главную</a></li>
          </ul>
          <div class="col-6 text-end">
            <?php
            if (isset($_SESSION['name'])) {
              echo '<a href="profile.php" class="pe-3 text-decoration-none text-reset">' . $_SESSION['name'] . '</a><a href="/logout.php" class="btn btn-primary">Выйти</a>';
            } else {
              echo '<a href="authentication-form.php" type="button" class="btn btn-outline-primary me-2">Войти</a>
            <a href="registration-form.php" type="button" class="btn btn-primary">Регистрация</a>';
            }
            ?>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="container">