<?php require('configs/global.php'); ?>

        <div class="page-title-area">
            <div class="container">
                <div class="page-title">
                    <h1>Help</h1>
                    <h2>Home  |  Help</h2>
                </div>
            </div>
        </div>


        <div class="contact-area">
            <div class="container maps-style">
                <div class="row d-flex">
                    <div class="col-xl-5 col-lg-6">
                        <div class="address-bar">
                            <h3>Get in<br/> touch here</h3>
                            <p><span><i class="fas fa-map-marker-alt"></i></span><?php echo $config['contacts']['location']; ?></p>
                            <p><span><i class="far fa-envelope"></i></span><?php echo $config['contacts']['email']; ?><br/><span style="visibility:hidden;">d</span></p>
                            <p><span><i class="fas fa-clock"></i></span><?php echo $config['contacts']['hours']; ?><br/></p>
                        </div>
                    </div>
                    <div class="col-xl-7 d-flex align-items-center shadows col-lg-6">
                        <div class="form-bar">
                            <h3>What goes in your mind <br/>Tell us here</h3>
                            <form>
                                <input type="text" placeholder="Your name">
                                <input type="email" placeholder="Your email">
                                <textarea placeholder="Your message"></textarea>
                                <button>send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

