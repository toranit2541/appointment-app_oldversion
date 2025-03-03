<?php
  echo "<pre>";
  echo shell_exec("php artisan migrate 2>&1");
  echo "</pre>";
?>
