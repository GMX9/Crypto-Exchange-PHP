<?php 
class user{
    
    private $user;
    private $connect;
    private $user_session;
    
    public function __construct($session){
        global $connect;

        $this->user = $session;

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
                
                $pair = "".$from."_".$to."";
                $pair = trim($pair);

                
                $_SESSION['montante'] = $amount;
                $_SESSION['address'] = $address;
                $_SESSION['pair'] = $pair;
                
                echo'<meta http-equiv="refresh" content="0; url=/completar" />';
                
            }
            
        }else{
            
            echo'<meta http-equiv="refresh" content="0; url=/login" />';
        	    
        	    
        } 
        
    }
    
    public function allTransactions(){
        
        global $connect;
        $select = $connect->query("SELECT * FROM transactions ORDER by id DESC");
        
        while ($fetch = $select->fetch_array(MYSQLI_ASSOC)){
  
        	$estado_texto_a = "Waiting";
        	$estado_texto_b = "Confirmed";
        	$estado_cor_a = "orange";
        	$estado_cor_b = "green";
        	$pair = str_replace("_", "->", $fetch['pair']);
        	$currency = $arr = explode("->", $pair, 2);
        	$currency = $arr[0];
        	$currency = strtoupper($currency);
        	$from = $arr[0];
        	$to = $arr[1];
        	if ($fetch['verified'] == 0){
        	    
        		$estado = $estado_texto_a;
        		$cor = $estado_cor_a;
        		
        	}else{
        		$estado = $estado_texto_b;
        		$cor = $estado_cor_b;
        	}
        
        	echo 
        	'
                <th scope="row">' . strtoupper($arr[0]) . ' Para ' . strtoupper($arr[1]) . '</th>
                <th>' . $fetch['date'] . '</th>
                <th>' . $fetch['sendamount'] . ' ' . strtoupper($arr[0]) . '</th>
                <th scope="row">' . $fetch['hash'] . '</th>
                <th style="color:' . $cor . ';">' . $estado . '</th>
            ';
            
        }
        
    }
    
    
    
    
}

$exchange = new exchange;


?>
