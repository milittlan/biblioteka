<?php require_once('../includes/Session.php'); ?>
<?php require_once('../includes/User.php'); ?>

<?php

$user_logout = new User();

if($user_logout->is_loggedin()!="") {
    $user_logout->redirect('login.php');
}
if(isset($_GET['logout']) && $_GET['logout']=="true") {
    $user_logout->doLogout();
    $user_logout->redirect('login.php');
}
