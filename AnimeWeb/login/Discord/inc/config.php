<?php

require(dirname(__FILE__).'/discord.class.php');



$website = array(
	'discord_client'	=>	'651821691197980672',
	'discord_secret'	=>	'YOUR_DISCORD_CLIENT_SECRET',
	'discord_scopes'	=>	'identify email guilds',	// scopes entre espacios
	'url'				=>	website::website_url(),
	'current_url'		=>	website::current_url()
);
session_start();
?>
