        <div class="banner">
            <div class="container">
                <div class="row" style="margin-top:-65px;">
                    <div class="col-xl-7">
                        <div class="banner-content">
                            <h1>Exchange
                            Cryptocurrency<br/>
                            <span>At best rates</span></h1>
                            <p>Transfer from a wallet to another. That simple.</p>
                            <form method="POST" action="">
                            
                            <div class="exchange-button">

                            <input type="text" name="address" placeholder="A tua carteira de destino" style="margin-bottom:10px; width:585px;">
                            
                            </div>

                            <div class="exchange-button">
                                <input type="text" name="montante" placeholder="0">
                                <select name="from">
                                    <?php
                                    $lines = file('configs/coins.txt');
                                    foreach($lines as $line) {
                                        echo '<option value="'.$line.'">'.$line.'</option>';
                                    }
                                    ?>
                                </select>
                                <div class="icon">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </div>
                            <div class="exchange-button">
                                <input type="text" style="border:none;" disabled placeholder="Para">
                                <select name="to">
                                    <?php
                                    $lines = file('configs/coins.txt');
                                    foreach($lines as $line) {
                                        echo '<option value="'.$line.'">'.$line.'</option>';
                                    }
                                    ?>
                                </select>
                                <div class="icon">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </div>
                        </div>
                            
                        <div class="exchange-now">
                            <button name="exchange" class="exchange-now-button">Exchange</button> 
                        </div>
                      </form>

<?php 
if(isset($_POST['exchange'])){  
    
    global $connect;
    
    $montante = htmlentities($connect->real_escape_string($_POST['montante']));
    $address = htmlentities($connect->real_escape_string($_POST['address']));
    $from = trim($_POST['from']);
    $to = trim($_POST['to']);
    ###########################################################################
    
    $this->exchange->switchCoins($montante,$address,$from,$to);
    
    ###########################################################################

}
?>
                    </div>
                </div>
            </div>

            <div class="brands">
                <ul>
                    <li>
                        <div class="single-brand">
                            <img src="../templates/exchange/assets/img/brand-1.png" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="single-brand">
                            <img src="../templates/exchange/assets/img/brand-2.png" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="single-brand">
                            <img src="../templates/exchange/assets/img/brand-3.png" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="single-brand">
                            <img src="../templates/exchange/assets/img/brand-4.png" alt="">
                        </div>
                    </li>
                </ul>
            </div>
        </div>


        <div class="feature-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="area-title">
                            <h2>Our services</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-sm-12">
                        <div class="single-feature">
                            <div class="part-img">
                                <img src="../templates/exchange/assets/img/icon-9.png" alt="">
                            </div>
                            <div class="part-text">
                                <h3>Simple</h3>
                                <p>Insert the amount and address. Transfer your coins and let the magic happen.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-4 col-sm-12">
                        <div class="single-feature">
                            <div class="part-img">
                                <img src="../templates/exchange/assets/img/icon-10.png" alt="">
                            </div>
                            <div class="part-text">
                                <h3>Fast</h3>
                                <p>After the first step is made your coins will be exchange super fast.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-4 col-sm-12">
                        <div class="single-feature">
                            <div class="part-img">
                                <img src="../templates/exchange/assets/img/icon-11.png" alt="">
                            </div>
                            <div class="part-text">
                                <h3>Trust</h3>
                                <p>The exchange proccess is automaticly and does not require any human interaction.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="how-it-works">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="area-title">
                            <h2>How it works?</h2>
                            <p>We use a technology which allows us to search the best market rate and exchange your coins trought different API's.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <div class="single-coin-box cbox-1 blue" style="visibility: visible; animation-name: slideInLeft;">
                            <div class="icon">
                                <i class="flaticon-notebook"></i>
                            </div>
                            <div class="content">
                                <h4>Enter your address</h4>
                                <p>Insert your final address for the coin you wish to receive</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-coin-box cbox-2 blue" style="visibility: visible; animation-name: slideInDown;">
                            <div class="icon">
                                <i class="flaticon-wallet"></i>
                            </div>
                            <div class="content">
                                <h4>Open a deposit</h4>
                                <p>Once it is completed you will need to send the first coins and the exchange will automaticly begins.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-coin-box cbox-3 blue" style="visibility: visible; animation-name: slideInUp;">
                            <div class="icon">
                                <i class="flaticon-withdrawing-money-from-atm"></i>
                            </div>
                            <div class="content">
                                <h4>Withdrawal Automaticly</h4>
                                <p>Your exchange is sent directly to your desired wallet once the exchange occurs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-coin-box cbox-4 blue" style="visibility: visible; animation-name: slideInRight;">
                            <div class="icon">
                                <i class="flaticon-bars"></i>
                            </div>
                            <div class="content">
                                <h4>Enjoy</h4>
                                <p>After concluded you can make more exchanges trough our plataform.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <?php
        global $user;
        if($user->isLoggedin() == false){
        ?>    
        
        <div class="signup-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="area-title">
                            <h2>Join us for free !</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-around d-flex">
                    <div class="col-xl-5 col-sm-12 d-flex align-items-center order-2 order-md-2">
                       <div class="form">
                            <form method="POST" class="signup-form">
                                <div class="name-area">
                                    <p>Your name</p>
                                    <input type="text" name="username" placeholder="Type here..." required="">
                                    <i class="icofont-ui-user"></i>
                                </div>
                                <div class="mail-area">
                                    <p>Your email</p>
                                    <input type="email" name="email" placeholder="Type here..." required="">
                                    <i class="icofont-email"></i>
                                </div>
                                <div class="mail-area">
                                    <p>Password</p>
                                    <input type="password" name="password" placeholder="Type here..." required="">
                                    <i class="icofont-email"></i>
                                </div>
                                <button name="submit" class="submit-button">join now</button>
                            </form>
                            <?php 
                                    if(isset($_POST['submit'])){
                                          include("lib/userconnect.php");
                                          userconnect::register();  
                                    }
                                    if(isset($_POST['entrar'])){
                                        echo'<meta http-equiv="refresh" content="0; url=/login" />';
                                    }    
                            ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>

     <div class="payout-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="area-title">
                            <h2 class="plus-margin">Last Exchanges</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Todas as transações<br><span>1</span></a>
                      </li>
                      
                      
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="chart">
                                 <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pair</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Hash</th>
                                            <th scope="col">State</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php exchange::allTransactions(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
