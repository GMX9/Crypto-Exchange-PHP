   <div class="page-title-area">
            <div class="container">
                <div class="page-title">
                    <h1 class="plus-margin">Registar</h1>
                    <h2>Inicio  |  Registar</h2>
                </div>
            </div>
        </div>



        <div class="register-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div  class="col-xl-8 col-md-8">
                        <div class="register-form">
                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <div class="register-title">
                                        <h2>Registar Agora</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <form method="POST" action="">
                                        <div class="name">
                                            <h4>Insira um nome de utilizador</h4>
                                            <input type="text" name="username" placeholder="Escreve aqui...">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="mail">
                                            <h4>Insira o seu email</h4>
                                            <input type="email" name="email" placeholder="Escreve aqui...">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="password">
                                            <h4>Insira a seu password</h4>
                                            <input type="password" name="password" placeholder="Escreve aqui...">
                                            <i class="fas fa-key"></i>
                                        </div>
                                        <div class="two-buttons">
                                            <button name="submit">registar agora</button>
                                            <button name="entrar">entrar agora</button>
                                        </div>
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
        </div>

