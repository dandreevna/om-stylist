<?php

class ControllerAjax
{
    private $utm_source = '';
    private $controllerBd;

    function __construct()
    {
        $this->controllerBd = new ControllerBd();
    }

//-----------------------------------Страница пользователя-----------------------------------------

    public function get_services_price_cat_1() {
        $res = $this->controllerBd->getServicesPriceCat1();
        if ($res["status"] === "Succes") {
              return $res["data"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function get_services_price() {
        $res = $this->controllerBd->getServicesPrice();
        if ($res["status"] === "Succes") {
              return $res["data"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function get_Category() {
        $res = $this->controllerBd->getCategory();
        if ($res["status"] === "Succes") {
              return $res["data"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function add_Request($request) {
        $res = $this->controllerBd->addRequest($request);
        if ($res["status"] === "Succes") {
              return $res["message"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function add_Question($question) {
        $res = $this->controllerBd->addQuestion($question);
        if ($res["status"] === "Succes") {
              return $res["message"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function add_Service($service) {
        $res = $this->controllerBd->addService($service);
        if ($res["status"] === "Succes") {
              return $res["message"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function get_Question() {
        $res = $this->controllerBd->getQuestion();
        if ($res["status"] === "Succes") {
              return $res["data"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function Question_DelAdmin($id) {
        $res = $this->controllerBd->QuestionDelAdmin($id);
        if ($res["status"] === "Succes") {
              return $res["status"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function Del_Question($id) {
        $res = $this->controllerBd->DelQuestion($id);
        if ($res["status"] === "Succes") {
              return $res["status"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

     public function get_COUNT() {
        $res = $this->controllerBd->getCOUNT();
        if ($res["status"] === "Succes") {
              return $res["data"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function get_Request() {
        $res = $this->controllerBd->getRequest();
        if ($res["status"] === "Succes") {
              return $res["data"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function Request_DelAdmin($id) {
        $res = $this->controllerBd->RequestDelAdmin($id);
        if ($res["status"] === "Succes") {
              return $res["status"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function Del_Request($id) {
        $res = $this->controllerBd->DelRequest($id);
        if ($res["status"] === "Succes") {
              return $res["status"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function Del_Service($id) {
        $res = $this->controllerBd->DelService($id);
        if ($res["status"] === "Succes") {
              return $res["message"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function Read_Service($service) {
        $res = $this->controllerBd->ReadService($service);
        if ($res["status"] === "Succes") {
              return $res["message"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

    public function get_Blog() {
        $res = $this->controllerBd->getBlog();
        if ($res["status"] === "Succes") {
            return $res["data"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }

     public function add_Blog($data) {
        $res = $this->controllerBd->addBlog($data);
        if ($res["status"] === "Succes") {
              return $res["message"];
        } else {
            //здесь обработка в случае ошибки
            return $res["message"];
        }
    }



// --------------------------------------------------------------------------------------------------
}