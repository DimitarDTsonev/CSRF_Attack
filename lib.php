<?php
    session_start();
    function db(){ return json_decode(file_get_contents(__DIR__.'/users.json'), true); }
    
    function save($data) { file_put_contents(__DIR__.'users.json', json_encode($data, JSON_PRETTY_PRINT)); }
    
    function need_login() {
        if (!isset($_SESSION['user'])) {
            header('Location: login.php');
            exit;
        }
    }    
    
    function validateForm($accountNumber) {
        if (!document.querySelector($accountNumber).value.trim()) {
            alert('Please enter a recipient.');
            return false;
        }
        return true;
    }

   function balance($u){ $d = db(); return $d[$u] ?? 0; }

    function xsrf_token() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    function validate_token($token) {
        if (!isset($_SESSION['csrf_token']) || $_SESSION['csrf_token'] !== $token) {
            return false;
        }
        unset($_SESSION['csrf_token']);
        return true;
    }
?>