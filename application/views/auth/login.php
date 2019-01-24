<h2>login</h2>
<?= form_open('auth/login') ?>
    <label for="">emial</label>
    <?= form_error('email'); ?>
    <input type="email" name="email" value="<?= set_value('email') ?>"> <br>

    <label for="">password</label>
    <?= form_error('password'); ?>
    <input type="password" name="password"> <br>

    <input type="submit" name="submit" value="login">

    <?= form_close(); ?>
    