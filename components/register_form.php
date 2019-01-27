<form method="post" class="form-signin">

    <?php
    if(isset($error))
    {
        foreach($error as $error)
        {
            ?>
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
            </div>
            <?php
        }
    }
    else if(isset($_GET['joined']))
    {
        ?>
        <div class="alert alert-info">
            <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
        </div>
        <?php
    }
    ?>
    <div class="form-group">
        <input type="text" class="form-control" name="txt_uname" placeholder="Unesite Ime" value="<?php if(isset($error)){echo $uname;}?>" />
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="txt_usurname" placeholder="Unesite Prezime" value="<?php if(isset($error)){echo $usurname;}?>" />
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="txt_umail" placeholder="Unesite Email" value="<?php if(isset($error)){echo $umail;}?>" />
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="txt_upass" placeholder="Unesite Sifru" />
    </div>
    <div class="clearfix"></div><hr />
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="btn-signup">
            <i class="glyphicon glyphicon-open-file"></i>&nbsp;Registruj se
        </button>
    </div>
    <br />
    <label>Vec imate nalog?! <a href="index.php">Uloguj se</a></label>
</form>