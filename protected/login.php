<?php
require_once __DIR__.'/../lib.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $_SESSION['user'] = 'Bob';
    header('Location: dashboard.php');
    exit;
}
?><!DOCTYPE html>
<form method="post">
  <button>Login as Bob</button>
</form>