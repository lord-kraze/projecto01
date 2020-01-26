<?php
class Company{
    function welcome(){
        require_once($GLOBALS['basepath']."view/company/index.phtml");
    }
    function signin(){
        require_once($GLOBALS['basepath'].'/view/company/signin.phtml');
        if(!empty($_POST)){
            header('Location: '.$GLOBALS['referer'].'/company/success');
        }
    }
    function login(){
        require_once($GLOBALS['basepath'].'/view/company/login.phtml');
        if(!empty($_POST)){
            header('Location: '.$GLOBALS['referer'].'/company/dashboard');
        }
    }
    function dashboard(){
        require_once($GLOBALS['basepath']."view/company/dashboard.phtml");
    }
}
