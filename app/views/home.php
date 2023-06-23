<h2>Lista de Usuários (<?= count($users); ?>)</h2>

<ul>
    <?php foreach ($users as $user) : ?>
        <li><?= $user->firstName; ?> <?= $user->lastName; ?> | <a href="/user/show/<?= $user->id ?>">Ver Usuário</a></li>
    <?php endforeach; ?>
</ul>