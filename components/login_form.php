<form class="form-signin" method="post" id="login-form">

    <div id="error">
        <?php
        if(isset($error))
        {
            ?>
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
            </div>
            <?php
        }
        ?>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Korisnicko ime ili email" required />
        <span id="check-e"></span>
    </div>

    <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Sifra" />
    </div>

    <hr />

    <div class="form-group">
        <button type="submit" name="btn-login" class="btn btn-default">
            <i class="glyphicon glyphicon-log-in"></i>Uloguj se
        </button>
    </div>
    <br />
    <label>Ukoliko nemate nalog <a href="register.php">Registrujte se</a></label>
</form>