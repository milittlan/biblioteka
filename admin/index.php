<?php require_once('../includes/initialize.php'); ?>
<?php require_once('../includes/Session.php'); ?>
<?php require_once('../includes/User.php'); ?>


<?php

$auth_user = new User();

$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include_components_template('admin_top_menu.php'); ?>
<?php include_layout_template('header.php'); ?>

<?php include_components_template('admin_main_menu.php'); ?>

    <div class="main">
        <div class="container">
            <div class="row">

                <h1>User list</h1>

            </div>
        </div>

        <?php include_components_template('user_list.php'); ?>

    </div>

<?php include_layout_template('footer.php'); ?>