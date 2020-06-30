<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="minireset.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/register.css">
    <title>Register</title>
</head>
<body>
    <? include "navbar.php" ?>
    <form action="rest/register.php" method="post">
        <div class="field">
            <input type="text" name="username" id="n" required placeholder="Имя">
        </div>
        <div class="field">
            <input type="email" name="email" id="e" required placeholder="Почта">
        </div>
        <div class="field">
            <input type="password" name="password" id="p" required placeholder="Пароль">
        </div>
        <div class="field">
            <input type="password" name="password-repeat" id="r" required placeholder="Повтор Пароля">
        </div>
        <div class="inline">
            <div class="inline-start">
                <div class="inline-item">
                    <input type="submit" value="Зарегестрироваться!">
                </div>
            </div>
            <div class="inline-end">
                <div class="inline-item text-center">
                    <a href="login/Discord/login.php">Discord</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
