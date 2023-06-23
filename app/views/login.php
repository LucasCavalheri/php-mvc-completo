<h2>Login</h2>

<form action="/login/store" method="post">
    <input type="text" name="email" placeholder="Seu Email..." value="example@email.com">
    <input type="password" name="password" placeholder="Sua Senha..." value="123">
    <button type="submit">Logar</button>
</form>

<br>

<?= flash('login') ?>