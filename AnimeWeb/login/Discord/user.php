<?php

require('./inc/config.php');

if( isset($_SESSION['discord_web']) ) {
	$user = website::classThis($_SESSION['discord_web']);
?>

<pre>
<h2>Здаров ебана! <?= $user->username;?></h2>
<b>ID Cuenta:</b>       <?= $user->user_id;?> 
<b>Correo Cuenta:</b>   <?= $user->email;?> 
<b>Cuenta Discord:</b>  <?= $user->username;?>#<?= $user->discriminator;?> 
<b>Token Auth:</b>      <?= $user->access_token;?> 
<b>Token Refresh:</b>   <?= $user->refresh_token;?> 

<img src="https://cdn.discordapp.com/avatars/<?= $user->user_id;?>/<?= $user->avatar_id;?>.png" style="width: 52px">

<?= $user->flags; /* https://discordapp.com/developers/docs/resources/user#user-object-user-flags */ ?>

<?php
switch ($user->premium_type) {
	case '1': echo '<b>Discord Nitro:</b>   Classic'; break;
	case '2': echo '<b>Discord Nitro:</b>   Full'; break;
	default:  echo '<b>Discord Nitro:</b>   Nope'; break;
} ?>















<a href="./logout.php">Выход тут</a></p>
<?php 
} else {
	header('location: index.php');
}

?>
