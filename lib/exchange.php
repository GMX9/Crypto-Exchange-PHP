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
    
    public function sendContact($name,$email,$message){
        global $controllers;
        require_once("configs/smtp.php");
        
        $subject = "New Message - Contact Trough Exchange Online";
        $body = "
        <b>Name:</b> $name, <br>
        <b>Email:</b> $email, <br>
        <b>Message:</b> $message 
        ";
        
        $controllers->sendMail($contact_email,$subject,$body);
    }
    
    public function listUserTransactions(){
        
        global $connect;
        $user = $this->user;
        $select = $connect->query("SELECT * FROM transactions WHERE user = '$user'");
        while($fetch = $select->fetch_array(MYSQLI_ASSOC)){
                                        
            if(isset($_SESSION['en'])){
                
                $estado_texto_a = "Waiting";
                $estado_texto_b = "Confirmed";

            }else{
                
                $estado_texto_a = "Waiting";
                $estado_texto_b = "Confirmed";
                
            }
                                        
            $estado_cor_a = "orange";
            $estado_cor_b = "green";
                                        
            $pair = str_replace("_","->",$fetch['pair']);
            $currency = $arr = explode("->", $pair, 2);
            $currency = $arr[0];
            $currency = strtoupper($currency);
            $from = $arr[0];
            $to = $arr[1]; 
                                        
            if($fetch['verified'] == 0){
                $estado = $estado_texto_a;
                $cor = $estado_cor_a;
            }else{
                $estado = $estado_texto_b;
                $cor = $estado_cor_b;
                                            
            }
                                        
            echo'
            <th scope="row">'.strtoupper($arr[0]).' Para '.strtoupper($arr[1]).'</th>
            <th>'.$fetch['date'].'</th>
            <th>'.$fetch['sendamount'].' '.strtoupper($arr[0]).'</th>
            <th scope="row">'.$fetch['hash'].'</th>
            <th style="color:'.$cor.';">'.$estado.'</th>
            ';
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
        	<tr>
                <th scope="row">' . strtoupper($arr[0]) . ' Para ' . strtoupper($arr[1]) . '</th>
                <th>' . $fetch['date'] . '</th>
                <th>' . $fetch['sendamount'] . ' ' . strtoupper($arr[0]) . '</th>
                <th scope="row">' . $fetch['hash'] . '</th>
                <th style="color:' . $cor . ';">' . $estado . '</th>
                </tr>
            ';
            
        }
        
    }
    
    public function exchangeAPI($config){
        global $connect;
        global $_SESSION;
        
        $user = $this->user;
        
        // Let's verify the transaction
        $select = $connect->query("SELECT * FROM transactions WHERE user = '$user' AND verified = 0");
        if ($select->num_rows){
    
            $get = $select->fetch_array(MYSQLI_ASSOC);
    
            $deposit = trim($get['payinaddress']);
            $pair = $_SESSION['pair'];
            $montante = $_SESSION['montante'];
            $currency = $arr = explode("_", $pair, 2);
            $currency = $arr[0];
            $currency = strtoupper($currency);
            $from = $arr[0];
            $to = $arr[1];
            $tid = $get['transaction_id'];
    
        }else{
    
            $address = trim($_SESSION['address']);
            $pair = str_replace("\r\n", "", $_SESSION['pair']);
            $montante = $_SESSION['montante'];
            $currency = $arr = explode("_", $pair, 2);
            $currency = $arr[0];
            $currency = strtoupper($currency);
    
            $from = trim(strip_tags($arr[0]));
            $to = trim(strip_tags($arr[1]));
    
            print_r(trim($pair));
            $from = trim(preg_replace('/\s\s+/', ' ', $from));
    
            $to = trim(preg_replace('/\s\s+/', ' ', $to));
    
            $client = new GuzzleHttp\Client();
            $data = ["from" => strip_tags(trim($from)) , "to" => strip_tags(trim($to)) , "amount" => $montante, "address" => $address];
    
            print_r($data);
    
            $result = $client->post('https://changenow.io/api/v1/transactions/' . $config['changenow']['api'], ['json' => $data]);
    
            /*print "<pre>";
            print_r( $result->getBody()->getContents() );
            print "</pre>";*/
    
            $bodyb = $result->getBody();
            $varx = json_decode((string)$bodyb, true);
    
            $deposit = $varx['payinAddress'];
            $payout = $varx['payoutAddress'];
            $tid = $varx['id'];
    
            ########################################################
            # INSERIR NA DB OS DADOS
            ########################################################
            global $connect;
            $data = date("Y/m/d");
    
            // Check if transaction already listed
            $check = $connect->query("SELECT * FROM transactions WHERE transaction_id = '$tid'");
            if ($check->num_rows){
                // Do nothing
                
            }else{
                if ($insert = $connect->prepare("INSERT INTO transactions(user,date,transaction_id,payinaddress,payoutaddress,pair) VALUES(?,?,?,?,?,?)")){
                    $insert->bind_param("ssssss", $user, $data, $tid, $deposit, $payout, $pair);
                    $insert->execute();
                }else{
                    echo $connect->error;
                }
            }
    
        } 
        
        // Here it terminates | Aqui finaliza a condição
        
        
        ########################################################
        # VERIFY TRANSACTION | VERIFICAR TRANSAÇÃO
        ########################################################
        require_once ("configs/global.php");
    
        $data = json_decode(file_get_contents('https://changenow.io/api/v1/transactions/' . $tid . '/' . $config['changenow']['api']) , true);
        //print_r($data);
        //echo $data["status"];
        // Dados Gerados
        $estado = $data["status"];
    
        $montante_esperado = $data['expectedReceiveAmount'];
        $amount_to_send = $data['expectedSendAmount'];
    
        if (isset($data['hash'])){
            $hash = $data['hash'];
        }else{
    
        }
        $verified = $estado;
    
        if ($verified == "finished"){
    
            $status = 1;
            if ($update = $connect->prepare("UPDATE transactions SET sendamount = ?,receiveamount = ?,hash = ?,verified = ? WHERE transaction_id = ?")){
                $update->bind_param("sssii", $montante, $receiveamount, $hash, $status, $tid);
                $update->execute();
            }else{
                echo $connect->error;
            }
    
            unset($_SESSION['pair']);
            unset($_SESSION['address']);
            unset($_SESSION['montante']);
    
            echo '<meta http-equiv="refresh" content="0; url=/conta" />';
    
        }
        
        return array($tid, $montante_esperado, $to, $amount_to_send, $currency, $deposit);
        
    }
    
    
    
    
}

$exchange = new exchange;


?>
