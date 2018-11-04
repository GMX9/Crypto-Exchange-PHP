<?php
require 'vendor/autoload.php';
$client = new GuzzleHttp\Client();
global $connect;
########################################################

########################################################


if(isset($_SESSION['pair'])){
    
// Ver se tem alguma exchange ativa    
$user = $_SESSION['username'];

$select = $connect->query("SELECT * FROM transactions WHERE user = '$user' AND verified = 0");
if($select->num_rows){
    
$get = $select->fetch_array(MYSQLI_ASSOC);

$deposit = $get['payinaddress'];
$pair = $_SESSION['pair'];
$montante = $_SESSION['montante'];
$currency = $arr = explode("_", $pair, 2);
$currency = $arr[0];
$currency = strtoupper($currency);
$from = $arr[0];
$to = $arr[1]; 
$tid = $get['transaction_id'];

}else{
    
$address = $_SESSION['address'];
$pair = $_SESSION['pair'];
$montante = $_SESSION['montante'];
$currency = $arr = explode("_", $pair, 2);
$currency = $arr[0];
$currency = strtoupper($currency);

$from = $arr[0];
$to = $arr[1];


$client = new GuzzleHttp\Client();
$data   = [
    "from"    => $from,
    "to"      => $to,
    "address" => $address,
    "amount"  => $montante,
    "refundAddress" => "1GRXa73viip2EccKocY74MHh2R5mhbvATB"
];

$result = $client->post('https://changenow.io/api/v1/transactions/608669356fd610a60e6e146283b923b202986fbc8d60163dcf25cd82b50adc04', ['json' => $data]);


/*print "<pre>";
print_r( $result->getBody()->getContents() );
print "</pre>";*/


$bodyb = $result->getBody();
$varx = json_decode((string) $bodyb, true);


$deposit = $varx['payinAddress'];
$payout = $varx['payoutAddress'];
$tid = $varx['id'];

########################################################
# INSERIR NA DB OS DADOS
########################################################

global $connect;
$user = $_SESSION['username'];
$data = date("Y/m/d");

// Check if transaction already listed
$check = $connect->query("SELECT * FROM transactions WHERE transaction_id = '$tid'");
if($check->num_rows){
    // Do nothing
}else{
    if($insert = $connect->prepare("INSERT INTO transactions(user,date,transaction_id,payinaddress,payoutaddress,pair) VALUES(?,?,?,?,?,?)")){
    $insert->bind_param("ssssss", $user,$data,$tid,$deposit,$payout,$pair);
    $insert->execute();
    }else{
        echo $connect->error;
    }
}


}  // Aqui finaliza a condição
########################################################
# VERIFICAR TRANSAÇÃO
########################################################
require_once("configs/global.php");   

$data = json_decode(file_get_contents('https://changenow.io/api/v1/transactions/'.$tid.$config['changenow']['api']), true);
//print_r($data);
//echo $data["status"];

// Dados Gerados
$estado = $data["status"];

$montante_esperado = $data['expectedReceiveAmount'];
$amount_to_send = $data['expectedSendAmount'];

if(isset($data['hash'])){
    $hash = $data['hash'];
}else{
    
}
$verified = $estado;

if($verified == "finished"){
    
 $status = 1;    
 if($update = $connect->prepare("UPDATE transactions SET sendamount = ?,receiveamount = ?,hash = ?,verified = ? WHERE transaction_id = ?")){
    $update->bind_param("sssii", $montante,$receiveamount,$hash,$status,$tid);
    $update->execute();
    }else{
        echo $connect->error;
    }

 unset($_SESSION['pair']);
 unset($_SESSION['address']);
 unset($_SESSION['montante']);

 echo '<meta http-equiv="refresh" content="0; url=/conta" />';


}



########################################################

?> 

        <div class="page-title-area">
            <div class="container">
                <div class="page-title">
                    <h1>Completar</h1>
                    <h2>Inicio  |  Completar</h2>
                </div>
            </div>
        </div>



        <div class="confirmation-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="row nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link active" data-toggle="tab" href="confirmation.html#one" role="tab" aria-selected="true">
                                    <div class="single-filter">
                                        <i class="flaticon-change"></i>
                                        <h4>carteira</h4>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" data-toggle="tab" href="confirmation.html#one" role="tab" aria-selected="false">
                                    <div class="single-filter">
                                        <i class="flaticon-money"></i>
                                        <h4>Montante</h4>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" data-toggle="tab" href="confirmation.html#one" role="tab" aria-selected="false">  
                                    <div class="single-filter">
                                        <i class="flaticon-paper-plane"></i>
                                        <h4>Enviar para</h4>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" data-toggle="tab" href="confirmation.html#one" role="tab" aria-selected="false">  
                                    <div class="single-filter">
                                        <i class="flaticon-verified"></i>
                                        <h4>Confirmação</h4>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" data-toggle="tab" href="confirmation.html#one" role="tab" aria-selected="false">  
                                    <div class="single-filter">
                                        <i class="flaticon-export"></i>
                                        <h4>Envio</h4>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="confirmation.html#six" role="tab" aria-selected="false">  
                                    <div class="single-filter">
                                        <i class="flaticon-bitcoin-2"></i>
                                        <h4>Troca</h4>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="one" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-4">
                                        <div class="part-scan">
                                            <img src="https://blockchain.info/qr?data=<?php echo $deposit; ?>&size=200" alt="">
                                        </div>
                                    </div>
                                   
                                    <div class="col-xl-8 col-sm-8">
                                        <div class="transaction-id">
                                            <ul>
                                                <li>ID da transação</li>
                                                <li><?php echo $tid; ?></li>
                                            </ul>
                                        </div>
                                        <div class="transaction-id">
                                            <ul>
                                                <li>Montante em <?php echo strtoupper($to); ?> esperado</li>
                                                <li><?php echo $montante_esperado; echo " ".strtoupper($to); ?></li>
                                            </ul>
                                        </div>
                                         <div class="part-text">
                                            <h2>Envie <?php echo $amount_to_send;?> <?php echo $currency; ?> para o endereço abaixo.</h2>
                                            <h3>O montante total deverá ser enviado todo numa transação</h3>
                                        </div>

                                        <div class="part-input">
                                            <input type="text" placeholder="<?php echo $deposit; ?>" readonly>
                                            <button>
                                                <i class="icofont-copy-invert"></i>
                                            </button>
                                        </div>

                                        <div class="part-link">
                                            <a href="/ajuda">Esta tendo problemas?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        
<?php 
}else{
    echo '<meta http-equiv="refresh" content="0; url=/" />';
}
?>
