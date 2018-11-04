<?php
# Novo template de modulo sem savant.
# Novo nome automático

require_once("lib/controllers.php");

class defaultpage extends controllers
{

	public function index()
	{
		global $website_name;
		$filename = pathinfo(__FILE__, PATHINFO_FILENAME); // Obter o nome do ficheiro


		   
			$this->frontend_header("$website_name Sobre","SEO");
			$this->frontend_nav();
			$this->display("modules/$filename/view/$filename.tpl.php");
			$this->frontend_footer();
			$this->frontend_closeHeader();
	    

	}
	
}


$module = new defaultpage;


?>


