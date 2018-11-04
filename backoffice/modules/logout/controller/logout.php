<?php

require_once("lib/controllers.php");

class defaultpage extends controllers
{

public function index()
{


	$this->display('backoffice/modules/logout/view/logout.tpl.php');


}
	
}

$module = new defaultpage;


?>
