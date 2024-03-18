<?php
namespace app\filters;

#[\Attribute]
class HasProfile implements \app\core\AccessFilter
{

	public function redirected()
	{
		$profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);
		if ($profile) {
			return false;
		} else {
			header('location:/Profile/create');
			return true;
		}
	}

}