

        <div class="page-title-area">
            <div class="container">
                <div class="page-title">
                    <h1 class="plus-margin">Log in</h1>
                    <h2>Home  |  Log in</h2>
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
                                        <h2>Log in now</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <form method="POST" action="">
                                        <div class="name">
                                            <h4>Your email</h4>
                                            <input type="email" name="email" placeholder="Type here...">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="password">
                                            <h4>Password</h4>
                                            <input type="password" name="password" placeholder="Type here...">
                                            <i class="fas fa-key"></i>
                                        </div>
                                        <div class="two-buttons">
                                            <button name="submit">log in</button>
                                            <button name="reg">register</button>
                                        </div>
                                    </form>
                                    <?php 
                                    if(isset($_POST['submit'])){
                                          include("lib/userconnect.php");
                                          userconnect::login();  
                                    }
                                    
                                    if(isset($_POST['reg'])){
                                        echo'<meta http-equiv="refresh" content="0; url=/register" />';
                                    }    

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

