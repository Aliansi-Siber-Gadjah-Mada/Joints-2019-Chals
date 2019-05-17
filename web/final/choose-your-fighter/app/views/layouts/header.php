<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/css/style.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Choose Your Fighter</title>
</head>
<body>
    <div class="container center">
        <h1>Choose Your Fighter</h1>
        <ul>
            <?php if ($_SESSION['auth']['authenticated'] == 1): ?>
                <li><a href="/">Home</a></li>
                <li><a href="/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="/auth/login">Login</a></li>
                <li><a href="/auth/register">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
    