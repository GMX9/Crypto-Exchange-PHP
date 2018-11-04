
        <div class="page-title-area">
            <div class="container">
                <div class="page-title">
                    <h1>A minha conta</h1>
                    <h2>Inicio  |  Conta</h2>
                </div>
            </div>
        </div>



        <div class="profile-area">
            <div class="table-1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-sm-6">
                            <div class="title">
                                <h3>Historico de Operações</h3>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6">
                            <button style="visibility:hidden;"><span><i class="fas fa-cloud-upload-alt"></i></span>  exportar csv</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="chart">
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Par</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Montante</th>
                                            <th scope="col">Hash</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    
                                    global $connect;
                                    $user = $_SESSION['username'];
                                    $select = $connect->query("SELECT * FROM transactions WHERE user = '$user'");
                                    while($fetch = $select->fetch_array(MYSQLI_ASSOC)){
                                        
                                        if(isset($_SESSION['en'])){
                                            $estado_texto_a = "Waiting";
                                            $estado_texto_b = "Confirmed";

                                        }else{
                                            $estado_texto_a = "Esperando";
                                            $estado_texto_b = "Confirmado";
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
                                    ?>
                                        
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


