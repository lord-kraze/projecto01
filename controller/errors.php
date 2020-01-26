<?php
class Errors{
    function notFound(){
        //Página não encontrada
        require_once($GLOBALS['basepath']."view/404error.phtml");
    }
    function denied(){
        //Acesso negado
        require_once($GLOBALS['basepath']."view/accessDenied.phtml");
    }
    
}