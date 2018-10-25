<?php
namespace Core;

class Controller {

    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        require_once "Views/".$viewName.".php";
    }

    public function loadTemplate($viewName, $viewData = array()) {
        extract($viewData);
        require_once "Views/template.php";
    }

    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
        require_once "Views/".$viewName.".php";
    }

}
?>