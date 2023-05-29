<?php
require_once 'includes/header.php';
?>
<div class="row justify-content-center pt-5">
  <?php
  if (isset($_GET['error'])) {
    echo "<h4 class='text-center'>$_GET[error]</h4>";
  } else {
    echo '<h4 class="text-center">Заполните форму регистрации</h4>';
  }
  ?>
  <form action="regUser.php" method="post" class="col-4 row needs-validation <?php echo isset($_GET['error']) ? 'was-validated' : ''; ?>" novalidate>
    <div class="mb-3">
      <label for="name" class="form-label">
        Имя
      </label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">
        Телефон
      </label>
      <input type="tel" name="phone" id="phone" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">
        Почту
      </label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">
        Введите пароль
      </label>
      <input type="text" name="password" id="password" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="confirmPassword" class="form-label">
        Повтор пароль
      </label>
      <input type="text" name="confirmPassword" id="confirmPassword" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary col-auto mx-auto">Зарегистрироваться</button>
  </form>
</div>
<?php
require_once 'includes/footer.php'
?>