<?php
require_once __DIR__.'/../lib.php';
need_login();
if(!validate_token($_POST['csrf_token'] ?? '')){ http_response_code(403); exit('Invalid CSRF token'); }
$user = $_SESSION['user'];
$amt  = (int)($_POST['amount'] ?? 0);
$acct = $_POST['accountNumber'] ?? '';
$d = db();
if($amt <= 0 || !isset($d[$acct])){ http_response_code(400); exit('Invalid'); }
if($d[$user] < $amt){ http_response_code(403); exit('Insufficient'); }
$d[$user] -= $amt;
$d[$acct] += $amt;
save($d);
echo 'OK';