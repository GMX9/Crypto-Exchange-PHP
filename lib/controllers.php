<?php 
require_once("lib/exchange.php");

/*==========================  CRYPTO EXCHANGE SOFTWARE  ============================== */
/*==========================     Version 1.0     ============================= */

/*
        Constant: VERSION
        Contains the framework version. This constant only changes when the framework has a massive update.
    */
    const VERSION = '1';
    
    /*  
        Developed by Gonçalo Maia 
        Constant: REVISION
        Contains the framework revision. This number changes with each  update of minor changes.
    */
    const REVISION = '100';

class controllers extends exchange{
    
    public $exchange;
    
public function __construct(){
    $this->exchange = new exchange;
}

public function pageIndex($param){
    $conta = count($_GET);
    
    if(file_exists("install.php")){
        include("install.php");
    }else{
    
        if(isset($_GET['page']) && $conta == 1){
            
                $name = $_GET[$param];
                $dirs = scandir("modules/");
                $found = false;
                foreach ($dirs as $dir){
                    if($name == $dir && is_dir("modules/$dir")){
                        $found = true;
                        break;
                    }
                }
                if($found && file_exists("modules/$name/controller/$name.php")){
                    require_once("modules/$name/controller/$name.php");
                    $module->index();
                }else{
                    require_once("modules/index/controller/index.php");
                    $module->index();
                } 
            	
        }else{
    
    	    require_once('modules/index/controller/index.php');
    	    $module->index();
    
        }
    }    

}

public function display($path){
    
    include($path);
}

public function header_log($title,$css)
{

    $main = file_get_contents("includes/headerlog-top.html");
    $st_main = str_replace("[TITLE]",$title,$main);
    echo $st_main;

    if(!$css == 0){

    echo "<link href='$css' rel='stylesheet' type='text/css'>";

    }

    include('includes/headerlog-close.html');


}



public function header($title){

  #Header New Design
  global $url;
  
  $main = file_get_contents("includes/header.html");
  $st_main = str_replace(array('[TITLE]', '[WEB]'),array($title, $url),$main);


  echo $st_main;
    //include('includes/header.html');
}



public function navbar(){

  # NAVIGATION ALONG WITH SIDEBAR 
    global $connect;
    global $_SESSION;
    global $website_name;




          $main = file_get_contents("includes/navbar.php");
          $st_main = str_replace("[TITLE]",$website_name,$main);
          include("includes/navbar.php");
              
    
                

}



public function footer(){

  include('includes/footer.html');

}





public function formOpen($titulo){
       $main = file_get_contents("resources/backoffice/form.html");
       $st_main = str_replace("[TITULO]",$titulo,$main);
       echo $st_main;
}

public function formClose(){
       $main = file_get_contents("resources/backoffice/closeform.html");
       echo $main;
}


public function newInput($label,$name,$value){
    
    
    $main = file_get_contents("resources/backoffice/input.html");
    $st_main = str_replace(array('[LABEL]', '[NAME]', '[VALUE]'), array($label, $name, $value), $main);
    echo $st_main;
    
}



function createPage($application,$head) {
	# Gerar um nome diferente para os inputs

	$name_gen = array("a","b","c");
    $this->formOpen($head);
	foreach($application as $key=>$value){
      
   
    

    //$input_count = $counts;
    if($key == "titulo_en"){	  
    
     $t = $value[0];
     
     echo $t;
     
    }
    
    if($key == "table"){
        $table = $value;
    }
	
    echo $key[0];

	  if($key == "titulo_pt"){	  
	      
	      $i = 0;
	      $count = $value[0];
	       for ($i = 0; $i < $count; $i++) {
	           if($i > $count){
	               break;
	           }
	           # GERAR NOME
	           $input_name = $name_gen[$i];
	           $inputname = "titulo_".$input_name."_pt";
	           $label = strtoupper($inputname);
	           $label = str_replace("_","&nbsp;",$label);
	           
		       $this->newInput($label,$inputname,"");
		       
		      

	      }
	  }       


    
	}
	
	$this->formClose();
	
	
    // $this->formOpen();
   

    /*if($application['titulo_en'] == true){
	   $this->input("",$inputname);   
    }*/


    


    // $this->formClose() com botao;
}

protected function texto($table,$coluna){
    
    global $connect;
    $select = $connect->query("SELECT * FROM `$table`");
    $fetch = $select->fetch_array(MYSQLI_ASSOC);
    $value = $fetch[$coluna];
    
    return $value;
}

public function closeHeader()
{
  include('includes/close_header.html');
}

public function frontend_header($title,$seo){
   #FRONT-END HEADER
   $main = file_get_contents("includes/frontend/header.php");
   $st_main = str_replace(array('[TITLE]', '[SEO]'), array($title, $seo), $main);
   echo $st_main;
}

# Mostrar página frontend

public function frontend_nav(){
   include("includes/frontend/navbar.php");
}

public function frontend_banner($image){
   #FRONT-END BANNER
   if(isset($_SESSION['username'])){
        $main = file_get_contents("includes/frontend/banner.php");

   }else{
       
        $main = file_get_contents("includes/frontend/banner_out.php");
   }
   $st_main = str_replace(array('[BANNER]'), array($image), $main);
   echo $st_main;
}

public function frontend_footer(){
   include("includes/frontend/footer.php");
}

public function frontend_closeHeader(){
   include("includes/frontend/close.php");
}



}

$controllers = new controllers;
$exchange = new exchange;






?>
