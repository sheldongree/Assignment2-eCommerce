<?php
namespace app\controllers;

class User extends \app\core\Controller
{

	function login()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$username = $_POST['username'];
			$user = new \app\models\User();
			$user = $user->get($username);
			$password = $_POST['password'];
			if ($user && password_verify($password, $user->password_hash)) {
				$_SESSION['user_id'] = $user->user_id;

				$profileModel = new \app\models\Profile();
				$profile = $profileModel->getForUser($user->user_id);

				if ($profile) {
					$_SESSION['profile_id'] = $profile->profile_id;
				} else {
					header('location:/Profile/create');
				}

				header('location:/User/securePlace');
			} else {
				header('location:/User/login');
			}
		} else {
			$this->view('User/login');
		}
	}

	function logout()
	{
		session_destroy();

		header('location:/Publication/viewAll');
	}

	function securePlace()
	{
		if (!isset ($_SESSION['user_id'])) {
			header('location:/User/login');
			return;
		}
		echo 'You are safe. You are in a secure location.';
	}

	function register()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user = new \app\models\User();
			$user->username = $_POST['username'];
			$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$user->insert();
			header('location:/User/login');
		} else {
			$this->view('User/registration');
		}
	}

	function update()
	{
		if (!isset ($_SESSION['user_id'])) {
			header('location:/User/login');
			return;
		}

		$user = new \app\models\User();
		$user = $user->getById($_SESSION['user_id']);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user->username = $_POST['username'];
			$password = $_POST['password'];
			if (!empty ($password)) {
				$user->password_hash = password_hash($password, PASSWORD_DEFAULT);
			}
			$user->update();
			header('location:/User/update');
		} else {
			$this->view('User/update', $user);
		}
	}

	function delete()
	{
		if (!isset ($_SESSION['user_id'])) {
			header('location:/User/login');
			return;
		}

		$user = new \app\models\User();
		$user = $user->getById($_SESSION['user_id']);
		$user->delete();
		header('location:/User/logout');
	}

}