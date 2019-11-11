<?php 
require_once("lib/exchange.php");

/*
====================================================================================================
-> CRYPTO EXCHANGE SOFTWARE <-
====================================================================================================

Constant: VERSION
Contains the framework version. This constant only changes when the framework has a massive update.
Developed by Gonçalo Maia 
Constant: REVISION
Contains the framework revision. This number changes with each  update of minor changes.

====================================================================================================
*/

const VERSION = '1';
const REVISION = '100';

class controllers extends exchange{
    
    public $exchange;
    
    public function __construct(){ $this->exchange = new exchange; }
    
    public function pageIndex($param){
        $conta = count($_GET);
        
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
    
    // Display file
    public function display($path){ include($path); }
    
    
    // Display frontend header
    public function frontend_header($title,$seo){
       $main = file_get_contents("includes/frontend/header.php");
       $st_main = str_replace(array('[TITLE]', '[SEO]'), array($title, $seo), $main);
       echo $st_main;
    }
    
    // Display frontend nav
    public function frontend_nav(){ include("includes/frontend/navbar.php"); }
    
    // Display frontend footer
    public function frontend_footer(){
       include("includes/frontend/footer.php");
    }
    
    // Display frontend close header
    public function frontend_closeHeader(){ include("includes/frontend/close.php"); }
    
    //Send emails using PHPMAILER
    public function sendMail($email,$subject,$corpo){
        
        // Configs load
        require_once("configs/smtp.php");
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        #$mail->IsMail(); // enable SMTP
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = $smtp_secure; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = $smtp_host;
        $mail->Port = $smtp_port; // or 587
        $mail->IsHTML(true);
        $mail->Username = $smtp_user;
        $mail->Password = $smpt_password;
        $mail->SetFrom($smtp_user);
        $mail->Subject = $subject;
        $mail->Body = $corpo;
                        
        $mail->AddAddress($email);
        if(!$mail->Send()) {
            echo "<script>alert('Erro: $mail->ErrorInfo');</script>";
        } else {   
            //echo "<script>alert('Email Sent');</script>";
        }  
    }




}

$controllers = new controllers;
$exchange = new exchange;




?>
