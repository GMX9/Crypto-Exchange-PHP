<?php
# Novo template de modulo sem savant.

require_once("lib/controllers.php");

class defaultpage extends controllers
{

	public function index()
	{
		global $website_name;

		if(isset($_SESSION['username'])){
		
			$this->header("$website_name Acessos");
			$this->navbar();
			$this->display('backoffice/modules/acessos/view/acessos.tpl.php');
			$this->footer();
	    
	    }else{

		    header("Location: /", true, 301);
	        exit();
	    }

	}
	
}


$module = new defaultpage;


?>


