<?php
require_once('./inc/config.php');

if ( isset($_SESSION['discord_web']) ) {
	header('Location: /login/Discord/user.php');
    exit;
} else if ( isset($_GET['code']) ) {
	$auth = website::discord_auth($website['discord_client'], $website['discord_secret'], $website['discord_scopes'], $_GET['code']);
	if ( $auth ) {
		$user = website::discord_user_info($auth['access_token']);
		if ( $user ) {

			$_SESSION['discord_web'] = array(
				'user_id'			=> $user['id'],											// ID Account
				'email'				=> $user['email'],										// Cuenta de correo
				'username'			=> $user['username'],									// nick
				'discriminator'		=> $user['discriminator'],								// 0001
				'avatar_id'			=> $user['avatar'],										// Hash avatar

				'flags'				=> $user['flags'],
				'premium_type'		=> $user['premium_type'],

				'access_token'		=> $auth['access_token'],								// Token
				'refresh_token'		=> $auth['refresh_token'],								// Token
				'expiration_info'	=> $auth['expires_in'],									
				'expiration_date'	=> date('d/m/Y H:i:s', time() + $auth['expires_in'])	


			);
			try {
                $manager =  new MongoDB\Driver\Manager("mongodb+srv://USER:PASSWORD@HOST/DarkBot?retryWrites=true&w=majority");
				$single_insert = new MongoDB\Driver\BulkWrite();
				$query = array('UserID' =>  $user['id']);
				$update = array( '$set' =>
				array(
				  'UserID' =>  $user['id'], 
				  'Email' => $user['email'],
				  'UserName' => $user['username'],
				  'FullName' =>  $user['username'] . "#" . $user['discriminator'],
				  'Discriminator' => $user['discriminator'],
				  'AvatarID' =>  $user['avatar'],
				  'Flags' =>  $user['flags'],
				  'NitroType' => $user['premium_type'],
				  'AccessToken' =>  $auth['access_token'],
				  'RefreshToken' => $auth['refresh_token'],
				  'ExpirationInfo' => $auth['expires_in'],
				  'TokenExpirationDate' => date('Y-m-d H:i:s', time() + $auth['expires_in'])
				));
			 $options = array('w' => 1, 'j' => true,'upsert' => true, 'multiple' => false);
		     $single_insert->update($query, $update, $options);
			 $manager -> executeBulkWrite('DarkBot.UserRegister',$single_insert);
			}catch(\MongoDB\Driver\Exception\BulkWriteException $e){
                echo $e -> getMessage();
			}
			header('Location: /login/Discord/user.php');
			exit;
		}
	}
} else {
	website::discord_auth_redirect($website['discord_client'], $website['discord_scopes']);
}?>

