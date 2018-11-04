<?php
# Novo template de modulo sem savant.

require_once("lib/controllers.php");

class defaultpage extends controllers
{

	public function index()
	{
		global $website_name;

		if(isset($_SESSION['username'])){
		
			$this->header("$website_name Editar");
			$this->navbar();
			$this->display('backoffice/modules/editar/view/editar.tpl.php');
			$this->footer();
	    
	    }else{

		    header("Location: /", true, 301);
	        exit();
	    }

	}
	
}


$module = new defaultpage;


?>


