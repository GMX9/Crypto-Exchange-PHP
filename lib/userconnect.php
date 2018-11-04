<?php

class userconnect{


public static function login()
  {
 
   global $connect;
            
          $username = preg_replace('/\s+/', '', $_POST['email']);  
          $username = htmlentities($connect->real_escape_string($username));
          $password = sha1(htmlentities($connect->real_escape_string($_POST['password'])));

             if(empty($username)){
 echo'
       	<div class="warning">
          <p>Please insert an e-mail.</p>
    	</div>
       ';
      echo'<META HTTP-EQUIV="refresh" CONTENT="3">';





     }else if(empty($password)){
   
 echo'
       	<div class="warning">
          <p>Please insert a password.</p>
    	</div>
       ';

      echo'<META HTTP-EQUIV="refresh" CONTENT="4">';
     }else{

$check_usr_pw = $connect->prepare("SELECT * FROM users WHERE email= ? AND password = ? ");
$check_usr_pw->bind_param("ss", $username,$password);
$check_usr_pw->execute();

$check_usr_pw->store_result();





if($check_usr_pw->num_rows)
{


$_SESSION['username']=$username;


echo'<meta http-equiv="refresh" content="0">';




}else{


        echo'
       	<div class="warning">
          <p>Email or password incorrect. <a href="">Contact</a> support.</p>
    	</div>
       ';
      echo'<META HTTP-EQUIV="refresh" CONTENT="2">';
}
}
}


public static function loginadmin()
  {
 
   global $connect;
            
          $username = preg_replace('/\s+/', '', $_POST['email']);  
          $username = htmlentities($connect->real_escape_string($username));
          $password = sha1(htmlentities($connect->real_escape_string($_POST['password'])));

             if(empty($username)){
 echo'
       	<div class="warning">
          <p>Por favor insira um e-mail.</p>
    	</div>
       ';
      echo'<META HTTP-EQUIV="refresh" CONTENT="3">';





     }else if(empty($password)){
   
 echo'
       	<div class="warning">
          <p>Please insert a password.</p>
    	</div>
       ';

      echo'<META HTTP-EQUIV="refresh" CONTENT="4">';
     }else{

$rank = 4;
$check_usr_pw = $connect->prepare("SELECT * FROM users WHERE email= ? AND password = ? AND rank = ? ");
$check_usr_pw->bind_param("ssi", $username,$password,$rank);
$check_usr_pw->execute();

$check_usr_pw->store_result();





if($check_usr_pw->num_rows)
{


$_SESSION['username']=$username;


echo'<meta http-equiv="refresh" content="0">';




}else{


        echo'
       	<div class="warning">
          <p>Email or password incorrect.</p>
    	</div>
       ';
      echo'<META HTTP-EQUIV="refresh" CONTENT="2">';
}
}
}

// register function
public static function register()
{

  
  global $connect;

  $username = htmlentities($connect->real_escape_string($_POST['username']));
  $username = preg_replace("/[^ \w]+/", "", $username);
  $username = str_replace(' ', '', $username);
  $password =  sha1(htmlentities($connect->real_escape_string($_POST['password'])));
  $email = htmlentities($connect->real_escape_string($_POST['email']));
  $rank = 0;
  $regdate = date("Y/m/d");
  $verified = 0;
  

  
  $check_username = $connect->prepare("SELECT * FROM users WHERE username = ? ");
  $check_username->bind_param("s", $username);
  $check_username->execute();
  $check_username->store_result();

  $row_name_user = $check_username->num_rows;

  $check_username->close();
  

  $check_email = $connect->prepare("SELECT * FROM users WHERE  email = ?");
  $check_email->bind_param("s", $email);
  $check_email->execute();
  $check_email->store_result();

  $row_name_email = $check_email->num_rows;

  $check_email->close();


  if($row_name_user){
   echo"
   <script>
   alert('The username is already in use.');
   </script>
   ";
   

  }else if($row_name_email){
   echo"
   <script>
   alert('The email is already in use.');
   </script>
   ";

  }else{




  $save = $connect->prepare("INSERT INTO users (username,password,email,rank,verified) VALUES(?, ?, ?, ?, ?)");
  $save->bind_param("sssii", $username,$password,$email,$rank,$verified);
  $save->execute();
  $save->close();


  echo"<script>alert('Your account was successfully created.');</script>";
  $_SESSION['username'] = $email;
  ?>
<script type="text/javascript">
window.location.href = '/';
</script>
<?php
 
  

  

}
// End of register function




}
}
