<?php

require_once("lib/controllers.php");

class defaultpage extends controllers
{

public function index()
{

    global $website_name;
    
	if(isset($_SESSION['username'])){

		header("Location: /backoffice/inicio", true, 301);
	    exit();

	}else{

		$this->header_log("$website_name Entrar","../backoffice/modules/index/css/style.css");
		$this->display('backoffice/modules/index/view/index.tpl.php');
		$this->closeHeader();

	}

}
	
}

$module = new defaultpage;


?>
