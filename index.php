<?php
require_once 'includes/header.php'
?>
<div class="row justify-content-center pt-5">
  <form action="#" method="get" class="col-3 g-3 needs-validation" novalidate>
    <div class="mb-3">
      <label for="authData" class="form-label">
        Введите телефон или почту
      </label>
      <input type="text" name="authData" id="authData" class="form-control" required pattern="^([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3})|(\d{12})$">
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="mb-3">
      <label for="authPassword" class="form-label">
        Введите пароль
      </label>
      <input type="password" name="authPassword" id="authPassword" class="form-control" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
  </form>
</div>
<?php
require_once 'includes/footer.php'
?>