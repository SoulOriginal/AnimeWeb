<?php require('login/Discord/inc/config.php');
 if(isset($_SESSION['discord_web']) ) {
    header('Location: /login/Discord/user.php');
    exit;}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="minireset.css">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php  
echo '<a href="login/Discord/login.php">login with Discord</a>';
?>
</body>

</html>