<?php require_once('../includes/initialize.php'); ?>
<?php require_once('../includes/User.php'); ?>
<?php
session_start();
$user = new User();

if($user->is_loggedin()!="") {
    $user->redirect('login.php');
}

if(isset($_POST['btn-signup']))
{
    $uname = strip_tags($_POST['txt_uname']);
    $usurname = strip_tags($_POST['txt_usurname']);
    $umail = strip_tags($_POST['txt_umail']);
    $upass = strip_tags($_POST['txt_upass']);

    if($uname=="")	{
        $error[] = "Unesite ime!";
    }
    else if($usurname=="")	{
        $error[] = "Unesite prezime!";
    }
    else if($umail=="")	{
        $error[] = "Unesite email!";
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
        $error[] = 'Molimo vas unestite validnu email adresu!';
    }
    else if($upass=="")	{
        $error[] = "Unesite sifru!";
    }
    else if(strlen($upass) < 6){
        $error[] = "Sifra mora imati minimum 6 karaktera!";
    }
    else  {
        try {
            $stmt = $user->runQuery("SELECT user_name, email FROM users WHERE user_name=:uname OR email=:umail");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['user_name']==$uname) {
                $error[] = "Ime je vec zuzeto";
            }
            else if($row['user_email']==$umail) {
                $error[] = "Email je vec registrovan!";
            }
            else
            {
                if($user->register($uname,$usurname,$umail,$upass)){
                    $user->redirect('login.php');
                }
            }
        }
        catch(PDOException $e)  {
            echo $e->getMessage();
        }
    }
}

?>

<?php include_layout_template('header.php'); ?>

<?php include_components_template('main_menu.php'); ?>

<div class="main">
    <div class="container">

        <div class="row">

            <h1>Registruj se</h1>

        </div>

        <div class="row">

            <!–– Registraciona forma ––>
            <?php include_components_template('register_form.php'); ?>

        </div>
    </div>
</div>



<?php include_layout_template('footer.php'); ?>