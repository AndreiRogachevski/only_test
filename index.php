<?php
require_once 'includes/header.php'
?>

<?php
print_r($_SESSION);
if (isset($_SESSION)) {
  foreach ($_SESSION as $value) {
    echo "$value<br>";
  }
}
?>

<?php
require_once 'includes/footer.php'
?>