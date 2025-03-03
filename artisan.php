<?php
  echo "<pre>";
  echo shell_exec("php artisan migrate --force 2>&1");
  echo shell_exec("php artisan config:cache 2>&1");
  echo shell_exec("php artisan route:cache 2>&1");
  echo shell_exec("php artisan cache:clear 2>&1");
  echo "</pre>";
?>
