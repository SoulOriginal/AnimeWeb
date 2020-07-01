<!DOCTYPE html>
<html lang="en">
<head>
    <? include "head.php" ?>
    <link rel="stylesheet" href="/src/css/register.css">
    <title>Register</title>
</head>
<body>
    <? include "navbar.php" ?>
    <form action="login/LoginSite/register.php" method="post">
        <div class="field">
            <input type="text" name="username" id="n" required placeholder="Имя" autocomplete="username">
        </div>
        <div class="field">
            <input type="email" name="email" id="e" required placeholder="Почта" autocomplete="email">
        </div>
        <div class="field">
            <input type="password" name="password" id="p" required placeholder="Пароль" autocomplete="new-password">
        </div>
        <div class="field">
            <input type="password" name="password-repeat" id="r" required placeholder="Повтор Пароля" autocomplete="new-password">
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
