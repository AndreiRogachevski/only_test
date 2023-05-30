<?php
require_once 'includes/header.php'
?>
<div class="row justify-content-center pt-5 mb-5">
  <?php
  if (isset($_GET)) {
    foreach ($_GET as $message) {
      echo "<h3 class='text-center'>$message</h3>";
    };
  }
  ?>
  <form action="authUser.php" method="post" class="col-3 g-3">
    <div class="mb-3">
      <label for="authData" class="form-label">
        Введите телефон или почту
      </label>
      <input type="text" name="authData" id="authData" class="form-control">
    </div>
    <div class="mb-3">
      <label for="authPassword" class="form-label">
        Введите пароль
      </label>
      <input type="password" name="authPassword" id="authPassword" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
  </form>
</div>

<?php
require_once 'includes/footer.php';
?>