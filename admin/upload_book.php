<?php require_once('../includes/initialize.php'); ?>
<?php require_once('../includes/Books.php'); ?>


<?php include_layout_template('header.php'); ?>

<?php include_components_template('admin_main_menu.php'); ?>

<div class="main">
    <div class="container">

        <div class="row">

            <h1>Unesite novu knjigu</h1>

        </div>

        <div class="row">

            <!–– Registraciona forma ––>
            <?php include_components_template('books_form.php'); ?>

        </div>
    </div>
</div>



<?php include_layout_template('footer.php'); ?>