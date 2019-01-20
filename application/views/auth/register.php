<h2>Register</h2>
<?= form_open('auth/register') ?>
    <label for="">emial</label>
    <?= form_error('email'); ?>
    <input type="email" name="email" value="<?= set_value('email') ?>"> <br>

    <label for="">password</label>
    <?= form_error('password'); ?>
    <input type="password" name="password"> <br>

    <label for="">Ulangi Password</label>
    <?= form_error('password2'); ?>
    <input type="password" name="password2"> <br>

    <input type="submit" name="submit" value="register">

    <?= form_close(); ?>
    