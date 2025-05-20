<?php
require_once __DIR__.'/../lib.php';
need_login();
$token = xsrf_token();
?><!DOCTYPE html>
<h2>Protected Bank – <?= $_SESSION['user'] ?> – balance <?= balance($_SESSION['user']) ?></h2>
<p>Transfer via POST with CSRF token:</p>
<form method="post" action="transfer.php">
  <input type="hidden" name="csrf_token"     value="<?= htmlspecialchars($token) ?>">
  <label>Amount: <input name="amount" value="100"></label>
  <label>To:      <input name="accountNumber" value="Alice"></label>
  <button>Send</button>
</form>