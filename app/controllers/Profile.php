<?php
namespace app\controllers;

#[\app\filters\Login]
class Profile extends \app\core\Controller
{

	#[\app\filters\HasProfile]
	public function index()
	{
		$profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);

		$this->view('Profile/index', $profile);
	}

	public function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$profile = new \app\models\Profile();
			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->middle_name = $_POST['middle_name'];

			$profile->insert();
			header('location:/Profile/index');
		} else {
			$this->view('Profile/create');
		}
	}

	public function modify()
	{
		$profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->middle_name = $_POST['middle_name'];

			$profile->update();
			header('location:/Profile/index');
		} else {
			$this->view('Profile/modify', $profile);
		}
	}

	public function delete()
	{
		$profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$profile->delete();
			header('location:/Profile/index');
		} else {
			$this->view('Profile/delete', $profile);
		}
	}
}