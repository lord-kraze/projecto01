<?php
class Candidate{
    function indexAction(){
        require_once($GLOBALS['basepath'].'/view/candidate/index.phtml');
    }
    function signin(){
        require_once($GLOBALS['basepath'].'/view/candidate/signin.phtml');
        if(!empty($_POST)){
            header('Location: '.$GLOBALS['referer'].'/candidate/success');
        }
    }
    function login(){
        require_once($GLOBALS['basepath'].'/view/candidate/login.phtml');
        if(!empty($_POST)){
            header('Location: '.$GLOBALS['referer'].'/candidate/status');
        }
    }
    function status(){
        require_once($GLOBALS['basepath'].'/view/candidate/noAvailable.phtml');
    }
    function upgrade(){
        require_once($GLOBALS['basepath'].'/view/candidate/noAvailable.phtml');
    }
    function success(){
        require_once($GLOBALS['basepath'].'/view/candidate/noAvailable.phtml');
    }
}