<?php
	require 'config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');

	if(isset($_POST['update'])) {
		$errMsg = '';


		$password = $_POST['password'];
		$Username = $_POST['username'];
		$passwordVarify= $_POST['password-verify'];
		if($password != $passwordVarify) {$errMsg = 'Password not matched.';}
			


			$PasswordHash = password_hash($password, PASSWORD_DEFAULT);


			if (empty($errMsg)) {
				$UserIdData= $_SESSION['userId'];
				var_dump($Username);
			$DataUpdate = "UPDATE users SET user_name='$Username',user_password_hash = '$PasswordHash' WHERE user_id=$UserIdData";
			  if ($connect->query($DataUpdate) === TRUE) {
				echo "Запись успешно обновлена";
			 } else {
				echo "Ошибка обновления записи: " . $connect->error;
			 }
			 
			}



	// 	if($errMsg == '') {
	// 		try {
	// 	      $sql = "UPDATE pdo SET fullname = :fullname, password = :password WHERE username = :username";
	// 	      $stmt = $connect->prepare($sql);                                  
	// 	      $stmt->execute(array(
	// 	        ':fullname' => $fullname,
	// 	        ':password' => $password,
	// 	        ':username' => $_SESSION['username']
	// 	      ));
	// 			header('Location: update.php?action=updated');
	// 			exit;

	// 		}
	// 		catch(PDOException $e) {
	// 			$errMsg = $e->getMessage();
	// 		}
	// 	}
	}

	// if(isset($_GET['action']) && $_GET['action'] == 'updated')
	// 	$errMsg = 'Successfully updated. <a href="logout.php">Logout</a> and login to see update.';
?>

<html>
<head><title>Update</title></head>
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div align="center">
		<div style=" border: solid 1px #006D9C; " align="left">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b><?php echo $_SESSION['name'] ?></b></div>
			<div style="margin: 15px">
				<form action="" method="post">
					Username <br>
					<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>"  /><br /><br />
					 <br>
					<hr>
					Password <br>
					<input type="password" name="password" value="<?php echo $_SESSION['password'] ?>" class="box" /><br/><br />
					Vafify Password <br>
					<input type="password" name="password-verify" value="<?php echo $_SESSION['password'] ?>" class="box" /><br/><br />
					<input type="submit" name='update' value="Update" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
