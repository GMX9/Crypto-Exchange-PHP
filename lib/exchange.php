<?php 
class exchange{
    
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
                  echo'<script>alert("Ainda tens uma exchange a decorrer, terás de a finalizar primeiro.");</script>';
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

$exchange = new exchange;


?>