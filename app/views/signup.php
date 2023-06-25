<form method="post" action="signup/store">
    <input type="text" name="firstName" placeholder="First Name..." class="form-control" value="<?= old('firstName'); ?>">
    <?= flash('firstName'); ?>
    <input type="text" name="lastName" placeholder="Last Name..." class="form-control" value="<?= old('lastName'); ?>">
    <?= flash('lastName'); ?>
    <input type="text" name="email" placeholder="Email..." class="form-control" value="<?= old('email'); ?>">
    <?= flash('email'); ?>
    <input type="password" name="passowrd" placeholder="Password..." class="form-control" value="<?= old('password'); ?>">
    <?= flash('password'); ?>
    <button type="submit">Cadastrar</button>
</form>