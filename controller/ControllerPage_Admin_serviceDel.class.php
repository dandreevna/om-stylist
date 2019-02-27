<?php

class ControllerPage_Admin_serviceDel
{

    public function Admin_serviceDel()
    {
		$controllerAuth = new ControllerAuth();
		$isAuth = $controllerAuth->checkAuth();

		if ($isAuth) {
			$content_page = file_get_contents(Config::get('path_pages').'/admin_serviceDel/index.php');
		} else {
			$content_page = file_get_contents(Config::get('path_pages').'/admin_authForm/index.php');
		}

        return $content_page;
    }

}