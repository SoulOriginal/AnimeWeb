<!DOCTYPE html>
<html  prefix="og: http://ogp.me/ns#" lang="en">
<head>
   <nav class="navbar">
        <div class="navbar-start">
            <div class="navbar-item">
                <a class="navbar-link" href onclick="event.preventDefault()">Уведомления</a>
            </div>
            <div class="navbar-item">
                <a href="login/LoginSyte/register.php" class="navbar-link">Регистрация</a>
            </div>
        </div>
        <? if (/* $registered */ false) : ?>
            <div class="navbar-end">
                <div class="navbar-item">
                    <a class="navbar-link" href="login.html">Логин</a>
                </div>
                <div class="navbar-item">
                    <a class="navbar-link" href onclick="event.preventDefault()">Выход</a>
                </div>
            </div>
        <? endif; ?>
    </nav>
    </head>
<body>
