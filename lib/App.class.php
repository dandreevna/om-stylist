<?php

class App
{
    protected static $data = [];

    public static function Init()
    {
        date_default_timezone_set('Europe/Moscow');

        // ПРОВЕРКА ВВЕДЕНЫ ЛИ ДННЫЕ ЧЕРЕЗ КОНСОЛЬ ИЛИ ЧЕРЕЗ ОКНО БРАУЗЕРА
        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {

            // ВЫЗЫВАЕТСЯ AJAX ЗАПРОС ИЛИ ЧЕРЕЗ БРАУЗЕР
            if (isset($_POST['action']) && $_POST['action'] === "ajax") {
                //Это ajax запрос к серверу

                self::ajax($_POST['func'], $_POST['func_parm']);
            } else {
                //Это запрос к серверу через браузер
                // path  - ТО, ЧТО ВВЕДЕНО ПОСЛЕ ОСНОВНОГО АДРЕСА СТРАНИЦЫ И ДО СЛЕША. ЕСЛИ ПАРАМЕТРЫ НЕ ПЕРЕДАНЫ, ДОПИСЫВАЕМ МАИН И ОТПРАВЛЯЕМ НА ГЛАВНУЮ
                 self::web(isset($_GET['path']) ? $_GET['path'] : 'main/');
            }
        }
    }

    // ФУНКЦИЯ, ОБРАБАТЫВАЮЩАЯ АЯКС ЗАПРОС
    protected static function ajax($name_func, $func_parm) {
        // sleep(5);
        $controller = new ControllerAjax;
            if (!method_exists($controller, $name_func)) {
                $res["status"] = "Error";
            } else {
                $res["status"] = "Succes";
                $res["data"] = $controller->$name_func($func_parm);
            }       
        echo json_encode($res);
    }
    // ФУНКЦИЯ, ОБРАБАТЫВАЮЩАЯ ЗАПРОС К СЕРВЕРУ ЧЕРЕЗ БРАУЗЕР, URL - ТО, ЧТО ВВЕДЕНО ПОСЛЕ ОСНОВНОГО АДРЕСА
    protected static function web($url)
    {
        //  ПРЕВРАЩАЕМ URL ИЗ СТРОКИ, РАЗДЕЛЕННОЙ СЛЕШАМИ В МАССИВ
        $url = explode("/", $url);

        // ЕСЛИ ПЕРВЫЙ ЭЛЕМЕНТ МАССИВА НЕ ПУСТОЙ
        if (isset($url[0])) {
            $_GET['page'] = $url[0];  
        }
        else{
            $_GET['page'] = 'main';
        }
       
        // СОЗДАЕМ ИМЯ КОНТРОЛЛЕРА, КОТОРЫЙ БУДЕТ ОБРАБАТЫВАТЬ ЗАПРОС. ucfirst - ПЕРВУЮ БУКВУ ДЕЛАЕТ ЗАГЛАВНОЙ
        $controllerName = 'ControllerPage_'.ucfirst($_GET['page']);

        // ИМЯ МЕТОДА В КОНТРОЛЛЕРЕ
        $methodName = ucfirst($_GET['page']);     
        
        // ПРОПИСЫВАЕМ ПУТЬ К ФАЙЛУ-КОНТРОЛЛЕРУ
        $fileNameController = '../controller/' . $controllerName . '.class.php';

        // file_exists -ПРОВЕРЯЕТ СУЩЕСТВОВАНИЕ ФАЙЛА
        // ЕСЛИ $fileNameController НЕ СУЩЕСТВУЕТ, ДЕЛАЕМ КОНТРОЛЛЕР И МЕТОД ОШИБКИ
		if ($url[0] == 'logout') {
			$controllerAuth = new ControllerAuth();
			$controllerAuth->unsetAuth();

			header('Location: /');
		} else if (!file_exists($fileNameController)) {
            //echo 'Класс не найден<br>';
            $controllerName = 'ControllerPage_Error404';
            $methodName = 'Error404';
            $controller = new $controllerName();
        } else {
            // ИНАЧЕ СОЗДАЕМ ЭКЗЕМПЛЯР ПОЛУЧЕННОГО КОНТРОЛЛЕРА
            $controller = new $controllerName();
            // ЕСЛИ МЕТОД В КОНТРОЛЛЕРЕ НЕ НАЙДЕН, ТО ДЕЛАЕМ КОНТРОЛЛЕР И МЕТОД ОШИБКИ
            if (!method_exists($controller, $methodName)) {
                $controllerName = 'ControllerPage_Error404';
                $methodName = 'Error404';
                $controller = new $controllerName();
            }
        }

        // ВЫЗЫВАЕМ МЕТОД В ВЫБРАННОМ КОНТРОЛЛЕРЕ И ДОПИСЫВАЕМ СТРАНИЧКАМ ШАПКУ И ПОДВАЛ
        $content_header = file_get_contents(Config::get('path_pages').'/header.html');
        $content_footer = file_get_contents(Config::get('path_pages').'/footer.html');
        $content_headerAdmin = file_get_contents(Config::get('path_pages').'/headerAdmin.html');
        $content_footerAdmin = file_get_contents(Config::get('path_pages').'/footerAdmin.html');
        $content_page =  $controller->$methodName();

        if(($methodName=='Admin')||($methodName=='Admin_question')||($methodName=='Admin_request')||($methodName=='Admin_serviceAdd')||($methodName=='Admin_serviceDel')||($methodName=='Admin_blog')||($methodName=='Admin_portfolio')){
            echo $content_headerAdmin.$content_page.$content_footerAdmin;
        }else{
            echo $content_header.$content_page.$content_footer;
        }
    }
}