<?php require __DIR__ . "/layouts/header.php"; ?>

<div class="container center">
    <h1>Register Page</h1>
    <form action="/auth/register" method="post">
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="password" name="password"></p>
        <input type="submit" value="register">
    </form>
    <?php if ($errorMsg !== null): ?>
        <p><?php echo $errorMsg; ?></p>
    <?php endif; ?>
</div>

<?php require __DIR__ . "/layouts/footer.php"; ?>