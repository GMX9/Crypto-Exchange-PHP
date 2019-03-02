<?php
############################################################
# CRYPTO EXCHANGE SOFTWARE - GMX                           #
############################################################
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("configs/database.php");   
require_once("configs/global.php");   
require_once("lib/controllers.php");
require_once("lib/exchange.php");
############################################################
# CUSTOM MVC FRAMEWORK PHP 7.0                             #
############################################################
############################################################
# Developed by Gonçalo M.                                  #               
############################################################
# CONFIGURAÇÃO DB && SESSION                               #
############################################################
session_start();
$connect = new mysqli($config['database']['host'],$config['database']['user'],$config['database']['pass'],$config['database']['db']);  
define("URL", $config['global']['website']);
$website_name =$config['global']['websitename'];
$url = URL;
$user_session = $_SESSION['username'] ?? NULL;
$user = new user($user_session);
global $url;
global $main_logo;
global $website_name;
global $user;
global $exchange;
############################################################
# LOAD WEBSITE
############################################################
/*     __               
   _  |@@|
  / \ \--/ __
  ) O|----|  |   __
 / / \ }{ /\ )_ / _\
*/
$controllers->pageIndex("page");
/*
 )/  /\__/\ \__O (__
|/  (--/\--)    \__/
/   _)(  )(_
   `---''---`
*/

?>
