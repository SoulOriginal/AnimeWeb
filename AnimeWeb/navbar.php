
    <nav class="navbar">
        <div class="navbar-start">
            <div class="navbar-item">
                <a class="navbar-link" href="register.php">Регистрация</a>
            </div>
            <div class="navbar-item">
                <a class="navbar-link" href="login.php">Логин</a>
            </div>
        </div>
        <? if (true) : ?> <!-- isset($_SESSION) and isset($_SESSION["username"]) -->
        <div class="navbar-end">
            <div class="navbar-item has-dropdown">
                <img src="<?= $_SESSION["avatar"] ?? "https://pbs.twimg.com/profile_images/970331131236311040/STWi1AhQ.jpg"?>" alt="AVATAR" width="36" height="36" class="avatar">
                <div class="user-dropdown">
                    <div class="notifications">
                        Уведомления
                    </div>
                    <hr>
                    <div class="logout">
                        Выход
                    </div>
                </div>
            </div>
        </div>
        <? endif; ?>
    </nav>
