<?php require_once('../includes/initialize.php'); ?>
<?php require_once('../includes/User.php'); ?>

<?php
session_start();
$login = new USER();

// provjera da li je ulogovan korisnik
if($login->is_loggedin()!="") {
    $login->redirect('index.php');
}

// Logovanje
if(isset($_POST['btn-login'])) {
    $uname = strip_tags($_POST['txt_uname_email']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);

    if($login->doLogin($uname,$umail,$upass)) {
        $login->redirect('index.php');
    }
    else {
        $error = "Wrong Details !";
    }
}
?>

<?php include_layout_template('header.php'); ?>

<?php include_components_template('main_menu.php'); ?>

<div class="main">
    <div class="container">
        <h1>Login stranica</h1>
        <div class="row">

            <!––Login forma ––>
            <?php include_components_template('login_form.php'); ?>

        </div>
    </div>
</div>

<?php include_layout_template('footer.php'); ?>
