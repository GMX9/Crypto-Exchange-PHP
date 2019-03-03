<?php

?>
<!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
        <title>Crypto Exchange Software - Install</title>
        
        <link rel="apple-touch-icon" sizes="57x57" href="../templates/exchange/assets/img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../templates/exchange/assets/img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../templates/exchange/assets/img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../templates/exchange/assets/img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../templates/exchange/assets/img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../templates/exchange/assets/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../templates/exchange/assets/img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../templates/exchange/assets/img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../templates/exchange/assets/img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../templates/exchange/assets/img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../templates/exchange/assets/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../templates/exchange/assets/img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../templates/exchange/assets/img/favicon/favicon-16x16.png">
        <link rel="manifest" href=../templates/exchange/assets/img/favicon/manifest.json">
        <style>
            .btn-primary{background:#23bdbc; border:1px solid #23bdbc;}
        </style>
      </head>
      <body style="background: url(https://cryptoexchange-software.us/images/home_bg2.jpg); background-position: bottom;">
          
        <div class="container"> 
            <div class="row center-block" style="margin-top:30px; display: flex; align-items: center; justify-content: center;">
                  <a href="/">
                  <img src="https://cryptoexchange-software.us/images/logob.png" alt="logo" height="60"  style="width: 250px; height: auto; padding-left: 20px; padding-right: 20px;"><br>
                  </a>
            </div>      
            <div class="row center-block" >
                 <h1 class="mx-auto" style="color:darkslategray; font-size: 26px; margin-top:-30px;">Installation</h1>
            </div>
            
            <div class="col-md-6 row mx-auto shadow p-3 mb-5 bg-white rounded" style="margin-top:20px; border-radius:4px; height:auto; padding-top:20px; padding-bottom:20px;">
              <form class="w-100" method="POST">
                  
                <div class="part_a w-100">
                  <label>Title of the website</label>
                  <input type="text" name="titulo" class="form-control w-100" /></br>    
                  <label>Language</label>
                  <select class="form-control w-100" name="lang">
                  <option value="EN">English</option>  
                  </select>
                  </br>

                  <button type="button" class="btn btn-primary" id="btn_a">NEXT <i class="fas fa-long-arrow-alt-right"></i></button>
                </div>    
                  
                <div class="part_b w-100" style="display:none;">
                  <h4 style="font-size: 16px;">Database</h4>
                  <label>Hostname</label>
                  <input type="text" name="hostname" class="form-control w-100" /></br>
                  <label>Database Name</label>
                  <input type="text" name="db" class="form-control w-100" /></br>
                  <label>Username</label>
                  <input type="text" name="user" class="form-control w-100" /></br>
                  <label>Password</label>
                  <input type="password" name="password" class="form-control w-100" /></br>
                  <button type="button" class="btn btn-primary" id="btn_b_voltar"><i class="fas fa-long-arrow-alt-left"></i> BACK</button> <button type="button" style="margin-left:10px;" class="btn btn-primary" id="btn_b">NEXT <i class="fas fa-long-arrow-alt-right"></i></button>
                </div>  
                
                <div class="part_c w-100" style="display:none;">
                  <h4 style="font-size: 16px;">Changenow.io API</h4>
                  <label>API Key</label>
                  <input type="text" name="api_key" class="form-control w-100" /></br>
                  <button type="button" class="btn btn-primary" id="btn_c_voltar"><i class="fas fa-long-arrow-alt-left"></i> BACK</button> <button type="submit" name="save" style="margin-left:10px;" class="btn btn-primary" id="btn_c">INSTALL</button>
                </div>  
              </form>
            </div>
        </div>    
        
        <?php
        if(isset($_POST['save'])){
            
            $myfile = fopen("configs/database.php", "w") or die("Unable to open file!");
            $myfilec = fopen("configs/global.php", "w") or die("Unable to open file!");
            
$filea = "
<?php
##################################################
# DATABASE CONFIG
##################################################
\$config['database']['host'] = '".$_POST['hostname']."';
\$config['database']['user'] = '".$_POST['user']."';
\$config['database']['pass'] = '".$_POST['pass']."';
\$config['database']['db'] = '".$_POST['db']."';
##################################################
?>
";


$filec = "
<?php
##################################################
# GLOBAL  CONFIG
##################################################
\$config['global']['website'] = '".getenv('HTTP_HOST')."';
\$config['global']['websitename'] = '".$_POST['titulo']." -';
\$config['changenow']['api'] = '".$_POST['api_key']."';

##################################################
# WEBSITE CONTACTS CONFIG
##################################################

\$config['contacts']['location'] = 'City, Country HERE'; // Your Company/Website Location
\$config['contacts']['email'] = 'City, Country HERE'; // Your Company/Website support email
\$config['contacts']['hours'] = '09:00 - 17:00'; // Support Hours 

##################################################
?>
";
            
            
            $data = stripslashes($filea);
            $data_c = stripslashes($filec);
            fwrite($myfile, $data);
            fwrite($myfilec, $data_c);
            fclose($myfile);
            fclose($myfilec);
            
            $connect = new mysqli($_POST['hostname'],$_POST['user'],$_POST['password'],$_POST['db']);  

            if($connect->ping()) {
                


            $sql = file_get_contents('resources/database.sql');
            
            if($connect->multi_query($sql)){
                
                echo
                    '
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>swal("Sucess", "Installed successfully.", "success");</script>
                ';
                
                rename ("install.php", "install_old.php");
                
                echo '<script>window.location.replace("/");</script>';
            
            }else{
                echo'
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>swal("Error", "'.$connect->error.'", "error");</script>
                ';
            }
            
            }else{
              
              echo
                '
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>swal("Error", "It was not possible to install the software, your database is incorrect.", "error");</script>
               ';  
               echo '<script>window.location.replace("/install.php");</script>';
               
                
            }
            
        }
        ?>
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
 

        <script>
        
        // Voltar botao
        $( "#btn_b_voltar" ).click(function() {
          $( ".part_a" ).slideDown('slow');
          $( ".part_b" ).slideUp('slow');
        });
        
        // Voltar botao
        $( "#btn_c_voltar" ).click(function() {
          $( ".part_b" ).slideDown('slow');
          $( ".part_c" ).slideUp('slow');
        });
        
        
        // Seguir
        $( "#btn_a" ).click(function() {
          $( ".part_a" ).slideUp('slow');
          $( ".part_b" ).slideDown('slow');
        });
        
        $( "#btn_b" ).click(function() {
          $( ".part_b" ).slideUp('slow');
          $( ".part_c" ).slideDown('slow');
        });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      </body>
    </html>