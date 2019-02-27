<?php

class ControllerBd
{
    function __construct()
    {
        $resInfo = db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'), Config::get('db_host'), Config::get('db_port'));
        if ($resInfo["status"] === "Error") {
            echo $resInfo["message"];
            echo " - " . $resInfo["PDOException_message"];
            exit;
        }

    }

	
//-----------------------------------Авторизация админки-----------------------------------------
    public function adminInfo() {
        $sql_query = "select * from users limit 0, 1";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes",
                "data" => $res_query["data"]->fetchAll()
            ];
        }
        return [
			"status" => "Error",
			"message" => "Ошибка запроса!"
        ];
    }

//-----------------------------------Страница пользователя-----------------------------------------

    public function getServicesPrice() {
        $sql_query = "SELECT `id`, `name`, `price`, `category` FROM services_price";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes",
                "data" => $res_query["data"]->fetchAll()
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function getCategory() {
        $sql_query = "SELECT `id`, `name` FROM services_category";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes",
                "data" => $res_query["data"]->fetchAll()
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function addRequest($request) {

        $name = htmlspecialchars($request[0]); 
        $phone = htmlspecialchars($request[1]);
        $mail = htmlspecialchars($request[2]);
        $select = htmlspecialchars($request[3]);
        $date= htmlspecialchars($request[4]);
        $comment = htmlspecialchars($request[5]);
        $now = htmlspecialchars($request[6]);

        $sql_query_rep = "SELECT  COUNT(*) FROM `request` WHERE (`phone` = '$phone')and(`name` = '$name')and(`mail` = '$mail')and(`select_request` = '$select')and(`date` = '$date')and(`comment` = '$comment')";
        
        $res_query_rep = db::getInstance()->Query($sql_query_rep);
        

        $count = $res_query_rep["data"]->fetchAll()[0]["COUNT(*)"];
        if ($count==0){
            $sql_query = "INSERT INTO `request` (`date_request`, `name`, `phone`, `mail`, `select_request`, `date`, `comment`, `admin`) VALUES ('$now', '$name', '$phone', '$mail', '$select', '$date', '$comment', '0')";
            
            $res_query = db::getInstance()->Query($sql_query);
             

            if ($res_query["status"] === "Succes") {
                return [
                    "status" => "Succes",
                    "message" => "Заявка отправлена!"
                ];
            }
            return [
                    "status" => "Error",
                    "message" => "Ошибка запроса"
                ];
        }else{
            return [
                    "status" => "Succes",
                    "message" => "Заявка была зарегестрирована ранее"
                ];
        }   
    }

    public function addQuestion($question) {

        $name = htmlspecialchars($question[0]); 
        $mail = htmlspecialchars($question[1]);
        $comment = htmlspecialchars($question[2]);
        $now = htmlspecialchars($question[3]);

        $sql_query_rep = "SELECT  COUNT(*) FROM `questions` WHERE (`name` = '$name')and(`mail` = '$mail')and(`question` = '$comment')";
        
        $res_query_rep = db::getInstance()->Query($sql_query_rep);
        

        $count = $res_query_rep["data"]->fetchAll()[0]["COUNT(*)"];
        if ($count==0){
            $sql_query = "INSERT INTO `questions` (`date`, `name`, `mail`, `question`, `admin`) VALUES ('$now', '$name', '$mail', '$comment', '0')";
            
            $res_query = db::getInstance()->Query($sql_query);
             

            if ($res_query["status"] === "Succes") {
                return [
                    "status" => "Succes",
                    "message" => "Вопрос отправлен!"
                ];
            }
            return [
                    "status" => "Error",
                    "message" => "Ошибка запроса"
                ];
        }else{
            return [
                    "status" => "Succes",
                    "message" => "Вопрос уже был зарегестрирован ранее"
                ];
        }   
    }
//-----------------------------------Страница для админа-----------------------------------------

    public function addService($service) {

        $name = htmlspecialchars($service[0]); 
        $category = htmlspecialchars($service[1]);
        $price = htmlspecialchars($service[2]);
    
        $sql_query_rep = "SELECT COUNT(*) FROM `services_price` WHERE (`name` = '$name')and(`category` = '$category')and(`price` = '$price')";
        
        $res_query_rep = db::getInstance()->Query($sql_query_rep);
        

        $count = $res_query_rep["data"]->fetchAll()[0]["COUNT(*)"];
        if ($count==0){
            $sql_query = "INSERT INTO `services_price` (`name`, `category`, `price`) VALUES ('$name', '$category', '$price')";
            
            $res_query = db::getInstance()->Query($sql_query);
             

            if ($res_query["status"] === "Succes") {
                return [
                    "status" => "Succes",
                    "message" => "Услуга добавлена!"
                ];
            }
            return [
                    "status" => "Error",
                    "message" => "Ошибка запроса"
                ];
        }else{
            return [
                    "status" => "Succes",
                    "message" => "Услуга уже была добавлена ранее"
                ];
        }   
    }

    public function getQuestion() {
        $sql_query = "SELECT `id`, `date`, `name`, `mail`, `question`, `admin` FROM questions ORDER BY id DESC";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes",
                "data" => $res_query["data"]->fetchAll()
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function QuestionDelAdmin($id) {
        $sql_query = "UPDATE `questions` SET `admin` = 1 WHERE `id` = $id";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes"
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function DelQuestion($id) {
        $sql_query = "DELETE FROM `questions` WHERE `id`=$id";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes"
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function getCOUNT() {
        $sql_query1 = "SELECT  COUNT(*) FROM `questions` WHERE `admin` = 0";
        $res_query1 = db::getInstance()->Query($sql_query1);
        $count_questions = $res_query1["data"]->fetchAll()[0]["COUNT(*)"];

        $sql_query2 = "SELECT  COUNT(*) FROM `request` WHERE `admin` = 0";
        $res_query2 = db::getInstance()->Query($sql_query2);
        $count_request = $res_query2["data"]->fetchAll()[0]["COUNT(*)"];

        $res = array('questions' => $count_questions, 'request' => $count_request);

        if (($res_query1["status"] === "Succes")&&($res_query2["status"] === "Succes")) {
            return [
                "status" => "Succes",
                "data" => $res
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function getRequest() {
        $sql_query = "SELECT `id`, `date_request`, `name`, `phone`, `mail`, `select_request`, `date`, `comment`, `admin` FROM `request` ORDER BY id DESC";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes",
                "data" => $res_query["data"]->fetchAll()
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function RequestDelAdmin($id) {
        $sql_query = "UPDATE `request` SET `admin` = 1 WHERE `id` = $id";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes"
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function DelRequest($id) {
        $sql_query = "DELETE FROM `request` WHERE `id`=$id";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes"
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function DelService($id) {
        $sql_query = "DELETE FROM `services_price` WHERE `id`=$id";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes",
                "message" => "Услуга удалена!"
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

     public function ReadService($service) {

        $id = htmlspecialchars($service[0]);
        $name = htmlspecialchars($service[1]);
        $price = htmlspecialchars($service[2]);

        $sql_query = "UPDATE `services_price` SET `name` = '$name', `price` = '$price' WHERE `id` = $id";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes",
                "message" => "Услуга изменена!"
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function getBlog() {
        $sql_query = "SELECT `id`, `text` FROM `blog`";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes",
                "data" => $res_query["data"]->fetchAll()
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }

    public function addBlog($data) {
        $id = htmlspecialchars($data[0]);
        $text = htmlspecialchars($data[1]);
        $sql_query = "UPDATE `blog` SET `text` = '$text' WHERE `id` = $id ";
        $res_query = db::getInstance()->Query($sql_query);
        if ($res_query["status"] === "Succes") {
            return [
                "status" => "Succes",
                "message" => "Успешная замена!"
            ];
        }
        return [
                "status" => "Error",
                "message" => "Ошибка запроса!"
            ];      
    }



    
}