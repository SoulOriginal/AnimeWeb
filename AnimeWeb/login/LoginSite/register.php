<?php
	require 'config.php';

	if(isset($_POST['register'])) {
		$errors   = '' ;
		$messages = '' ;

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_collbeck = $_POST['password_collbeck'];
		{
			if (empty($_POST['username'])) {
				$errors = "Empty Username";
			} elseif (empty($_POST['password']) || empty($_POST['password_collbeck'])) {
				$errors = "Empty Password";
			} elseif ($_POST['password'] !== $_POST['password_collbeck']) {
				$errors = "Password and password repeat are not the same";
			} elseif (strlen($_POST['password']) < 6) {
				$errors = "Password has a minimum length of 6 characters";
			} elseif (strlen($_POST['username']) > 64 || strlen($_POST['username']) < 2) {
				$errors = "Username cannot be shorter than 2 or longer than 64 characters";
			} elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['username'])) {
				$errors = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
			} elseif (empty($_POST['email'])) {
				$errors = "Email cannot be empty";
			} elseif (strlen($_POST['email']) > 64) {
				$errors = "Email cannot be longer than 64 characters";
			} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$errors = "Your email address is not in a valid email format";
			} elseif (!empty($_POST['username'])
				&& strlen($_POST['username']) <= 64
				&& strlen($_POST['username']) >= 2
				&& preg_match('/^[a-z\d]{2,64}$/i', $_POST['username'])
				&& !empty($_POST['email'])
				&& strlen($_POST['email']) <= 64
				&& filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
				&& !empty($_POST['password'])
				&& !empty($_POST['password_collbeck'])
				&& ($_POST['password'] === $_POST['password_collbeck'])
			) {
				$PasswordHash = password_hash($password, PASSWORD_DEFAULT);
                if(!$connect->connect_error){
					$ProverkaEmail = "SELECT * FROM users WHERE user_email = '" . $email . "';";
					$ProverkaResult = $connect->query($ProverkaEmail);
					if ($ProverkaResult->num_rows == 1) {
						$errors = "Sorry, that  email address is already taken.";
					} else {
						$DB_Data = "INSERT INTO users (user_name, user_password_hash, user_email)
						VALUES('" . $username . "', '" . $PasswordHash . "', '" . $email . "');";
						$Indert_Data = $connect->query($DB_Data);
						$lastInsertedId = mysqli_insert_id($connect);
						$_SESSION['userId'] =$lastInsertedId;
						$_SESSION['email'] = $email;
						if ($Indert_Data) {
							$messages = "Your account has been created successfully. You can now log in.";
						} else {
							$errors = "Sorry, your registration failed. Please go back and try again.";
							}
					}
				}else{
					$errors =("Ошибка подключения: " . $conn->connect_error);
				}
			} else {
				$errors = "An unknown error occurred.";
			}
		}
	}
?>

<html>
<head><title>Register</title></head>
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
				if(isset($errors)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errors.'</div>';
				};
				if(isset($messages)){
					echo '<div style="color:#36cc22;text-align:center;font-size:17px;">'.$messages.'</div>';
				}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Register</b></div>
			<div style="margin: 15px">
				<form action="" method="post">
					<input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" class="box" /><br/><br />
					<input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br/><br />
					<input type="password" name="password_collbeck" placeholder="Password_collbeck" value="<?php if(isset($_POST['password_collbeck'])) echo $_POST['password_collbeck'] ?>" class="box" /><br/><br />
					<input type="submit" name='register' value="Register" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
