<?php

class ControllerPage_Admin_serviceAdd
{

    public function Admin_serviceAdd()
    {
		$controllerAuth = new ControllerAuth();
		$isAuth = $controllerAuth->checkAuth();

		if ($isAuth) {
			$content_page = file_get_contents(Config::get('path_pages').'/admin_serviceAdd/index.php');
		} else {
			$content_page = file_get_contents(Config::get('path_pages').'/admin_authForm/index.php');
		}

        return $content_page;
    }

}