<?php
require_once __DIR__.'/../lib.php';
need_login();
?><!DOCTYPE html>
<h2>Vulnerable Bank – <?= $_SESSION['user'] ?> – balance <?= balance($_SESSION['user']) ?></h2>
<p>Transfer via GET (vulnerable to CSRF):</p>
<form method="get" action="transfer.php">
  <label>Amount: <input name="amount" value="100"></label>
  <label>To:      <input name="accountNumber" value="Bob"></label>
  <button>Send</button>
</form>