
        <div class="banner">
            <div class="container">
                <div class="row" style="margin-top:-65px;">
                    <div class="col-xl-7">
                        <div class="banner-content">
                            <h1>Troque
                            Criptomoedas<br/>
                            <span>Aos melhores rates</span></h1>
                            <p>Transfira de uma carteira para outra. Tão simples assim.</p>
                            <form method="POST" action="">
                            
                            <div class="exchange-button">

                            <input type="text" name="address" placeholder="A tua carteira de destino" style="margin-bottom:10px; width:585px;">
                            
                            </div>

                            <div class="exchange-button">
                                <input type="text" name="montante" placeholder="0">
                                <select name="from">
                                    <option value="btc">BTC</option>
                                    <option value="eth">ETH</option>
                                    <option value="ltc">LTC</option>
                                </select>
                                <div class="icon">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </div>
                            <div class="exchange-button">
                                <input type="text" style="border:none;" disabled placeholder="Para">
                                <select name="to">
                                    <option value="eth">ETH</option>
                                    <option value="btc">BTC</option>
                                    <option value="ltc">LTC</option>
                                </select>
                                <div class="icon">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </div>
                        </div>
                            
                        <div class="exchange-now">
                            <button name="exchange" class="exchange-now-button">Trocar Agora</button> 
                        </div>
                      </form>
<?php 
if(isset($_POST['exchange'])){  
    
    global $connect;
    
    $montante = htmlentities($connect->real_escape_string($_POST['montante']));
    $address = htmlentities($connect->real_escape_string($_POST['address']));
    $from = htmlentities($connect->real_escape_string($_POST['from']));
    $to = htmlentities($connect->real_escape_string($_POST['to']));
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
                            <h2>Os nossos serviços</h2>
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
                                <h3>Simples</h3>
                                <p>Insira o montante e o endereço. Transfira as suas moedas e deixe a magia acontecer.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-4 col-sm-12">
                        <div class="single-feature">
                            <div class="part-img">
                                <img src="../templates/exchange/assets/img/icon-10.png" alt="">
                            </div>
                            <div class="part-text">
                                <h3>Rápido</h3>
                                <p>Após inserido o endereço e montante as suas moedas serão transferidas super rápido.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-4 col-sm-12">
                        <div class="single-feature">
                            <div class="part-img">
                                <img src="../templates/exchange/assets/img/icon-11.png" alt="">
                            </div>
                            <div class="part-text">
                                <h3>Confiança</h3>
                                <p>O processo de exchange é automatizado e não requer qualquer interferência humana para o mesmo.</p>
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
                            <h2>Como funciona?</h2>
                            <p>Utilizamos uma tecnologia que nos permite fazer a exchange das suas moedas ao rate atual do mercado funcionando com diferentes API's de mercados diferentes.</p>
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
                                <h4>Adicione o seu endereço</h4>
                                <p>Insira o seu endereço de destino para a moeda desejada a receber</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-coin-box cbox-2 blue" style="visibility: visible; animation-name: slideInDown;">
                            <div class="icon">
                                <i class="flaticon-wallet"></i>
                            </div>
                            <div class="content">
                                <h4>Abrir depósito</h4>
                                <p>Assim que tiver completado o primeiro passo será gerado uma box de pagamento para completar a exchange.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-coin-box cbox-3 blue" style="visibility: visible; animation-name: slideInUp;">
                            <div class="icon">
                                <i class="flaticon-withdrawing-money-from-atm"></i>
                            </div>
                            <div class="content">
                                <h4>Retirada Automática</h4>
                                <p>Assim que processado as suas moedas serão enviadas autmáticamente para o endereço de destino.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-coin-box cbox-4 blue" style="visibility: visible; animation-name: slideInRight;">
                            <div class="icon">
                                <i class="flaticon-bars"></i>
                            </div>
                            <div class="content">
                                <h4>Usufruia</h4>
                                <p>Após concluido poderá fazer mais exchanges na nossa plataforma.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="signup-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="area-title">
                            <h2>Junta-te a nós gratuitamente !</h2>
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
                                    <p>Insere o teu nome de utilizador</p>
                                    <input type="text" name="username" placeholder="Escreve aqui..." required="">
                                    <i class="icofont-ui-user"></i>
                                </div>
                                <div class="mail-area">
                                    <p>Insere o teu email</p>
                                    <input type="email" name="email" placeholder="Escreve aqui..." required="">
                                    <i class="icofont-email"></i>
                                </div>
                                <div class="mail-area">
                                    <p>Insere a tua password</p>
                                    <input type="password" name="password" placeholder="Escreve aqui..." required="">
                                    <i class="icofont-email"></i>
                                </div>
                                <button name="submit" class="submit-button">entrar</button>
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


     <div class="payout-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="area-title">
                            <h2 class="plus-margin">Ultimas trocas</h2>
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           <th scope="col">Data</th>
                                           <th scope="col">Moeda</th>
                                           <th scope="col">Endereço</th>
                                           <th scope="col">Montante</th>
                                           <th scope="col">Hora</th>
                                           <th scope="col">Pagamento</th>
                                           <th scope="col">Conf.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                           <th scope="row"><i class="fas fa-calendar-alt"></i> 4 de Outubro 2018</th>
                                           <td><i class="fab fa-bitcoin"></i> Bitcoin</td>
                                           <td>1Puh8q2SM3N92FwTHXNZq4LwkRpPQ61jy</td>
                                           <td><i class="far fa-clock"></i> 0.84634 <span>BTC</span></td>
                                           <td>22:09:58</td>
                                           <td>1.84634 <span>BTC</span></td>
                                           <td>1</td>
                                        </tr>
                                       
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