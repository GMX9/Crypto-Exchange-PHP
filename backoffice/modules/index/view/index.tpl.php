<?php
global $main_logo;
?>

<div class="login-page">
    <div class="center-logo">
    <center><h2 style="color:white; font-weight:bold;">BACKOFFICE</h2></center>
</div><br>
  <div class="form">
   
    <form class="login-form" method="post" action="">
      <input type="email" name="email" placeholder="E-mail Address"/>
      <input type="password" name="password" placeholder="Password"/>
      <button name="sendlogin">log in</button>
    </form>
    
<?php 
if(isset($_POST['sendlogin'])){
  include("lib/userconnect.php");
  userconnect::loginadmin();  
}




?>

  </div>
</div>

