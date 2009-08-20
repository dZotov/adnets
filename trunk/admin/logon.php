<?
include('./include/init.php');

if (is_member()) {
	redirect('index.php');
}

if (count($_POST)) {
	$login = get_post('login');
	$pass= get_post('password');
	if ($login==ADMIN_LOGIN && $pass==ADMIN_PASSWORD) {
		$_SESSION['account_id'] = 1;
		redirect('index.php');
	} else {
		$ERRORS[] = 'Ошибка';
	}
}

Display('logon.tpl');
?>