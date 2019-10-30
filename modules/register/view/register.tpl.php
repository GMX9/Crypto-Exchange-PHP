   <div class="page-title-area">
            <div class="container">
                <div class="page-title">
                    <h1 class="plus-margin">Register</h1>
                    <h2>Home  |  Register</h2>
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
                                        <h2>Register Now</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <form method="POST" action="">
                                        <div class="name">
                                            <h4>Username</h4>
                                            <input type="text" name="username" placeholder="Type here...">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="mail">
                                            <h4>Email</h4>
                                            <input type="email" name="email" placeholder="Type here...">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="password">
                                            <h4>Password</h4>
                                            <input type="password" name="password" placeholder="Type here...">
                                            <i class="fas fa-key"></i>
                                        </div>
                                        <div class="two-buttons">
                                            <button name="submit">register</button>
                                            <button name="entrar">log in</button>
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

