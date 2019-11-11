<?php
require 'vendor/autoload.php';
$client = new GuzzleHttp\Client();
global $connect;
global $exchange;
########################################################
include ('configs/global.php');
########################################################


if (isset($_SESSION['pair'])){

    $results = $exchange->exchangeAPI($config);    

########################################################
?>


        <div class="page-title-area">
            <div class="container">
                <div class="page-title">
                    <h1>Complete</h1>
                    <h2>Home  |  Complete</h2>
                </div>
            </div>
        </div>

        <div class="confirmation-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="row nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link active" data-toggle="tab" href="#one" role="tab" aria-selected="true">
                                    <div class="single-filter">
                                        <i class="flaticon-change"></i>
                                        <h4>Wallet</h4>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" data-toggle="tab" href="#one" role="tab" aria-selected="false">
                                    <div class="single-filter">
                                        <i class="flaticon-money"></i>
                                        <h4>Amount</h4>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" data-toggle="tab" href="#one" role="tab" aria-selected="false">  
                                    <div class="single-filter">
                                        <i class="flaticon-paper-plane"></i>
                                        <h4>Send to</h4>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" data-toggle="tab" href="#one" role="tab" aria-selected="false">  
                                    <div class="single-filter">
                                        <i class="flaticon-verified"></i>
                                        <h4>Confirm</h4>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" data-toggle="tab" href="#one" role="tab" aria-selected="false">  
                                    <div class="single-filter">
                                        <i class="flaticon-export"></i>
                                        <h4>Sent</h4>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item col-xl-2 col-sm-6 col-lg-2">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#one" role="tab" aria-selected="false">  
                                    <div class="single-filter">
                                        <i class="flaticon-bitcoin-2"></i>
                                        <h4>Exchange</h4>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="one" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-4">
                                        <div class="part-scan">
                                            <img src="https://blockchain.info/qr?data=<?php echo $results[5]; ?>&size=200" alt="">
                                        </div>
                                    </div>
                                   
                                    <div class="col-xl-8 col-sm-8">
                                        <div class="transaction-id">
                                            <ul>
                                                <li>ID da transação</li>
                                                <li><?php echo $results[0]; ?></li>
                                            </ul>
                                        </div>
                                        <div class="transaction-id">
                                            <ul>
                                                <li>Amount expected in <?php echo strtoupper($results[2]); ?></li>
                                                <li><?php echo $results[1]; echo " ".strtoupper($results[2]); ?></li>
                                            </ul>
                                        </div>
                                         <div class="part-text">
                                            <h2>Send <?php echo $results[3];?> <?php echo $results[4]; ?> to the address below.</h2>
                                            <h3>The total amount should be sent in 1 transaction only</h3>
                                        </div>

                                        <div class="part-input" style="width: 100%; max-width: 100%;">
                                            <input type="text" style="width: 100%;" placeholder="<?php echo $results[5]; ?>" readonly>
                                            <button>
                                                <i class="icofont-copy-invert"></i>
                                            </button>
                                        </div>

                                        <div class="part-link">
                                            <a href="/help">Having problems?</a>
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
