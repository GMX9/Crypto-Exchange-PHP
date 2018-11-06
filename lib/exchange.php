<?php 
class user{
    
    private $user;
    private $connect;
    
    public function __construct(){
        global $connect;
        $this->user = isset($_SESSION['username']) ? $_SESSION['username'] : "";
        $this->connect = $connect;
    }
    
    public function isLoggedin(){
        
        if(!empty($this->user)){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function getName(){
        
        $user = $this->user;
        $get = $this->connect->query("SELECT * FROM users WHERE email = '$user'");
        $fetch = $get->fetch_array(MYSQLI_ASSOC);
        
        $name = $fetch['username'];
        
        echo $name;
        
    }
    
  
   
}


class exchange extends user{
    
    private $user;
    private $connect;


    public function __construct() {
        if(isset($_SESSION['username'])){ 
             $this->user = $_SESSION['username']; 
        }
    }
    

    public function switchCoins($amount,$address,$from,$to){ // Exchange coins
       
        global $connect;
        if(isset($_SESSION['username'])){   
             
            $select = $connect->query("SELECT * FROM transactions WHERE user = '$this->user' AND verified = 0");
            if($select->num_rows){
                
                if(isset($_SESSION['en'])){
                    
                }else{
                  echo'<script>alert("You still have an exchange on going, finish it first.");</script>';
                }
                
                // Refresh page
                echo '<meta http-equiv="refresh" content="0; url=/completar" />';
    
            }else{
                
                $pair = $from."_".$to;
                
                $_SESSION['montante'] = $montante;
                $_SESSION['address'] = $address;
                $_SESSION['pair'] = $pair;
                
                echo'<meta http-equiv="refresh" content="0; url=/completar" />';
                
            }
            
        }else{
            
            echo'<meta http-equiv="refresh" content="0; url=/login" />';
        	    
        	    
        } 
        
    }
    
    
    
    
}

$user = new user;
$exchange = new exchange;


?>
