<?php

class ControllerAuth {

	private $sessionId;
	private $sessionInfo;
	private $controllerBd;

//-----------------------------------Запускаем сессию-----------------------------------------
    function __construct() {
        session_start();

		$this->sessionId = session_id();

		if (!in_array('auth', array_keys($_SESSION))) $_SESSION['auth'] = 0;
		$this->sessionInfo = $_SESSION;
    }

//-----------------------------------Установка статуса авторизации - 1-----------------------------------------
    public function setAuth() {
		$_SESSION['auth'] = 1;
    }

//-----------------------------------Установка статуса авторизации - 0-----------------------------------------
    public function unsetAuth() {
		$_SESSION['auth'] = 0;
    }

//-----------------------------------Проверка авторизации-----------------------------------------
    public function checkAuth() {
		$result = false;

		if ($this->sessionInfo['auth'] == 1) {
			$result = true;
		} else {
			$this->controllerBd = new ControllerBd();
			$adminInfo = $this->controllerBd->adminInfo(); // Получаем данные пользователя из БД

			// Данные хранятся в БД в таблице users
			// Пароль хранится в MD5 хэше

			if ($_POST['login'] == $adminInfo['data'][0]['login'] && md5($_POST['password']) == $adminInfo['data'][0]['password']) {
				$this->setAuth();
				$result = true;
			}
		}

		return $result;
    }
}