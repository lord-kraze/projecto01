<?php

    //Instaciar uma sessão
    @session_start();

    //Nome do projecto
    $projectName = 'projecto01';
    $GLOBALS['name'] = $projectName;

    //Definir variaveis globais para caminhos do ficheiro
    $GLOBALS['basepath'] = $_SERVER['DOCUMENT_ROOT'].'/'.$projectName.'/';
    $GLOBALS['referer'] = '/'.$projectName.'/index.php';

    //Invocar os controllers
    require_once($GLOBALS['basepath'].'controller/errors.php');
    require_once($GLOBALS['basepath'].'controller/candidate.php');
    require_once($GLOBALS['basepath'].'controller/company.php');
    require_once($GLOBALS['basepath'].'controller/admin.php');
    
    //Preparar controlo de rotas a partir da URI
    $uri = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    if($uri != ''){
        $uriPart = explode("/", $uri);
        $action = $uriPart[2] ;
        $destination = $uriPart[1] ;
    }

    //Estabelecendo modulos por default 
    $modules = array(
        "candidate" => array("signin","login","status","success","upgrade"),
        "company" => array("signin","login","welcome","dashboard")
    );

    require_once($GLOBALS['basepath'].'view/includes/header.phtml');
    
    if($uri == '' || $uri == '/index.php' || $uri == '/index.php/'){
        $control = new Candidate();
        $control->indexAction();
        unset($control);
    }
    else{
        if (!array_key_exists($destination, $modules)) {
            $control = new Errors();
            $control->notFound();
            unset($control);
        }
        else if($destination == "errors"){
            if(in_array($action,$modules[$destination])){
                $control = new $destination();
                $control->$action();
            }
            else{
                $control = new Errors();
                $control->notFound();
            }
            unset($control);
        }
        else{
            if(in_array($action,$modules[$destination])){
                $control = new $destination();
                $control->$action();
            }
            else{
                $control = new errors();
                $control->notFound();
            }
            unset($control);
        }
    }
    require_once($GLOBALS['basepath'].'view/includes/footer.phtml');
    
?>