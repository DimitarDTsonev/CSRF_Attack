<?php
require_once __DIR__.'/../lib.php';
need_login();
$user = $_SESSION['user'];
$amt  = (int)($_GET['amount'] ?? 0);
$acct = $_GET['accountNumber'] ?? '';
$d = db();
if($amt <= 0 || !isset($d[$acct])){ http_response_code(400); exit('Invalid'); }
if($d[$user] < $amt){ http_response_code(403); exit('Insufficient'); }
$d[$user] -= $amt;
$d[$acct] += $amt;
save($d);
echo 'OK';