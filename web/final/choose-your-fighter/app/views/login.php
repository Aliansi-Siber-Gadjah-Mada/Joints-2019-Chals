<?php require __DIR__ . "/layouts/header.php"; ?>

<div class="container center">
    <h1>Login Page</h1>
    <form action="/auth/login" method="post">
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="password" name="password"></p>
        <input type="submit" value="login">
    </form>
    <?php if ($error): ?>
        <p>Username/Password Salah.</p>
    <?php endif; ?>
</div>

<?php require __DIR__ . "/layouts/footer.php"; ?>