<?php

session_start();

require_once 'User.php';
$session = new User();

if(!$session->is_loggedin()) {
    // session no set redirects to login page
    $session->redirect('index.php');
}