<?php
require_once "db.php";
// session_unset();
if (!isset($_SESSION['user_id'])) {
	$email = disinfect($_POST['user_log_email']);
	$pwd = disinfect($_POST['user_log_password']);
	$remember = disinfect($_POST['remember']) ?? null;
	
	if (!empty($email) && !empty($pwd)) {
		// $sql = "SELECT * FROM users WHERE email = :email, Пароль = password_hash(:pwd, PASSWORD_DEFAULT)";
		$sql = "SELECT email FROM users WHERE email='$email'";
		$sth = $dbh->prepare($sql);
		$sth->execute();
		if ($sth->rowCount() === 1) {
			$sql2 = "SELECT `id`, `Имя`, `Фамилия`, `email`, `Пароль`, `Аватар` FROM `users` WHERE `email` = '$email'";
			$sth2 = $dbh->prepare($sql2);
			$sth2->execute();
			$user = $sth2->fetch(PDO::FETCH_ASSOC);
			// echo $sth2->rowCount();
			// echo var_dump($user);
			$_SESSION['user_id'] = $user['id']; 

			$_SESSION['user_name'] = $user['Имя'] . ' ' . $user['Фамилия']; 
			
			$_SESSION['user_img'] = $user['Аватар']; 

			// if ($remember === 'me') {
			// 	setcookie('user_id', $user['id'], time() + (60*60*24*60));
			// } //создадим куки для id пользователя
			$home_url = 'index.php';
			header('Location: '.$home_url);
		} else echo "Неправильный логин или пароль";
	} else echo "Введите логин и пароль";
} else echo "Выйдите из текущего профиля, прежде чем войти";

?>